<?php

namespace App\Models;

use App\Models\Item;
use App\Models\User;
use App\Models\Table;
use App\Models\Client;
use App\Models\Delivery;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'client_id',
        'item_id',
        'img',
        'name',
        'price',
        'desc',
        'quantity',
    ];

    public function items(){
        return $this->belongsTo(Item::class, 'item_id','id');
    }
}
