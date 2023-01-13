<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function setCheckInDateAttribute($value)
    {
        $this->attributes['check_in_date'] = date('Y-m-d',strtotime($value));
    }
    public function setCheckOutDateAttribute($value)
    {
        $this->attributes['check_out_date'] = date('Y-m-d',strtotime($value));
    }
    public function getCheckInDateAttribute($value)
    {
        return date('d-m-Y',strtotime($value));
    }
    public function getCheckOutDateAttribute($value)
    {
        return date('d-m-Y',strtotime($value));
    }
}
