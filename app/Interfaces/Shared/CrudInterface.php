<?php
    namespace App\Interfaces\Shared;
    interface CrudInterface{
        public function createOrUpdate();
        public function find($id);
        public function deleteById($id);
        public function list();
    }
?>
