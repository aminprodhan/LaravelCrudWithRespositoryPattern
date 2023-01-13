<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Repository\Customer\CustomerBookingRepository;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    //
    private CustomerBookingRepository $customerBookingRepository;
    public function __construct(CustomerBookingRepository $customerBookingRepository)
    {
        $this->customerBookingRepository=$customerBookingRepository;
    }
    public function handleStore(Request $request){
        $response=$this->customerBookingRepository->createOrUpdate($request->all()); //only input
        return response()->json($response['data'],$response['status']);
    }
}
