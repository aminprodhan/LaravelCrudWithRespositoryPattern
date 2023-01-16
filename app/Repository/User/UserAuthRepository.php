<?php
    namespace App\Repository\User;
    use App\Interfaces\Shared\AuthInterface;
    use App\Models\DeviceToken;
    use App\Models\User;
    use Illuminate\Support\Facades\Hash;
    use App\Traits\CommonTrait;

    class UserAuthRepository implements AuthInterface{
        private $token_name='admin_sanctum_auth';
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
                "token" => $data['device_key'],
                "userable_id" => $find->id,
                "userable_type" => get_class($find)
            ];
            DeviceToken::updateOrCreate(
                ["userable_type" => $data_insert['userable_type'],'userable_id' => $find->id,"token" => $data['device_key']],
                $data_insert,
            );
            return $find->id;
        }
        public function getTokenByCustomer($customer_id){

            $tokens=DeviceToken::where("userable_id",$customer_id)
                ->where("userable_type",'App\Models\Customer')
                ->get();
            return $tokens->pluck('token')->all();
        }
        public function logout()
        {

        }
    }
?>
