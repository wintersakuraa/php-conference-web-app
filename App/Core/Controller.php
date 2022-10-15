<?php

/*
 * Base controller class
 */

class Controller
{
    protected function view($view, array $data = [])
    {
        require_once 'App/Views' . $view . '.php';
    }

    protected function model($model)
    {
        require_once 'App/Models/' . $model . '.php';
        return new $model();
    }
}
