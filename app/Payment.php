<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{

    protected $fillable = ['user_id', 'amount'];

    public function client()
    {
        return $this->belongsTo('App\Client', 'user_id');
    }

    /**
     * Scope a query to only filter the payments of each user.
     */
    public function scopeFilterPayments($query, $start_date, $end_date)
    {
        return $query->whereBetween('created_at', [$start_date, $end_date]);
    }
}
