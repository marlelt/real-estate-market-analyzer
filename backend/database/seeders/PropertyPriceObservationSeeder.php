<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Property;
use App\Models\PropertyPriceObservation;

class PropertyPriceObservationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PropertyPriceObservation::query()->delete();

        /**
         * README用メインデータ
         *
         * みなとみらい駅
         * マンション
         * 50〜70㎡
         * 築6〜10年
         */
        $minatomiraiMansions = Property::whereHas('station', function ($query) {
                $query->where('station_name', 'みなとみらい');
            })
            ->where('property_type', 'mansion')
            ->orderBy('id')
            ->get();

        /**
         * README用グラフデータ
         *
         * 徐々に価格上昇するデータにしている
         */
        $minatomiraiMonthlyPrices = [
            '2025-11-01' => [46800000, 48200000, 49500000, 50800000, 52200000],
            '2025-12-01' => [47500000, 49000000, 50500000, 52000000, 53600000],
            '2026-01-01' => [48800000, 50500000, 52000000, 53800000, 55500000],
            '2026-02-01' => [50500000, 52200000, 54000000, 55800000, 57800000],
            '2026-03-01' => [52500000, 54500000, 56500000, 58500000, 60800000],
            '2026-04-01' => [54800000, 56800000, 59000000, 61500000, 64000000],
        ];

        foreach ($minatomiraiMonthlyPrices as $observedOn => $prices) {
            foreach ($minatomiraiMansions as $index => $property) {
                PropertyPriceObservation::create([
                    'property_id' => $property->id,
                    'observed_on' => $observedOn,
                    'price_yen' => $prices[$index],
                ]);
            }
        }

        /**
         * 比較用データ
         *
         * 馬車道駅
         * マンション
         * 50〜70㎡
         * 築6〜10年
         *
         * みなとみらい駅より少し低めの価格推移にして、
         * 比較グラフで2駅の差が分かるようにする
         */
        $bashamichiMansions = Property::whereHas('station', function ($query) {
              $query->where('station_name', '馬車道');
          })
          ->where('property_type', 'mansion')
          ->orderBy('id')
          ->get();

        $bashamichiMonthlyPrices = [
            '2025-11-01' => [38000000],
            '2025-12-01' => [39000000],
            '2026-01-01' => [40500000],
            '2026-02-01' => [42000000],
            '2026-03-01' => [43800000],
            '2026-04-01' => [45800000],
        ];

        foreach ($bashamichiMonthlyPrices as $observedOn => $prices) {
            foreach ($bashamichiMansions as $index => $property) {
                PropertyPriceObservation::create([
                    'property_id' => $property->id,
                    'observed_on' => $observedOn,
                    'price_yen' => $prices[$index],
                ]);
            }
        }

        /**
         * その他駅データ
         */
        $latestPrices  = [
          [
              'station_name' => '日本大通り',
              'property_type' => 'mansion',
              'price_yen' => 58500000,
          ],
          [
              'station_name' => '元町・中華街',
              'property_type' => 'mansion',
              'price_yen' => 62000000,
          ],
          [
              'station_name' => '桜木町',
              'property_type' => 'mansion',
              'price_yen' => 49800000,
          ],
          [
              'station_name' => '関内',
              'property_type' => 'mansion',
              'price_yen' => 43800000,
          ],
          [
              'station_name' => '石川町',
              'property_type' => 'mansion',
              'price_yen' => 45200000,
          ],
          [
              'station_name' => '新高島',
              'property_type' => 'mansion',
              'price_yen' => 76000000,
          ],
          [
              'station_name' => '山手',
              'property_type' => 'house',
              'price_yen' => 69800000,
          ],
          [
              'station_name' => '戸部',
              'property_type' => 'house',
              'price_yen' => 54800000,
          ],
          [
              'station_name' => '平沼橋',
              'property_type' => 'house',
              'price_yen' => 57500000,
          ],
          [
              'station_name' => '高島町',
              'property_type' => 'house',
              'price_yen' => 55800000,
          ],
          [
              'station_name' => '伊勢佐木長者町',
              'property_type' => 'house',
              'price_yen' => 39800000,
          ],
        ];

        foreach ($latestPrices as $latestPrice) {
            $property = Property::whereHas('station', function ($query) use ($latestPrice) {
                    $query->where('station_name', $latestPrice['station_name']);
                })
                ->where('property_type', $latestPrice['property_type'])
                ->firstOrFail();

            PropertyPriceObservation::create([
                'property_id' => $property->id,
                'observed_on' => '2026-04-01',
                'price_yen' => $latestPrice['price_yen'],
            ]);
        }

    }
}
