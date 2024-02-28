<?php

namespace App\Models;

use App\Models\Client;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ClientOpinion extends Model
{
    use HasFactory;
    protected $fillable = [
        'clicnt_id',
        'opinion',
    ];

    public function clicnts(){
        return $this->belongsTo(Client::class, 'clicnt_id','id');
    }
}
