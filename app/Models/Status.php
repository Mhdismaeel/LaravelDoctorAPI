<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use  App\Models\doctor_user;
class Status extends Model
{
    use HasFactory;

    protected $table='status';

    protected $fillable=["name"];

    public function books()
    {
      return $this->hasMany(doctor_user::class);
    }
}
