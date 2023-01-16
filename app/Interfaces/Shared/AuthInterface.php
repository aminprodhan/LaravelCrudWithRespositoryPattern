<?php
    namespace App\Interfaces\Shared;
    interface AuthInterface{
        public function login();
        public function deviceTokenUpdateOrCreate();
        public function logout();
    }
?>
