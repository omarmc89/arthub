<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organiser extends Model
{
    use HasFactory;

    protected $table = 'organisers';
    protected $primaryKey = 'id';
    public $timestamps = true;

    public function role() {
        return $this->hasOne(Role::class);
    }
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
  }