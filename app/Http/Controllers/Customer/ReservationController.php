<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Repository\Customer\CustomerAuthRepository;
use App\Repository\Customer\CustomerBookingRepository;
use App\Repository\Notification\FcmRepository;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    //
    private CustomerBookingRepository $customerBookingRepository;
    private FcmRepository $fcmRepository;
    private CustomerAuthRepository $customerAuthRepository;

    public function __construct(CustomerBookingRepository $customerBookingRepository,
                FcmRepository $fcmRepository,CustomerAuthRepository $customerAuthRepository)
    {
        $this->customerBookingRepository=$customerBookingRepository;
        $this->fcmRepository=$fcmRepository;
        $this->customerAuthRepository=$customerAuthRepository;
    }
    public function handleIndex(Request $request){
        $response=$this->customerBookingRepository->list($request->all()); //only input
        return response()->json(["list" => $response],200);
    }
    public function handleStore(Request $request){
        $response=$this->customerBookingRepository->createOrUpdate($request->all()); //only input
        if($response['status'] == 200){
            $deviceKeys=$this->customerAuthRepository->getCustomerDeviceToken();
            $message="New Booking Requested From ".$response['insert_row']->customer->name.'and Room is:'.$response['insert_row']->room->name;
            $message_body=[
                    "title" => "Booking Request",
                    "body" => $message,
                ];
            $this->fcmRepository->sendNotification($deviceKeys,$message_body);
        }
        return response()->json($response,$response['status']);
    }
}
