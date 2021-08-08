<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use app\Models\Status;
class doctor_user extends Model
{
    use HasFactory;
    protected $table='doctor_user';

    protected $fillable=['doctor_id','user_id','bookingdate','status_id'];

    protected $casts = [
        'bookingdate' => 'datetime',
    ];

    public function status()
    {
        return $this->belongsTo(Status::class);
    }



}
