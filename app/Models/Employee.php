<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'address',
        'department_id',
        'country_id',
        'state_id',
        'city_id',
        'zip_code',
        'birthdate',
        'date_hired',
    ];

    public function getFirstNameAttribute()
    {
        return ucfirst($this->attributes['first_name']);
    }

    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }
}
