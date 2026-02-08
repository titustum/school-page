<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SchoolDocument extends Model
{
    use HasFactory;

    protected $fillable = ['school_id', 'type', 'file_url', 'file_name'];

    public function school()
    {
        return $this->belongsTo(School::class);
    }
}
