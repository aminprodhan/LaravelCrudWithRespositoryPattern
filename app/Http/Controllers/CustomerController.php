<?php

namespace App\Http\Controllers;

use App\Repository\Customer\CustomerAuthRepository;
use App\Repository\Customer\CustomerSharedRepository;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    //
    private CustomerSharedRepository $customerSharedRepository;
    private CustomerAuthRepository $customerAuthRepository;
    public function __construct(CustomerSharedRepository $customerSharedRepository,
        CustomerAuthRepository $customerAuthRepository)
    {
        $this->customerSharedRepository=$customerSharedRepository;
        $this->customerAuthRepository=$customerAuthRepository;
    }
    public function handleDeviceKeyUpdateOrCreate(Request $request){
        $this->customerAuthRepository->deviceTokenUpdateOrCreate($request->all());
    }
    public function getRooms(Request $request){
        return response()->json(["message" => "Success","rooms" => $this->customerSharedRepository->getRoomList()],200);
    }
    public function login(Request $request){
        $res=$this->customerAuthRepository->login((array)$request->post());
        return response()->json($res['data'],$res['status']);
    }

}
