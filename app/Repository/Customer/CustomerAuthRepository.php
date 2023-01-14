<?php
    namespace App\Repository\Customer;
    use App\Interfaces\Customer\CustomerAuthRepositoryInterface;
    use App\Models\Customer;
    use App\Models\Customer\CustomerDeviceKey;
    use Illuminate\Support\Facades\Hash;
    use App\Traits\CommonTrait;

    class CustomerAuthRepository implements CustomerAuthRepositoryInterface{
        private $token_name='customer_sanctum_auth';
        public function login(array $data=[])
        {
            $res['data']["message"]="User not found!!";$res["status"]=200;
            $isExist=Customer::where('email',$data['email'])->first();
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

            CustomerDeviceKey::updateOrCreate(
                ['customer_id' => CommonTrait::sanctumAuth()->id,"device_key" => $data['device_key']],
                ['customer_id' => CommonTrait::sanctumAuth()->id,"device_key" => $data['device_key']],
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
