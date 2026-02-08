<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Ward;
use App\Models\Subcounty;

class WardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $wards = [
            // Nairobi County
            'Westlands' => ['Kangemi', 'Parklands/Highridge', 'Kileleshwa'],
            'Kasarani' => ['Njiru', 'Kasarani', 'Ruai'],
            'Embakasi North' => ['Dandora I', 'Dandora II', 'Dandora III', 'Dandora IV'],
            'Dagoretti North' => ['Kahawa West', 'Kahawa Sukari', 'Githurai'],

            // Mombasa County
            'Mvita' => ['Shimanzi', 'Mkomani', 'Majengo'],
            'Kisauni' => ['Mtopanga', 'Junda', 'Kongowea'],

            // Kiambu County
            'Kiambu' => ['Kiambu Town', 'Ndumberi', 'Kinoo'],
            'Ruiru' => ['Ruiru Town', 'Githurai', 'Kahawa Sukari'],

            // Nakuru County
            'Nakuru East' => ['Biashara', 'Barut', 'Kivumbini'],
            'Naivasha' => ['Naivasha Town', 'Hell\'s Gate', 'Kandara'],

            // Example for Meru County
            'Buuri' => ['Timau', 'Uplands', 'Kibirichia'],

            // Add more subcounties and wards as needed...
        ];

        foreach ($wards as $subcountyName => $wardList) {
            $subcounty = Subcounty::where('name', $subcountyName)->first();

            $county = $subcounty->county;

            if ($subcounty) {
                foreach ($wardList as $wardName) {
                    Ward::create([
                        'county_id'=>$county->id,
                        'subcounty_id' => $subcounty->id,
                        'name' => $wardName,
                    ]);
                }
            }
        }
    }
}
