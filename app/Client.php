<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = ['name', 'surname'];

    public function payments()
    {
        return $this->hasMany('App\Payment', 'user_id');
    }

}
