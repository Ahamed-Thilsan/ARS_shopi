<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function orders(){
        return $this->hasMany('App\OrderProduct','order_id');
    }

    public function getOrderDetails(){
        $getOrderDetails = Order::where('id',$order_id)->first();
        return $getOrderDetails;
    }

}
