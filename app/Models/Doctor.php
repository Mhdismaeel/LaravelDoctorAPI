<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;

    protected $fillable=['name','address','mobile','email','location','lon','lat','note','typeid'];


    public function types()
    {
        return $this->belongsTo(Type::class,'typeid');

    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }



}
