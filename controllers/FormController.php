<?php

namespace controllers;

class FormController
{
    public function displayFormPage()
    {
        return include basePath('/views/form.php');
    }

    public function displayFormListPage()
    {
        return include basePath('/views/forms.php');
    }
}