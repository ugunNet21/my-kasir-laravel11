<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Technician extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'phone', 'email'];

    public function services(){
        return $this->hasMany(Service::class);
    }
}
