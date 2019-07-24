<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = ['first_name', 'last_name', 'company_id', 'email', 'phone', 'admin_id'];


//    public function creator()
//    {
//        return $this->belongsTo(User::class);
//    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

}
