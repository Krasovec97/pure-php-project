<?php
/**
 * @var Router $router
 */



$router->get('/application/{applicationId}', "controllers\FormController@getApplicationDetails");
$router->get('/applications', "controllers\FormController@displayFormListPage");
$router->get('/user/applications', "controllers\FormController@getApplications");
$router->get('/form', "controllers\FormController@displayFormPage");
$router->post('/form', "controllers\FormController@updateCreateApplications");
$router->get('/', "controllers\HomeController@displayHomePage");
