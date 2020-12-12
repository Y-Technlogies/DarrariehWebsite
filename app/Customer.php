<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Customer extends Model
{
   protected $fillable = ['first_name', 'last_name', 'phone', 'address'];
   public $additional_attributes = ['full_name'];


    public function getFullNameAttribute()
    {
        return ucfirst("{$this->first_name} {$this->last_name}");
   }
}
