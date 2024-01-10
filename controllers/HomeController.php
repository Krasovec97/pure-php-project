<?php
namespace controllers;

class HomeController {

    public function displayHomePage()
    {
        echo file_get_contents(basePath('/views/home.php'));
    }
}