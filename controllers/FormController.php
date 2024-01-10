<?php

namespace controllers;

class FormController
{
    public function displayFormPage()
    {
        echo file_get_contents(basePath('/views/form.php'));
    }

    public function displayFormListPage()
    {
        echo file_get_contents(basePath('/views/forms.php'));
    }
}