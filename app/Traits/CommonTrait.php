<?php
    namespace App\Traits;
    use App\Models\Amenitie;
    trait CommonTrait{
        public static function sanctumAuth(){
            return auth('sanctum')->user();
        }
        public static function getAmenities(){
            return Amenitie::select("name as label","name as value")->where("status",1)->get();
        }
        public static function getServerBaseLink(){
            return "http://localhost:8000/";
        }
        public static function getRoomPhotosLocation(){
            $public_path="user/assets/room/";
            return $public_path;
        }
        public static function upload($files,$publicPath){
            $ara_files=null;
            foreach($files as $val){
                foreach ($val as $file) {
                    $file_name = time().rand(1,100).'.'.$file->getClientOriginalExtension();
                    $file->move(public_path($publicPath), $file_name); //university/website/pdf
                    $ara_files[] = $file_name;
                }
            }
            return $ara_files;
        }
    }
?>
