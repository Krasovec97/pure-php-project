<?php

class Router
{
    private static Router $router;

    private function __construct(private array $routes = []){}

    public static function getRouter(): self
    {
        if (!isset(self::$router)) {
            self::$router = new self();
        }

        return self::$router;
    }

    public function get(string $uri, string $action): void {

        $this->register($uri, $action, "GET");
    }

    public function post(string $uri, string $action): void {

        $this->register($uri, $action, "POST");
    }

    public function put(string $uri, string $action): void {

        $this->register($uri, $action, "PUT");
    }

    public function delete(string $uri, string $action): void{

        $this->register($uri, $action, "DELETE");
    }

    protected function register(string $uri, string $action, string $method): void {

        if(!isset($this->routes[$method])) $this->routes[$method] = [];

        list($controller, $function) = $this->extractAction($action);

        $pattern = "#^" . preg_replace('#\{[a-zA-Z0-9_]+}#', '([a-zA-Z0-9_]+)', $uri) . "$#";

        $this->routes[$method][$pattern] = [
            'controller' => $controller,
            'method' => $function
        ];
    }

    protected function extractAction(string $action, string $separator = '@'): array {

        $sepIdx = strpos($action, $separator);

        $controller = substr($action, 0, $sepIdx);
        $function = substr($action, $sepIdx + 1, strlen($action));

        return [$controller, $function];
    }

    public function route(string $method, string $uri): bool {

        foreach ($this->routes[$method] as $pattern => $result) {

            if(preg_match($pattern, $uri, $matches)) {

                array_shift($matches);

                if(!$result) abort("Route not found", 404);

                $controller = $result['controller'];
                $function = $result['method'];

                if(class_exists($controller)) {

                    $controllerInstance = new $controller();

                    if(method_exists($controllerInstance, $function)) {

                        $controllerInstance->$function($matches);
                        return true;

                    } else {

                        abort("No method {$function} on class {$controller}", 500);
                    }
                }
            }

        }

        return false;
    }
}