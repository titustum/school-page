<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ward extends Model
{
    use HasFactory;

    protected $fillable = ['county_id', 'subcounty_id','name'];

    public function subcounty()
    {
        return $this->belongsTo(Subcounty::class);
    }

    public function county()
    {
        return $this->belongsTo(County::class);
    }

    public function schools()
    {
        return $this->hasMany(School::class);
    }
}
