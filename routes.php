<?php
/**
 * @var Router $router
 */


$router->get('/forms', "controllers\FormController@displayFormListPage");
$router->get('/form', "controllers\FormController@displayFormPage");
$router->get('/', "controllers\HomeController@displayHomePage");
