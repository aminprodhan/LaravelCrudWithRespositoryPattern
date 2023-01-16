<?php
    namespace App\Repository\User;
    use App\Interfaces\Shared\AuthInterface;
    use App\Models\Customer\CustomerDeviceKey;
use App\Models\DeviceToken;
use App\Models\User;
    use Illuminate\Support\Facades\Hash;
    use App\Traits\CommonTrait;

    class UserAuthRepository implements AuthInterface{
        private $token_name='customer_sanctum_auth';
        public function login(array $data=[])
        {
            $res['data']["message"]="User not found!!";$res["status"]=200;
            $isExist=User::where('email',$data['email'])->first();
            if($isExist && Hash::check($data['password'], $isExist->password)){
                $token=$isExist->createToken($this->token_name)->plainTextToken;
                $res['data']['user']=$isExist;
                $res['data']['user']['token']=$token;
                $res['data']["message"]="Success";
            }
            else
                $res["status"]=500;
            return $res;
        }
        public function deviceTokenUpdateOrCreate(array $data=[]){

            $find=User::find(CommonTrait::sanctumAuth()->id);
            $data_insert=[
                "token" => "",
                "user_id" => '',
                "user_type" => get_class($find)
            ];

            DeviceToken::updateOrCreate(
                ['user_id' => CommonTrait::sanctumAuth()->id,"token" => $data['device_key']],
                $data_insert,
            );
            return 1;
        }
        public function getCustomerDeviceToken(){
            $auth=CommonTrait::sanctumAuth();
            return CustomerDeviceKey::where("customer_id",$auth->id)->get()->pluck('device_key')->all();
        }
        public function logout()
        {

        }
    }
?>
