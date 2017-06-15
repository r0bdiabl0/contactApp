<?php

namespace contactApp;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = [
        'contact_type',
        'contact_type_additional_info',
        'name',
        'email_address',
        'address',
        'city',
        'state',
        'postal_code',
        'phone_number_1',
        'phone_number_1_type',
        'phone_number_2',
        'phone_number_2_type',
        'phone_number_3',
        'phone_number_3_type'
    ];

    public function user()
    {
        return $this->belongsTo('contactApp\User');
    }
}
