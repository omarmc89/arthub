<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artwork extends Model
{
    use HasFactory;

    protected $table = 'artworks';
    protected $primaryKey = 'id';
    public $timestamps = true;

    public function artist() {
        return $this->belongsTo(Artist::class);
    }

    public function photo()
    {
        return $this->belongsTo(Photo::class, 'role_id', 'id');
    }

    public function painting()
    {
        return $this->belongsTo(Painting::class, 'role_id', 'id');
    }
}
