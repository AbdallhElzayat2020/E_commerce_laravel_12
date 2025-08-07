<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
//        DB::table('countries')->truncate();
        $countries = [
            ['id' => 1,
                'name' => [
                    'en' => 'Egypt',
                    'ar' => 'مصر',
                ],
                'phone_code' => '20',
            ],
            ['id' => 2,
                'name' => [
                    'en' => 'Saudi Arabia',
                    'ar' => 'المملكة العربية السعودية',
                ],
                'phone_code' => '966',
            ],
            ['id' => 3,
                'name' => [
                    'en' => 'United Arab Emirates',
                    'ar' => 'الإمارات العربية المتحدة',
                ],
                'phone_code' => '971',
            ],
            [
                'id' => 4,
                'name' => [
                    'en' => 'Kuwait',
                    'ar' => 'الكويت',
                ],
                'phone_code' => '965',
            ],
            [
                'id' => 5,
                'name' => [
                    'en' => 'Qatar',
                    'ar' => 'قطر',
                ],
                'phone_code' => '974',
            ],
            [
                'id' => 6,
                'name' => [
                    'en' => 'Bahrain',
                    'ar' => 'البحرين',
                ],
                'phone_code' => '973',
            ],
            [
                'id' => 7,
                'name' => [
                    'en' => 'Oman',
                    'ar' => 'عمان',
                ],
                'phone_code' => '968',
            ],
            [
                'id' => 8,
                'name' => [
                    'en' => 'Jordan',
                    'ar' => 'الأردن',
                ],
                'phone_code' => '962',
            ],
            [
                'id' => 9,
                'name' => [
                    'en' => 'Iraq',
                    'ar' => 'العراق',
                ],
                'phone_code' => '964',
            ],
            [
                'id' => 10,
                'name' => [
                    'en' => 'Syria',
                    'ar' => 'سوريا',
                ],
                'phone_code' => '963',
            ],
            [
                'id' => 11,
                'name' => [
                    'en' => 'Lebanon',
                    'ar' => 'لبنان',
                ],
                'phone_code' => '961',
            ]
        ];

        foreach ($countries as $country) {
            Country::updateOrCreate($country);
        }
    }
}
