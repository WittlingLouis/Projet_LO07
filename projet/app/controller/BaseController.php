<?php

abstract class BaseController {

    public static function render($viewName, $data = []) {
        extract($data);

        $root = dirname(__DIR__, 2);
        $GLOBALS['root'] = $root;

        $viewName = ltrim($viewName, '/');
        $path = $root . '/app/view/' . $viewName . '.php';

        if (file_exists($path)) {
            require($path);
        } else {
            echo "<h3>Erreur d'innovation MVC</h3>";
            echo "Impossible de trouver la vue : <code>" . htmlspecialchars($path) . "</code>";
        }
    }
}
?>

