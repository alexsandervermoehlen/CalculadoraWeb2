<?php
spl_autoload_register(function($className) {
    $file = $_SERVER["DOCUMENT_ROOT"].'./web2/calculadora/libs/' . $className . '.class.php';
    if (file_exists($file)) {
        require_once $file;
    }
});