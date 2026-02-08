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
        $schools = [
            [
                'name' => 'Lenana School',
                'category' => 'senior secondary',
                'type' => 'public',
                'gender' => 'male',
                'motto' => 'Strive to Excel',
                'mission' => 'To nurture disciplined and academically excellent students.',
                'vision' => 'A centre of academic excellence and leadership.',
                'curriculum' => '8-4-4',
                'email' => 'info@lenanaschool.ac.ke',
                'phone' => '+254 700 111 222',
            ],
            [
                'name' => 'Alliance High School',
                'category' => 'senior secondary',
                'type' => 'public',
                'gender' => 'male',
                'motto' => 'Strong to Serve',
                'curriculum' => '8-4-4',
            ],
            [
                'name' => 'Kenya High School',
                'category' => 'senior secondary',
                'type' => 'public',
                'gender' => 'female',
                'motto' => 'Lux in Tenebris',
            ],
            [
                'name' => 'Moi Girls Eldoret',
                'category' => 'senior secondary',
                'type' => 'public',
                'gender' => 'female',
            ],
            [
                'name' => 'Starehe Boys Centre',
                'category' => 'senior secondary',
                'type' => 'public',
                'gender' => 'male',
            ],
            [
                'name' => 'Brookhouse School',
                'category' => 'comprehensive',
                'type' => 'private',
                'gender' => 'mixed',
                'curriculum' => 'IGCSE',
            ],
            [
                'name' => 'Riara Springs Academy',
                'category' => 'comprehensive',
                'type' => 'private',
                'gender' => 'mixed',
                'curriculum' => 'CBC',
            ],
            [
                'name' => 'Kisumu Boys High School',
                'category' => 'senior secondary',
                'type' => 'public',
                'gender' => 'male',
            ],
            [
                'name' => 'Nakuru Girls High School',
                'category' => 'senior secondary',
                'type' => 'public',
                'gender' => 'female',
            ],
            [
                'name' => 'Chebara High School',
                'category' => 'senior secondary',
                'type' => 'public',
                'gender' => 'mixed',
            ],
        ];

        foreach ($schools as $data) {

            // Pick a random valid location
            $subcounty = Subcounty::inRandomOrder()->first();

            $countyId = $subcounty->county->id;

            $ward = Ward::where('subcounty_id', $subcounty->id)
                        ->inRandomOrder()
                        ->first();

            if(!$ward) continue;

            School::updateOrCreate(
                ['name' => $data['name']],
                array_merge($data, [
                    'slug' => Str::slug($data['name']),
                    'subdomain' => Str::slug($data['name']),
                    'county_id' => $countyId,
                    'subcounty_id' => $subcounty->id,
                    'ward_id' => $ward->id,
                    'address' => $ward->name.', '.$subcounty->name,
                    'description' => 'An established institution offering quality education and holistic student development.',
                ])
            );
        }
    }
}
