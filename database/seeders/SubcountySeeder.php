<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Subcounty;
use App\Models\County;

class SubcountySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $subcounties = [
    // Nairobi County
    'Nairobi' => [
        'Westlands','Kasarani','Embakasi North','Embakasi South','Embakasi Central',
        'Embakasi East','Dagoretti North','Dagoretti South','Langata','Starehe',
        'Ruaraka','Makadara','Kamukunji','Mathare',
    ],

    // Mombasa County
    'Mombasa' => ['Mvita','Jomvu','Kisauni','Changamwe','Likoni'],

    // Kwale County
    'Kwale' => ['Lungalunga','Msambweni','Matuga','Kinango'],

    // Kilifi County
    'Kilifi' => ['Kilifi North','Kilifi South','Kaloleni','Rabai','Ganze','Malindi','Magarini','Bamba'],

    // Tana River County
    'Tana River' => ['Bura','Galole','Garsen'],

    // Lamu County
    'Lamu' => ['Lamu East','Lamu West'],

    // Taita-Taveta County
    'Taita-Taveta' => ['Voi','Mwatate','Wundanyi','Taveta'],

    // Garissa County
    'Garissa' => ['Balambala','Daadab','Fafi','Garissa Township','Lagdera','Ijara'],

    // Wajir County
    'Wajir' => ['Wajir North','Wajir East','Wajir West','Wajir South','Tarbaj','Eldas','Wajir East'],

    // Mandera County
    'Mandera' => ['Mandera East','Mandera West','Mandera North','Mandera South','Banissa','Lafey','Elwak'],

    // Marsabit County
    'Marsabit' => ['North Horr','Saku','Laisamis','Saku East','Marsabit Central'],

    // Isiolo County
    'Isiolo' => ['Isiolo North','Isiolo South','Garbatulla'],

    // Meru County
    'Meru' => ['Buuri','Imenti North','Imenti South','Imenti Central','Igembe North','Igembe Central','Igembe South','Tigania East','Tigania West','North Imenti'],

    // Tharaka-Nithi County
    'Tharaka-Nithi' => ['Tharaka','Chuka','Maara','Tharaka South'],

    // Embu County
    'Embu' => ['Manyatta','Runyenjes','Mbeere North','Mbeere South'],

    // Kitui County
    'Kitui' => ['Kitui Central','Kitui East','Kitui Rural','Kitui West','Mwingi Central','Mwingi North','Mwingi West','Mutomo','Kyuso','Kitui South'],

    // Machakos County
    'Machakos' => ['Machakos Town','Masinga','Yatta','Mavoko','Kathiani','Mwala','Matungulu','Kangundo','Kangari'],

    // Makueni County
    'Makueni' => ['Makueni','Kaiti','Kilome','Mbooni','Kibwezi East','Kibwezi West'],

    // Nyandarua County
    'Nyandarua' => ['Kipipiri','Ndaragwa','Kinangop','Ol Kalou','Ol Joro Orok','Miharati'],

    // Nyeri County
    'Nyeri' => ['Nyeri Town','Tetu','Kieni East','Kieni West','Othaya','Mathira','Mukurweini'],

    // Kirinyaga County
    'Kirinyaga' => ['Kirinyaga Central','Kirinyaga East','Kirinyaga West','Mwea','Gichugu'],

    // Murang'a County
    'Murang\'a' => ['Kandara','Kigumo','Kiharu','Mathioya','Kiru','Kigumo','Kandara'],

    // Kiambu County
    'Kiambu' => ['Kiambu','Githunguri','Juja','Ruiru','Thika Town','Kiambaa','Kabete','Limuru','Lari'],

    // Turkana County
    'Turkana' => ['Loima','Turkana Central','Turkana North','Turkana South','Turkana West','Turkana East'],

    // West Pokot County
    'West Pokot' => ['Kapenguria','Pokot South','Pokot North','Sigor','Kacheliba','Pinyiny'],

    // Samburu County
    'Samburu' => ['Samburu North','Samburu East','Samburu West'],

    // Trans-Nzoia County
    'Trans-Nzoia' => ['Kwanza','Saboti','Endebess','Kiminini','Cherangany','Trans Nzoia West'],

    // Uasin Gishu County
    'Uasin Gishu' => ['Ainabkoi','Kapseret','Kesses','Moiben','Soy','Turbo','Emgwen'],

    // Elgeyo-Marakwet County
    'Elgeyo-Marakwet' => ['Keiyo North','Keiyo South','Marakwet East','Marakwet West','Marakwet Central'],

    // Nandi County
    'Nandi' => ['Chesumei','Emgwen','Aldai','Nandi Hills','Tinderet','Mosop','Kilibwoni'],

    // Baringo County
    'Baringo' => ['Baringo North','Baringo Central','Baringo South','Eldama Ravine','Tiaty'],

    // Laikipia County
    'Laikipia' => ['Laikipia East','Laikipia North','Laikipia West','Nyahururu'],

    // Nakuru County
    'Nakuru' => ['Nakuru Town East','Nakuru Town West','Naivasha','Gilgil','Subukia','Molo','Rongai','Bahati'],

    // Narok County
    'Narok' => ['Narok North','Narok South','Narok East','Narok West','Emurua Dikirr','Loita'],

    // Kajiado County
    'Kajiado' => ['Kajiado North','Kajiado Central','Kajiado East','Kajiado West','Kajiado South'],

    // Kericho County
    'Kericho' => ['Buret','Ainamoi','Belgut','Bomet East','Bomet Central'],

    // Bomet County
    'Bomet' => ['Bomet Central','Bomet East','Chepalungu','Sotik','Bomet West'],

    // Kakamega County
    'Kakamega' => ['Lugari','Likuyani','Malava','Navakholo','Mumias East','Mumias West','Matungu','Shinyalu','Ikolomani','Lurambi','Khwisero','Butere','Bumula','Mt. Elgon'],

    // Vihiga County
    'Vihiga' => ['Vihiga','Sabatia','Hamisi','Emuhaya','Luanda'],

    // Bungoma County
    'Bungoma' => ['Bungoma East','Bungoma North','Bungoma Central','Bungoma South','Mt. Elgon','Kimilili','Tongaren'],

    // Busia County
    'Busia' => ['Nambale','Butula','Budalangi','Matayos','Funyula','Busia'],

    // Siaya County
    'Siaya' => ['Siaya','Bondo','Rarieda','Gem','Ugunja'],

    // Kisumu County
    'Kisumu' => ['Kisumu West','Kisumu East','Kisumu Central','Nyando','Muhoroni','Seme','Nyakach'],

    // Homa Bay County
    'Homa Bay' => ['Homa Bay Town','Mbita','Ndhiwa','Rachuonyo North','Rachuonyo South','Suba'],

    // Migori County
    'Migori' => ['Suna East','Suna West','Nyatike','Uriri','Rongo','Awendo','Kuria West','Kuria East'],

    // Kisii County
    'Kisii' => ['Kisii Central','Kisii South','Bobasi','Gucha South','Gucha West','Bonchari'],

    // Nyamira County
    'Nyamira' => ['Borabu','Nyamira North','Nyamira South','Masaba'],

    // Nairobi County (already included above)
    'Nairobi' => ['Westlands','Kasarani','Embakasi North','Embakasi South','Embakasi Central','Embakasi East','Dagoretti North','Dagoretti South','Langata','Starehe','Ruaraka','Makadara','Kamukunji','Mathare'],
];

        foreach ($subcounties as $countyName => $subs) {
            $county = County::where('name', $countyName)->first();

            if ($county) {
                foreach ($subs as $subName) {
                    Subcounty::create([
                        'county_id' => $county->id,
                        'name' => $subName
                    ]);
                }
            }
        }
    }
}
