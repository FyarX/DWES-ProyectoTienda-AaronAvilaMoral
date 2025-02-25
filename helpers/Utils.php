<?php
namespace Helpers;

class Utils {
    public static function isAdmin() {
        if(!isset($_SESSION['admin']) || $_SESSION['admin'] !== true) {
            header("Location: " . URL_BASE . "index");
        } else {
            return true;
        }
    }
}
?>