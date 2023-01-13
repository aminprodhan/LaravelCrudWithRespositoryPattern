<?php
    namespace App\Repository\Customer;

use App\Interfaces\Customer\CustomerAuthRepositoryInterface;
use App\Interfaces\Customer\CustomerBookingRepositoryInterface;
    use App\Models\Customer;
    use App\Models\Reservation;

    class CustomerBookingRepository implements CustomerBookingRepositoryInterface{
        public function createOrUpdate(array $data=[]){

            $response['status']=200;$response['data']['message']="Something went wrong!!";
            // try{
                Reservation::updateOrCreate(
                    ["id" => $data['updateId']],
                    $data['data']
                );
                $response['data']['list']=$this->list();
                $response['data']['message']="Success";
            // }
            // catch(\Throwable $error){
            //     $response['status']=500;
            //     $response['data']['message']=$error;
            // }
            return $response;
        }
        public function list(){
            return Reservation::get();
        }
    }
?>
