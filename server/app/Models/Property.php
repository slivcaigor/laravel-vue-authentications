<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;
    protected $fillable = [
        
        'title',
        'description',
        'room_number',
        'bath_number',
        'mq2',
        'address',
        'lat',
        'lon',
        'img',
        'visible',
        'price_per_night',
        'bed_number',

    ];

    public function user(){
        return $this -> belongsTo(User :: class);
    }
    public function services(){
        return $this -> belongsToMany(Service :: class);
    }
    public function sponsorships(){
        return $this -> belongsToMany(Sponsorship :: class);
    }

    public function messages(){
        return $this -> hasMany(Property :: class);
    }

    public function views(){
        return $this -> hasMany(View :: class);
    }
}
