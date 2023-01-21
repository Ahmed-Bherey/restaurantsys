<?php

namespace App\Models;

use App\Models\User;
use App\Models\Order;
use App\Models\Table;
use App\Models\Client;
use App\Models\Delivery;
use App\Models\OrderHidden;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OrderTotal extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'client_id',
        'orderHidden_id',
        'table_id',
        'delivery_id',
        'receive_way',
        'receive_time',
        'tel',
        'address',
        'notes',
    ];

    public function users(){
        return $this->belongsTo(User::class, 'user_id','id');
    }

    public function clients(){
        return $this->belongsTo(Client::class, 'client_id','id');
    }

    public function order_hiddens(){
        return $this->belongsTo(OrderHidden::class, 'orderHidden_id','id');
    }

    public function tables(){
        return $this->belongsTo(Table::class, 'table_id','id');
    }

    public function deliveries(){
        return $this->belongsTo(Delivery::class, 'delivery_id','id');
    }

    public function orders(){
        return $this->hasMany(Order::class, 'orderTotal_id','id');
    }
}
