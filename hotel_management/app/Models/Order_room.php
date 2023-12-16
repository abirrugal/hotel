<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Order_room extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function room_infos(){
        return $this->hasMany(Room_info::class, 'id','room_info_id' );
    }

    public function client_reg(){
        return $this->belongsTo(Client_reg::class, 'order_room_id', 'id');
    }
}
