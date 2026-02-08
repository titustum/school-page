<?php

namespace Database\Seeders;

use App\Models\Subcounty;
use App\Models\Ward;
use Illuminate\Database\Seeder;

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

            // Nyeri Town Subcounty
            'Nyeri Town' => [
                'Kahuru', 'Mukuyu', 'Kenol', 'Ruringu', 'Kiamwangi',
            ],

            // Tetu Subcounty
            'Tetu' => [
                'Konyu', 'Mukutani', 'Gituamba', 'Gakuyu', 'Magutu',
            ],

            // Mathira Subcounty
            'Mathira' => [
                'Kirimukuyu', 'Mukurweini', 'Kirimara', 'Gatitu', 'Mukurweini West',
            ],

            // Othaya Subcounty
            'Othaya' => [
                'Chinga', 'Kiamutugu', 'Mahiga', 'Kanyuki', 'Magutu',
            ],

            // Kieni Subcounty
            'Kieni East' => [
                'Gakawa', 'Kieni', 'Njabini', 'Mweiga', 'Kieni West',
            ],

            // Mukurweini Subcounty
            'Mukurweini' => [
                'Mukurweini North', 'Mukurweini South', 'Kamahuha', 'Gathage', 'Ruringu',
            ],

            // Nandi North Subcounty
            'Nandi North' => [
                'Kapkangani', 'Kobujoi', 'Chepsagai', 'Chesumei', 'Kapsabet East', 'Kapsabet West',
            ],

            // Nandi Central Subcounty
            'Nandi Central' => [
                'Chesumei', 'Tindiret', 'Kipkaren', 'Kapsang', 'Chesumei South',
            ],

            // Nandi East Subcounty
            'Nandi East' => [
                'Chesumei', 'Kapsabet', 'Kabiyet', 'Tebesonik', 'Chepsonoi',
            ],

            // Nandi South Subcounty
            'Nandi South' => [
                'Kilibwoni', 'Chepkemel', 'Kobujoi', 'Nandi Hills', 'Tindiret South',
            ],

            // Tindiret Subcounty
            'Tindiret' => [
                'Kebeneti', 'Kabiyet', 'Chesumei North', 'Kapkangani', 'Kapsaos',
            ],

            // Aldai Subcounty
            'Aldai' => [
                'Kapsang', 'Chesumei', 'Kabiyet', 'Chesumei West', 'Kobujoi',
            ],

            // Eldoret North Subcounty
            'Eldoret North' => [
                'Kapseret', 'Kaptagat', 'Ziwa', 'Kesses', 'Kipsomba', 'Tarakwa',
            ],

            // Eldoret East Subcounty
            'Eldoret East' => [
                'Kimumu', 'Soy', 'Kapsoya', 'Turbo', 'Kipchamo',
            ],

            // Eldoret West Subcounty
            'Eldoret West' => [
                'Kapseret', 'Moiben', 'Soy', 'Kimumu', 'Kipkenyo',
            ],

            // Ainabkoi Subcounty
            'Ainabkoi' => [
                'Kesses', 'Langas', 'Kapsoya', 'Kimumu', 'Turbo',
            ],

            // Kesses Subcounty
            'Kesses' => [
                'Cheptiret', 'Kesses', 'Kapseret', 'Kosirai', 'Tarakwa',
            ],

            // Soy Subcounty
            'Soy' => [
                'Kapseret', 'Soy', 'Kesses', 'Cheptiret', 'Langas',
            ],

            // Kisumu East Subcounty
            'Kisumu East' => [
                'Kibuye', 'Manyatta A', 'Manyatta B', 'Kolwa Central', 'Kolwa East',
            ],

            // Kisumu West Subcounty
            'Kisumu West' => [
                'Kondele', 'Nyalenda A', 'Nyalenda B', 'Central Kisumu',
            ],

            // Kisumu Central Subcounty
            'Kisumu Central' => [
                'Nyalenda A', 'Nyalenda B', 'Kondele', 'Kolwa East', 'Kolwa Central',
            ],

            // Nyando Subcounty
            'Nyando' => [
                'Koru', 'Kobura', 'Miwani', 'Muhoroni', 'Chemelil',
            ],

            // Muhoroni Subcounty
            'Muhoroni' => [
                'Chemelil', 'Miwani', 'Koru', 'Kobura', 'Koru North',
            ],

            // Nyakach Subcounty
            'Nyakach' => [
                'Kodero', 'Okawo', 'West Nyakach', 'Central Nyakach', 'East Nyakach',
            ],

            // Seme Subcounty
            'Seme' => [
                'Ahero', 'Rangemo', 'Koru', 'Bondo', 'Seme East',
            ],

            // Add more subcounties and wards as needed...
        ];

        $allWards = [];
        foreach ($wards as $subcountyName => $wardList) {
            $subcounty = Subcounty::where('name', $subcountyName)->first();
            if (! $subcounty) {
                $this->command->warn("Subcounty not found: $subcountyName");
                continue;
            }
            $countyId = $subcounty->county_id;

            foreach ($wardList as $wardName) {
                $allWards[] = [
                    'county_id' => $countyId,
                    'subcounty_id' => $subcounty->id,
                    'name' => $wardName,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }
        }

        Ward::insert($allWards);

    }
}
