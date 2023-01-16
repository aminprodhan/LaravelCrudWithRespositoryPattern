<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Repository\Customer\CustomerBookingRepository;
use App\Repository\Notification\FcmRepository;
use App\Repository\User\UserAuthRepository;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    private CustomerBookingRepository $customerBookingRepository;
    private UserAuthRepository $userAuthRepository;
    private FcmRepository $fcmRepository;
    public function __construct(CustomerBookingRepository $customerBookingRepository,
    UserAuthRepository $userAuthRepository,FcmRepository $fcmRepository)
    {
        $this->customerBookingRepository=$customerBookingRepository;
        $this->userAuthRepository=$userAuthRepository;
        $this->fcmRepository=$fcmRepository;
    }
    public function handleStatusChange(Request $request){
        $info=$this->customerBookingRepository->statusChange($request->all()); //only input
        $deviceKeys=$this->userAuthRepository->getTokenByCustomer($info->user_id);

        $status_text="Rejected";
        if($request->status_id == '1')
            $status_text="Approved";

        $message="Your Booking has $status_text and Room name is:".$info->room->name;
        $message_body=[
                "title" => "Booking Request 444",
                "body" => $message,
            ];
        $res=$this->fcmRepository->sendNotification($deviceKeys,$message_body);
        $response=$this->customerBookingRepository->list($request->all()); //only input
        return response()->json(["list" => $response,"keys" => $res],200);
    }
    public function handleIndex(Request $request){
        $response=$this->customerBookingRepository->list($request->all()); //only input
        return response()->json(["list" => $response],200);
    }
}
