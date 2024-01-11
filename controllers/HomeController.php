<?php
namespace controllers;

class HomeController {

    public function displayHomePage()
    {
        return include basePath('/views/home.php');
    }
}