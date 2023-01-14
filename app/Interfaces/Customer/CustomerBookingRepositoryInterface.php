<?php
    namespace App\Interfaces\Customer;
    interface CustomerBookingRepositoryInterface{
        public function createOrUpdate();
        public function find($id);
        public function list();
    }
?>
