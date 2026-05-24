<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Station;

class StationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Station::query()->delete();

        $stations = [
            // JR根岸線
            [
                'line_name' => 'JR根岸線',
                'station_name' => '桜木町',
            ],
            [
                'line_name' => 'JR根岸線',
                'station_name' => '関内',
            ],
            [
                'line_name' => 'JR根岸線',
                'station_name' => '石川町',
            ],
            [
                'line_name' => 'JR根岸線',
                'station_name' => '山手',
            ],

            // みなとみらい線
            [
                'line_name' => 'みなとみらい線',
                'station_name' => '新高島',
            ],
            [
                'line_name' => 'みなとみらい線',
                'station_name' => 'みなとみらい',
            ],
            [
                'line_name' => 'みなとみらい線',
                'station_name' => '馬車道',
            ],
            [
                'line_name' => 'みなとみらい線',
                'station_name' => '日本大通り',
            ],
            [
                'line_name' => 'みなとみらい線',
                'station_name' => '元町・中華街',
            ],

            // ブルーライン
            [
                'line_name' => 'ブルーライン',
                'station_name' => '高島町',
            ],
            [
                'line_name' => 'ブルーライン',
                'station_name' => '伊勢佐木長者町',
            ],

            // 京急本線
            [
                'line_name' => '京急本線',
                'station_name' => '戸部',
            ],

            // 相鉄本線
            [
                'line_name' => '相鉄本線',
                'station_name' => '平沼橋',
            ],
        ];

        foreach ($stations as $station) {
            Station::create([
                'line_name' => $station['line_name'],
                'station_name' => $station['station_name'],
                'display_name' => "{$station['line_name']} {$station['station_name']}",
            ]);
        }
    }
}
