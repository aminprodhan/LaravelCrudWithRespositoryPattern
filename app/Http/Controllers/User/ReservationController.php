<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Repository\Customer\CustomerBookingRepository;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    private CustomerBookingRepository $customerBookingRepository;
    public function __construct(CustomerBookingRepository $customerBookingRepository)
    {
        $this->customerBookingRepository=$customerBookingRepository;
    }
    public function handleIndex(Request $request){
        $response=$this->customerBookingRepository->list($request->all()); //only input
        return response()->json(["list" => $response],200);
    }
}
