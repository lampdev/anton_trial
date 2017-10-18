<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class ContactsCustomFields extends Model
{
    protected $table    = 'contacts_custom_fields';
    protected $fillable = ['contact_id', 'field_name', 'value'];

}
