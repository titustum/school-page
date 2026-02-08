<?php

namespace Database\Seeders;

use App\Models\County;
use App\Models\School;
use App\Models\Subcounty;
use App\Models\Ward;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class SchoolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Example schools array
        $schools = [
            [
                'name' => 'Nairobi West High School',
                'subdomain' => 'nairowest',
                'county' => 'Nairobi',
                'subcounty' => 'Westlands',
                'ward' => 'Kangemi',
                'category' => 'senior secondary',
                'type' => 'private',
                'gender' => 'mixed',
                'phone' => '0712345678',
                'email' => 'info@westnairobihs.co.ke',
                'address' => 'P.O Box 123, Nairobi',
                'latitude' => -1.265,
                'longitude' => 36.812,
                'description' => 'A top private school in West Nairobi.',
            ],
            [
                'name' => 'Mombasa Comprehensive School',
                'subdomain' => 'mombasa-comprehensive',
                'county' => 'Mombasa',
                'subcounty' => 'Mvita',
                'ward' => 'Majengo',
                'category' => 'comprehensive',
                'type' => 'public',
                'gender' => 'mixed',
                'phone' => '0723456789',
                'email' => 'contact@mombasatech.co.ke',
                'address' => 'P.O Box 456, Mombasa',
                'latitude' => -4.0435,
                'longitude' => 39.6682,
                'description' => 'Public comprehensive school serving Mombasa region.',
            ],
            // Add more schools here...
        ];

        foreach ($schools as $data) {
            $county = County::where('name', $data['county'])->first();
            $subcounty = Subcounty::where('name', $data['subcounty'])
                ->where('county_id', $county->id)
                ->first();
            $ward = Ward::where('name', $data['ward'])
                ->where('subcounty_id', $subcounty->id)
                ->first();

            if (! $county || ! $subcounty || ! $ward) {
                $this->command->warn("Location not found for school: {$data['name']}");

                continue;
            }

            School::updateOrCreate(
                ['subdomain' => $data['subdomain']],
                [
                    'name' => $data['name'],
                    'slug' => Str::slug($data['name']),
                    'county_id' => $county->id,
                    'subcounty_id' => $subcounty->id,
                    'ward_id' => $ward->id,
                    'category' => $data['category'],
                    'type' => $data['type'],
                    'gender' => $data['gender'],
                    'phone' => $data['phone'],
                    'email' => $data['email'],
                    'address' => $data['address'],
                    'latitude' => $data['latitude'],
                    'longitude' => $data['longitude'],
                    'description' => $data['description'] ?? null,
                ]
            );
        }
    }
}
