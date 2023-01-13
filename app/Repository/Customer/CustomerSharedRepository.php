<?php
    namespace App\Repository\Customer;
    use App\Interfaces\Customer\CustomerSharedRepositoryInterface;
    use App\Models\Room;
    class CustomerSharedRepository implements CustomerSharedRepositoryInterface{
        public function getRoomList(){
            return Room::all();
        }
    }
?>
