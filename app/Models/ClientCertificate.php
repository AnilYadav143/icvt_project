<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientCertificate extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function getUserCertificate(){
        return $this->belongsTo(User::class,'user_id','id');
    }
}
