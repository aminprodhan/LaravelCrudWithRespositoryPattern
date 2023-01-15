<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Repository\User\RoomRepository;
use Illuminate\Http\Request;
use App\Traits\CommonTrait;
class RoomController extends Controller
{
    private RoomRepository $roomRepository;
    public function __construct(RoomRepository $roomRepository)
    {
        $this->roomRepository=$roomRepository;
    }
    public function delete(Request $request){
        $response['list']=$this->roomRepository->deleteById($request->id);
        return response()->json($response,200);
    }
    public function store(Request $request){
        $req_data=json_decode($request->data);
        $data['data']=(array)$req_data;
        $data['updateId']=$request->updateId;
        $data['files']['data']=$request->files;
        $response=$this->roomRepository->createOrUpdate($data);
        return response()->json($response['data'],$response['status']);
    }
    public function index(Request $request){
        $response['list']=$this->roomRepository->list();
        return response()->json($response,200);
    }
    public function handleAmenities(Request $request){
        $list=CommonTrait::getAmenities();
        return response()->json($list,200);
    }
}
