<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voucher extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function client_reg(){
        return $this->belongsTo(Client_reg::class,  'client_reg_id' ,'id');
    }
}
