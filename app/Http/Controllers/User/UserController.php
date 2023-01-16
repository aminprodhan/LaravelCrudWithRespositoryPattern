<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Repository\User\UserAuthRepository;
use App\Repository\User\RoomRepository;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private UserAuthRepository $userAuthRepository;
    public function __construct(UserAuthRepository $userAuthRepository)
    {
        $this->userAuthRepository=$userAuthRepository;
    }
    public function login(Request $request){
        $res=$this->userAuthRepository->login((array)$request->post());
        return response()->json($res['data'],$res['status']);
    }
    public function handleDeviceKeyUpdateOrCreate(Request $request){
        $res=$this->userAuthRepository->deviceTokenUpdateOrCreate($request->all());
        return response()->json($res);
    }
}
