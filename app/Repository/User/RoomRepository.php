<?php
    namespace App\Repository\User;
    use App\Interfaces\Shared\CrudInterface;
    use App\Models\Room;
    use App\Traits\CommonTrait;

    class RoomRepository implements CrudInterface{

        public function createOrUpdate(array $data=[]){

            $response['status']=200;$response['data']['message']="Something went wrong!!";
            //try{

                if($data['files']['data'] && count($data['files']['data']) > 0){
                    $response['data']['files']=CommonTrait::upload($data['files']['data'],CommonTrait::getRoomPhotosLocation());
                    if(count($response['data']['files']) > 0){
                        $data['data']['photo']=$response['data']['files'][0];
                    }
                }
                $data['data']['amenities']=implode(",",$data['data']['amenities']);
                if($data['updateId'] == 'null')
                    $data['updateId']=null;
                $row=Room::updateOrCreate(
                    ["id" => $data['updateId']],
                    $data['data']
                );
                $response['insert_row']=$this->find($row->id);
                $response['data']['list']=$this->list();
                $response['data']['message']="Success";
            // }
            // catch(\Throwable $error){
            //     $response['status']=500;
            //     $response['data']['message']=$error;
            // }
            return $response;
        }
        public function find($id){
            return Room::find($id);
        }
        public function deleteById($id){
            Room::find($id)->delete();
            return $this->list();
        }
        public function list(){
            return Room::orderBy("id","desc")->get();
        }
    }
?>
