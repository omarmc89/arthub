<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $table = 'roles';
    protected $primaryKey = 'id';
    public $timestamps = true;

    public function users() {
      return $this -> hasMany(User::class);
    }

    public function artists()
    {
        return $this->hasMany(Artist::class);
    }

    public function organisers()
    {
        return $this->hasMany(Organiser::class);
    }
}
