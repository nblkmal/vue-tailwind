<?php

namespace App\Models;

use App\Models\City;
use App\Models\State;
use App\Models\Country;
use App\Models\Department;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Employee extends Model
{
    use HasFactory, HasRoles;

    protected $guard_name = 'web';
    
    protected $appends = [
        'full_name',
        'full_address',
        'department_name',
    ];

    // TODO: cast date using carbon
    
    protected $fillable = [
        'profile_picture',
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

    public function getFullNameAttribute()
    {
        return ucfirst($this->attributes['first_name'])." ".ucfirst($this->attributes['last_name']);
    }

    public function getFullAddressAttribute()
    {
        return ucfirst($this->attributes['address']).", ".$this->city->name.", ".$this->state->name;
    }

    public function getDepartmentNameAttribute()
    {
        return $this->department->name ?? '';
    }

    public function department()
    {
        return $this->belongsTo(Department::class, 'department_id');
    }

    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }

    public function state()
    {
        return $this->belongsTo(State::class, 'state_id');
    }

    public function city()
    {
        return $this->belongsTo(City::class, 'city_id');
    }

}
