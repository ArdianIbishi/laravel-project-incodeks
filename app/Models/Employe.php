<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employe extends Model
{
    use HasFactory;

    protected $fillable=[
        'first_name',
        'last_name',
        'store_id',
        'email',
        'phone_number'
    ];

    public function store(){
        return $this->belongsTo(Store::class);
    }
}
