<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room_info extends Model
{
    use HasFactory;
    protected $guarded = [];

    // public function client(){
    //     return $this->belongsTo(Client_reg::class, 'id', 'room_info_id');
    // }

    public function order_room(){
        return $this->belongsTo(Order_room::class, 'id', 'room_info_id');
    }

    
}
