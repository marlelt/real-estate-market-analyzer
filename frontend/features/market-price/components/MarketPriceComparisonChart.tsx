'use client';

import {
  CartesianGrid,
  Legend,
  Line,
  LineChart,
  ResponsiveContainer,
  Tooltip,
  XAxis,
  YAxis,
} from 'recharts';

import type { MarketPriceSeries } from '../types/marketPrice';

type Props = {
  baseStationName: string;
  compareStationName: string;
  baseSeries: MarketPriceSeries[];
  compareSeries: MarketPriceSeries[];
};

type ChartRow = {
  target_month: string;
  base_median_price_per_sqm?: number;
  compare_median_price_per_sqm?: number;
}

export default function MarketPriceComparisonChart({
  baseStationName,
  compareStationName,
  baseSeries,
  compareSeries,
}: Props) {
  const rowsByMonth = new Map<string, ChartRow>();

  baseSeries.forEach((row) => {
    rowsByMonth.set(row.target_month, {
      target_month: row.target_month,
      base_median_price_per_sqm: row.median_price_per_sqm,
    });
  });

  compareSeries.forEach((row) => {
    const existingRow = rowsByMonth.get(row.target_month);

    rowsByMonth.set(row.target_month, {
      target_month: row.target_month,
      base_median_price_per_sqm: existingRow?.base_median_price_per_sqm,
      compare_median_price_per_sqm: row.median_price_per_sqm,
    })
  })

  const chartData = Array.from(rowsByMonth.values()).sort((a, b) =>
    a.target_month.localeCompare(b.target_month),
  );

  if (chartData.length === 0) {
    return (
      <p className='text-sm text-gray-600'>
        指定された比較データがありません。
      </p>
    );
  }

  return (
    <div className="h-96">
      <ResponsiveContainer width="100%" height="100%">
        <LineChart data={chartData}>
          <CartesianGrid strokeDasharray="3 3" />
          <XAxis dataKey="target_month" />
          <YAxis />
          <Tooltip />
          <Legend />

          <Line
            type="monotone"
            dataKey="base_median_price_per_sqm"
            name={`${baseStationName} 中央値`}
          />

          <Line
            type="monotone"
            dataKey="compare_median_price_per_sqm"
            name={`${compareStationName} 中央値`}
          />
        </LineChart>
      </ResponsiveContainer>
    </div>
  );
}