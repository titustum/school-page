<?php

namespace Database\Seeders;

use App\Models\County;
use App\Models\School;
use App\Models\Subcounty;
use App\Models\Ward;
use Illuminate\Database\Seeder;

class SchoolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $schools = [
            [
                'name' => 'St. Mary\'s High School',
                'county' => 'Nairobi',
                'subcounty' => 'Westlands',
                'ward' => 'Kangemi',
                'category' => 'Senior Secondary',
                'type' => 'Private',
                'gender' => 'Mixed',
                'postal_address' => 'P.O Box 12345',
                'postal_code' => '00100',
                'town' => 'Nairobi',
                'phone' => '+254700123456',
                'email' => 'info@stmarys.ac.ke',
                'fee_structure' => 'fees/st_marys_fees.pdf',
                'principal_name' => 'Jane Doe',
            ],
            [
                'name' => 'Green Valley Comprehensive School',
                'county' => 'Kiambu',
                'subcounty' => 'Kiambu',
                'ward' => 'Kiambu Town',
                'category' => 'Comprehensive',
                'type' => 'Public',
                'gender' => 'Mixed',
                'postal_address' => 'P.O Box 54321',
                'postal_code' => '00900',
                'town' => 'Kiambu',
                'phone' => '+254711987654',
                'email' => 'info@greenvalley.sc.ke',
                'fee_structure' => 'fees/greenvalley_fees.pdf',
                'principal_name' => 'John Mwangi',
            ],
            // Add more schools here...
        ];

        foreach ($schools as $schoolData) {
            $county = County::where('name', $schoolData['county'])->first();
            $subcounty = Subcounty::where('name', $schoolData['subcounty'])->first();
            $ward = Ward::where('name', $schoolData['ward'])->first();

            if ($county && $subcounty && $ward) {
                School::create([
                    'name' => $schoolData['name'],
                    'county_id' => $county->id,
                    'subcounty_id' => $subcounty->id,
                    'ward_id' => $ward->id,
                    'category' => $schoolData['category'],
                    'type' => $schoolData['type'],
                    'gender' => $schoolData['gender'],
                    'postal_address' => $schoolData['postal_address'],
                    'postal_code' => $schoolData['postal_code'],
                    'town' => $schoolData['town'],
                    'phone' => $schoolData['phone'],
                    'email' => $schoolData['email'],
                    'fee_structure' => $schoolData['fee_structure'],
                    'principal_name' => $schoolData['principal_name'] ?? null,
                ]);
            }
        }
    }
}
