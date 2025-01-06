<?php

class Route {
    public function start() {
        $uri = $_SERVER['REQUEST_URI'];

        $uri = str_replace('/index.php', '', $uri);

        $uri = trim($uri, '/');

        if (empty($uri)) {
            $controllerName = 'FileController';
            $methodName = 'filesList';
        } else {
            $segments = explode('/', $uri);
            $controllerName = ucfirst($segments[0]);
            $methodName = $segments[1] ?? 'filesList';
        }

        $controllerFile = "controllers/{$controllerName}.php";


        if (file_exists($controllerFile)) {
            require_once $controllerFile;
            if (class_exists($controllerName)) {
                $controller = new $controllerName();
                if (method_exists($controller, $methodName)) {
                    $controller->$methodName();
                } else {
                    echo "Метод <strong>$methodName</strong> не знайдено.";
                }
            } else {
                echo "Клас <strong>$controllerName</strong> не знайдено.";
            }
        } else {
            echo "Контролер <strong>$controllerName</strong> не знайдено.";
        }
    }
}
