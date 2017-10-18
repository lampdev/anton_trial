<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Contact extends Model
{

    protected $table    = 'contacts';
    protected $fillable = ['user_id', 'first_name', 'last_name', 'email', 'phone', 'address'];

    public function customFields()
    {
        return $this->hasMany('App\Models\ContactsCustomFields', 'contact_id', 'id');
    }

}
