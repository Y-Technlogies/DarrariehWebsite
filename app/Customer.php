<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Customer extends Model
{

   public $additional_attributes = ['full_name'];


    public function getFullNameAttribute()
    {
        return ucfirst("{$this->first_name} {$this->last_name}");
   }
}
