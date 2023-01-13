<?php
    namespace App\Traits;
    trait CommonTrait{
        public static function sanctumAuth(){
            return auth('sanctum')->user();
        }
    }
?>
