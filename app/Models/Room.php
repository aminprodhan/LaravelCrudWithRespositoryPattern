<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\CommonTrait;
use Illuminate\Database\Eloquent\SoftDeletes;

class Room extends Model
{
    protected $guarded = [];
    use SoftDeletes;
    use HasFactory;

    public function getAmenitiesAttribute($value)
    {
        return explode(",",$value);
    }
    public function getPhotoAttribute($value)
    {
        if(!empty($value))
            return CommonTrait::getServerBaseLink()."".CommonTrait::getRoomPhotosLocation()."".$value;
    }
    public function setPhotoAttribute($value)
    {
        if(!empty($value)){
            $exp=explode("/",$value);
            if(!empty($exp[6]))
                $this->attributes['photo'] =$exp[6];
            else
                $this->attributes['photo'] =$value;
        }
    }
}
