<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ActivitManagement extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'name',
        'desc',
        'address',
        'tel',
        'whatsapp',
        'minimum_order',
        'prepar_order_time',
        'order_time',
        'logo',
        'background',
        'receipt_from_place',
        'delivery',
        'free_delivery',
        'disable_request',
        'disable_connection_to_waiter',
        'disable_follow_order',
        'eat_on_spot',
    ];

    public function users(){
        return $this->belongsTo(User::class, 'user_id','id');
    }
}
