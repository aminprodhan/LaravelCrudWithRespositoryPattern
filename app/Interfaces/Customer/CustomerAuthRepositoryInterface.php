<?php
    namespace App\Interfaces\Customer;
    interface CustomerAuthRepositoryInterface{
        public function login();
        public function deviceTokenUpdateOrCreate();
        public function logout();
    }
?>
