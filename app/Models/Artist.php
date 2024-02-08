<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artist extends Model
{
    use HasFactory;

    protected $table = 'artists';
    protected $primaryKey = 'id';
    public $timestamps = true;

    public function roles() {
        return $this->belongsTo(Role::class);
    }

    public function artworks() {
        return $this->hasMany(Artwork::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
