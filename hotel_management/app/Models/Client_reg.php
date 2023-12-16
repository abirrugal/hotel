<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client_reg extends Model
{
    use HasFactory;
    protected $guarded = [];

    // public function room_infos(){
    //     return $this->hasMany(Room_info::class,'room_info_id', 'id');
    // }

    public function order_rooms(){
        return $this->hasMany(Order_room::class, 'order_room_id', 'id');
    }

    public function vouchers(){
        return $this->hasMany(Voucher::class,  'client_reg_id','id' );
    }


}
