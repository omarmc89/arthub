<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Painting extends Model
{
    use HasFactory;

    protected $table = 'paintings';
    protected $primaryKey = 'id';
    public $timestamps = true;

    public function artwork() {
        return $this->belongsTo(Artwork::class);
    }
}
