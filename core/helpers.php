<?php

function basePath(string $path) {

    return BASE_PATH . $path;
}

function abort(string $message, int $code = 404) {

    http_response_code($code);
    echo $message;
    exit();
}

function dataGet(array $routeArray, $key) {

    if (!is_array($routeArray) || empty($key)) {
        return null;
    }

    $keysArr = explode(".", $key);
    $searchedKey = $keysArr[count($keysArr) - 1];

    $i = 0;

    if(array_key_exists($keysArr[$i], $routeArray)) {

        $nextArr = $routeArray[$keysArr[$i]];

        while($i < count($keysArr)) {

            $i++;

            if(!array_key_exists($keysArr[$i], $nextArr)) break;

            if($keysArr[$i] === $searchedKey) return $nextArr[$keysArr[$i]];

            $nextArr = $nextArr[$keysArr[$i]];
        }
    }

    return null;
}

function view($file, $vars) {
    ob_start();
    extract($vars);
    include basePath('/views/' . $file . '.php');
    $buffer = ob_get_contents();
    echo $buffer;
    ob_end_clean();


    return $buffer;
}