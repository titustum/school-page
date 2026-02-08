<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\County;

class CountySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $counties = [
            'Mombasa',
            'Kwale',
            'Kilifi',
            'Tana River',
            'Lamu',
            'Taita-Taveta',
            'Garissa',
            'Wajir',
            'Mandera',
            'Marsabit',
            'Isiolo',
            'Meru',
            'Tharaka-Nithi',
            'Embu',
            'Kitui',
            'Machakos',
            'Makueni',
            'Nyandarua',
            'Nyeri',
            'Kirinyaga',
            'Murang\'a',
            'Kiambu',
            'Turkana',
            'West Pokot',
            'Samburu',
            'Trans-Nzoia',
            'Uasin Gishu',
            'Elgeyo-Marakwet',
            'Nandi',
            'Baringo',
            'Laikipia',
            'Nakuru',
            'Narok',
            'Kajiado',
            'Kericho',
            'Bomet',
            'Kakamega',
            'Vihiga',
            'Bungoma',
            'Busia',
            'Siaya',
            'Kisumu',
            'Homa Bay',
            'Migori',
            'Kisii',
            'Nyamira',
            'Nairobi'
        ];

        foreach ($counties as $county) {
            County::create(['name' => $county]);
        }
    }
}
