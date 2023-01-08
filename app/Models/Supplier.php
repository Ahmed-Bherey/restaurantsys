<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Supplier extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'name',
        'code',
    ];

    public function users(){
        return $this->belongsTo(User::class, 'user_id','id');
    }
}
