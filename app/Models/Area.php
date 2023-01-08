<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Area extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'name',
        'notes',
    ];

    public function users(){
        return $this->belongsTo(User::class, 'user_id','id');
    }
}
