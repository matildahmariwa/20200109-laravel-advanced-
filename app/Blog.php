<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{

    protected $fillable =[


    ];

    protected $table='blogs';
    public $timestamps=true;

    public function user(){
        return $this->belongsTo('App\user');
    }
    public function scopeCategory($query)
    {
        return $query->where('category', 2);
    }
    public function setTitleNameAttribute($value)
    {
       return $this->attributes['title'] = ucfirst($value);
    }
}
