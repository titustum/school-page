<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class School extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'slug',
        'subdomain',
        'county_id',
        'subcounty_id',
        'ward_id',
        'latitude',
        'longitude',
        'address',
        'phone',
        'email',
        'website',
        'principal_name',
        'category',
        'type',
        'gender',
        'description',
    ];

    // ------------------------
    // Relationships
    // ------------------------

    public function county()
    {
        return $this->belongsTo(County::class);
    }

    public function subcounty()
    {
        return $this->belongsTo(Subcounty::class);
    }

    public function ward()
    {
        return $this->belongsTo(Ward::class);
    }

    public function images()
    {
        return $this->hasMany(SchoolImage::class);
    }

    public function documents()
    {
        return $this->hasMany(SchoolDocument::class);
    }

    // ------------------------
    // Accessors & Helpers
    // ------------------------

    /**
     * Get the school's main image URL or a placeholder.
     */
    public function mainImage()
    {
        return $this->images()->first()->url ?? asset('images/school-placeholder.png');
    }

    /**
     * Get the school's fee structure PDF URL (if uploaded).
     */
    public function feeStructure()
    {
        return $this->documents()->where('type', 'fee_structure')->first()?->file_url;
    }

    /**
     * Get the school's full address.
     */
    public function fullAddress()
    {
        return $this->address;
    }

    /**
     * Automatically generate a slug when creating a school.
     */
    protected static function booted()
    {
        static::creating(function ($school) {
            if (empty($school->slug)) {
                $school->slug = Str::slug($school->name);
            }

            // Optional: auto-generate subdomain from name
            if (empty($school->subdomain)) {
                $school->subdomain = Str::slug($school->name);
            }
        });
    }
}
