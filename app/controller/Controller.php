<?php

namespace controller;

use sys\Router;

abstract class Controller{

    protected final function view(string $name, array $vars = [])
    {
        $filename = "../view/{$name}.php";
        
        if(!file_exists($filename)) die("View $name not found!");

        include_onde($filename);
    }

    protected final function params(string $name)
    {
        $param = Router::getRequest();

        if(isset($param[$name])) return null;

        return $param[$name];
    }

    protected final function redirect(string $to)
    {
        $url = (isset($_SERVER['HTTPS']) ? 'https' : 'http') . '://'. $_SERVER['HTTP_HOST'];
        $folders = explode('?', $_SERVER['REQUEST_URI'])[0];

        header('Location:' . $url . $folders . '?r=' . $to);
        exit();
    }
}