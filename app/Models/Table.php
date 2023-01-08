<?php

namespace App\Models;

use App\Models\Area;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Table extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'area_id',
        'name',
        'customer_num',
    ];

    public function users(){
        return $this->belongsTo(User::class, 'user_id','id');
    }

    public function areas(){
        return $this->belongsTo(Area::class, 'area_id','id');
    }
}
