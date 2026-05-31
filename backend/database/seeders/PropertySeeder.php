<?php

namespace Database\Seeders;

use App\Models\Property;
use App\Models\Station;
use Illuminate\Database\Seeder;

class PropertySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Property::query()->delete();

        $stations = Station::all()->keyBy('station_name');

        $properties = [
            /**
             * README用メインデータ
             *
             * みなとみらい駅
             * マンション
             * 50〜70㎡
             * 築6〜10年
             */
            [
                'station_name' => 'みなとみらい',
                'property_type' => 'mansion',
                'floor_area_sqm' => 62.10,
                'built_year' => 2018,
                'walk_minutes' => 6,
                'building_structure' => 'rc',
                'has_parking' => false,
                'is_new_build' => false,
                'management_fee_yen' => 17000,
            ],
            [
                'station_name' => 'みなとみらい',
                'property_type' => 'mansion',
                'floor_area_sqm' => 64.80,
                'built_year' => 2017,
                'walk_minutes' => 8,
                'building_structure' => 'rc',
                'has_parking' => false,
                'is_new_build' => false,
                'management_fee_yen' => 18500,
            ],
            [
                'station_name' => 'みなとみらい',
                'property_type' => 'mansion',
                'floor_area_sqm' => 66.30,
                'built_year' => 2019,
                'walk_minutes' => 7,
                'building_structure' => 'rc',
                'has_parking' => false,
                'is_new_build' => false,
                'management_fee_yen' => 19000,
            ],
            [
                'station_name' => 'みなとみらい',
                'property_type' => 'mansion',
                'floor_area_sqm' => 68.50,
                'built_year' => 2018,
                'walk_minutes' => 9,
                'building_structure' => 'rc',
                'has_parking' => false,
                'is_new_build' => false,
                'management_fee_yen' => 18000,
            ],
            [
                'station_name' => 'みなとみらい',
                'property_type' => 'mansion',
                'floor_area_sqm' => 69.90,
                'built_year' => 2016,
                'walk_minutes' => 5,
                'building_structure' => 'rc',
                'has_parking' => false,
                'is_new_build' => false,
                'management_fee_yen' => 21000,
            ],

            /**
             * 周辺駅データ
             */
            [
                'station_name' => '馬車道',
                'property_type' => 'mansion',
                'floor_area_sqm' => 58.70,
                'built_year' => 2018,
                'walk_minutes' => 6,
                'building_structure' => 'src',
                'has_parking' => false,
                'is_new_build' => false,
                'management_fee_yen' => 20000,
            ],
            [
                'station_name' => '日本大通り',
                'property_type' => 'mansion',
                'floor_area_sqm' => 61.20,
                'built_year' => 2014,
                'walk_minutes' => 7,
                'building_structure' => 'rc',
                'has_parking' => false,
                'is_new_build' => false,
                'management_fee_yen' => 19500,
            ],
            [
                'station_name' => '元町・中華街',
                'property_type' => 'mansion',
                'floor_area_sqm' => 63.80,
                'built_year' => 2016,
                'walk_minutes' => 8,
                'building_structure' => 'rc',
                'has_parking' => false,
                'is_new_build' => false,
                'management_fee_yen' => 20500,
            ],
            [
                'station_name' => '桜木町',
                'property_type' => 'mansion',
                'floor_area_sqm' => 55.80,
                'built_year' => 2012,
                'walk_minutes' => 8,
                'building_structure' => 'rc',
                'has_parking' => false,
                'is_new_build' => false,
                'management_fee_yen' => 17500,
            ],
            [
                'station_name' => '関内',
                'property_type' => 'mansion',
                'floor_area_sqm' => 48.60,
                'built_year' => 2010,
                'walk_minutes' => 9,
                'building_structure' => 'src',
                'has_parking' => false,
                'is_new_build' => false,
                'management_fee_yen' => 16000,
            ],
            [
                'station_name' => '石川町',
                'property_type' => 'mansion',
                'floor_area_sqm' => 52.30,
                'built_year' => 2008,
                'walk_minutes' => 10,
                'building_structure' => 'rc',
                'has_parking' => false,
                'is_new_build' => false,
                'management_fee_yen' => 15000,
            ],
            [
                'station_name' => '新高島',
                'property_type' => 'mansion',
                'floor_area_sqm' => 70.10,
                'built_year' => 2021,
                'walk_minutes' => 5,
                'building_structure' => 'rc',
                'has_parking' => true,
                'is_new_build' => false,
                'management_fee_yen' => 24000,
            ],

            [
                'station_name' => '山手',
                'property_type' => 'house',
                'floor_area_sqm' => 103.20,
                'built_year' => 2024,
                'walk_minutes' => 18,
                'building_structure' => 'wood',
                'has_parking' => true,
                'is_new_build' => true,
                'management_fee_yen' => null,
            ],
            [
                'station_name' => '石川町',
                'property_type' => 'house',
                'floor_area_sqm' => 94.80,
                'built_year' => 2019,
                'walk_minutes' => 14,
                'building_structure' => 'wood',
                'has_parking' => true,
                'is_new_build' => false,
                'management_fee_yen' => null,
            ],
            [
                'station_name' => '戸部',
                'property_type' => 'house',
                'floor_area_sqm' => 86.40,
                'built_year' => 2016,
                'walk_minutes' => 12,
                'building_structure' => 'wood',
                'has_parking' => true,
                'is_new_build' => false,
                'management_fee_yen' => null,
            ],
            [
                'station_name' => '平沼橋',
                'property_type' => 'house',
                'floor_area_sqm' => 91.50,
                'built_year' => 2018,
                'walk_minutes' => 11,
                'building_structure' => 'wood',
                'has_parking' => true,
                'is_new_build' => false,
                'management_fee_yen' => null,
            ],
            [
                'station_name' => '高島町',
                'property_type' => 'house',
                'floor_area_sqm' => 88.20,
                'built_year' => 2015,
                'walk_minutes' => 13,
                'building_structure' => 'wood',
                'has_parking' => true,
                'is_new_build' => false,
                'management_fee_yen' => null,
            ],
            [
                'station_name' => '伊勢佐木長者町',
                'property_type' => 'house',
                'floor_area_sqm' => 78.60,
                'built_year' => 2012,
                'walk_minutes' => 15,
                'building_structure' => 'wood',
                'has_parking' => false,
                'is_new_build' => false,
                'management_fee_yen' => null,
            ],
        ];

        foreach ($properties as $property) {
            Property::create([
                'station_id' => $stations[$property['station_name']]->id,
                'property_type' => $property['property_type'],
                'floor_area_sqm' => $property['floor_area_sqm'],
                'built_year' => $property['built_year'],
                'walk_minutes' => $property['walk_minutes'],
                'building_structure' => $property['building_structure'],
                'has_parking' => $property['has_parking'],
                'is_new_build' => $property['is_new_build'],
                'management_fee_yen' => $property['management_fee_yen'],
            ]);
        }
    }
}