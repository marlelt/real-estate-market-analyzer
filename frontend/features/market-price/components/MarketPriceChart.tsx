'use client';

import {
  LineChart,
  Line,
  XAxis,
  YAxis,
  Tooltip,
  Legend,
  CartesianGrid,
  ResponsiveContainer,
} from 'recharts';

import type { MarketPriceSeries } from '../types/marketPrice';

type Props = {
  data: MarketPriceSeries[];
};

export default function MarketPriceChart({ data }: Props) {
  if (data.length === 0) {
    return (
      <div className="flex h-[400px] items-center justify-center rounded border border-gray-200 bg-gray-50">
        <p className="text-sm text-gray-600">
          該当する相場データがありません。
        </p>
      </div>
    );
  }

  function formatPrice(value: number): string {
    return `${(value / 10000).toFixed(1)}万円`;
  }

  function formatSeriesName(name: string): string {
    const labels: Record<string, string> = {
      median_price_per_sqm: '中央値',
      p25_price_per_sqm: 'p25',
      p75_price_per_sqm: 'p75',
    };

    return labels[name] ?? name;
  }

  return (
    <ResponsiveContainer width="100%" height={400}>
      <LineChart data={data}>
        <CartesianGrid strokeDasharray="3 3" />

        <XAxis dataKey="target_month" />

        <YAxis tickFormatter={formatPrice}/>

        <Tooltip
          formatter={(value, name) => {
            const formattedValue =
              typeof value === 'number' ? `${formatPrice(value)}/㎡` : value;

            return [formattedValue, formatSeriesName(String(name))];
        }}
        />
        <Legend />

        <Line
          type="monotone"
          dataKey="median_price_per_sqm"
          name="中央値"
          strokeWidth={3}
        />

        <Line
          type="monotone"
          dataKey="p25_price_per_sqm"
          name="p25"
        />

        <Line
          type="monotone"
          dataKey="p75_price_per_sqm"
          name="p75"
        />
      </LineChart>
    </ResponsiveContainer>
  );
}