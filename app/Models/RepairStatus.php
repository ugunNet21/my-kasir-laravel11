<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RepairStatus extends Model
{
    use HasFactory;
    protected $fillable = ['status'];
    public function invoices(){
        return $this->hasMany(Invoice::class);
    }
}
