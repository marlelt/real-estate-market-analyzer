'use client';

import { useRouter, useSearchParams } from 'next/navigation';
import type {
  BuiltYearBand,
  FloorAreaBand,
  PropertyType
} from '../types/marketPrice';
import type { Station } from '@/features/station/types/station';

type Props = {
  stations: Station[];
  selectedStationId: number;
  selectedPropertyType: PropertyType;
  selectedFloorAreaBand: FloorAreaBand;
  selectedBuiltYearBand: BuiltYearBand;
};

export default function MarketPriceFilterForm({
  stations,
  selectedStationId,
  selectedPropertyType,
  selectedFloorAreaBand,
  selectedBuiltYearBand,
}: Props) {
  const router = useRouter();
  const searchParams = useSearchParams();

  const handleChange = (key: string, value: string) => {
    const params = new URLSearchParams(searchParams.toString());

    params.set(key, value);

    router.push(`?${params.toString()}`);
  };

  return (
    <div className="grid gap-4 rounded border border-gray-200 bg-white p-4 md:grid-cols-4">
      {/* 駅 */}
      <div className="flex flex-col gap-1">
        <label className="text-sm font-medium text-gray-700">駅</label>
        <select
          value={String(selectedStationId)}
          onChange={(e) => handleChange('station_id', e.target.value)}
          className="rounded border border-gray-300 bg-white px-3 py-2 text-sm text-gray-900"
        >
          {stations.map((station) => (
            <option key={station.id} value={station.id}>
              {station.display_name}
            </option>
          ))}
        </select>
      </div>

      {/* 物件種別 */}
      <div className="flex flex-col gap-1">
        <label className="text-sm font-medium text-gray-700">物件種別</label>
        <select
          value={selectedPropertyType}
          onChange={(e) => handleChange('property_type', e.target.value)}
          className="rounded border border-gray-300 bg-white px-3 py-2 text-sm text-gray-900"
        >
          <option value="mansion">マンション</option>
          <option value="house">戸建て</option>
        </select>
      </div>

      {/* 面積帯 */}
      <div className="flex flex-col gap-1">
          <label className="text-sm font-medium text-gray-700">面積帯</label>
          <select
            value={selectedFloorAreaBand}
            onChange={(e) => handleChange('floor_area_band', e.target.value)}
            className="rounded border border-gray-300 bg-white px-3 py-2 text-sm text-gray-900"
          >
            <option value="under30">30㎡未満</option>
            <option value="30_50">30~50㎡</option>
            <option value="50_70">50~70㎡</option>
            <option value="70_90">70~90㎡</option>
            <option value="90_120">90~120㎡</option>
            <option value="over120">120㎡以上</option>
          </select>
      </div>

      {/* 築年帯 */}
      <div className="flex flex-col gap-1">
          <label className="text-sm font-medium text-gray-700">築年帯</label>
          <select
            value={selectedBuiltYearBand}
            onChange={(e) => handleChange('built_year_band', e.target.value)}
            className="rounded border border-gray-300 bg-white px-3 py-2 text-sm text-gray-900"
          >
            <option value="0_5">0〜5年</option>
            <option value="6_10">6〜10年</option>
            <option value="11_20">11〜20年</option>
            <option value="21_30">21〜30年</option>
            <option value="over31">31年以上</option>
          </select>
      </div>
    </div>
  );
}