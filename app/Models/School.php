<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class School extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * Mass assignable attributes
     */
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

        'logo_path',
        'motto',
        'mission',
        'vision',
        'curriculum',
        'description',
    ];

    /**
     * Attribute casting
     */
    protected $casts = [
        'latitude' => 'decimal:7',
        'longitude' => 'decimal:7',
    ];

    /**
     * Automatically generate slug & subdomain if missing
     */
    protected static function booted()
    {
        static::creating(function ($school) {
            if (empty($school->slug)) {
                $school->slug = Str::slug($school->name);
            }

            if (empty($school->subdomain)) {
                $school->subdomain = Str::slug($school->name);
            }
        });
    }

    /* =========================
     |  Relationships
     |=========================*/

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

    /* =========================
     |  Accessors
     |=========================*/

    public function getLogoUrlAttribute(): ?string
    {
        return $this->logo_path
            ? asset('storage/'.$this->logo_path)
            : null;
    }

    public function getFullAddressAttribute(): string
    {
        return collect([
            $this->address,
            optional($this->ward)->name,
            optional($this->subcounty)->name,
            optional($this->county)->name.' County',
        ])->filter()->implode(', ');
    }

    /* =========================
     |  Helpers / Scopes
     |=========================*/

    public function scopePublic($query)
    {
        return $query->where('type', 'public');
    }

    public function scopePrivate($query)
    {
        return $query->where('type', 'private');
    }

    public function scopeInCounty($query, int $countyId)
    {
        return $query->where('county_id', $countyId);
    }
}
