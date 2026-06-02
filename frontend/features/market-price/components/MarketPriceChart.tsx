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

import { formatPricePerSqm } from '../utils/formatPricePerSqm';

import type { MarketPriceSeries } from '../types/marketPrice';

type Props = {
  data: MarketPriceSeries[];
};

const tooltipItemOrder: Record<string, number> = {
  p25: 1,
  中央値: 2,
  p75: 3,
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

  return (
    <ResponsiveContainer width="100%" height={400}>
      <LineChart
        data={data}
        margin={{
          top: 16,
          right: 16,
          left: 72,
          bottom: 24,
        }}
      >
        <CartesianGrid strokeDasharray="3 3" />

        <XAxis dataKey="target_month" />

        <YAxis
          width={88}
          tickFormatter={formatPricePerSqm}
        />

        <Tooltip
          itemSorter={(item) => tooltipItemOrder[String(item.name)] ?? 99}
          formatter={(value, name) => {
            const formattedValue =
              typeof value === 'number' ? formatPricePerSqm(value) : value;

            return [formattedValue, name];
          }}
        />
        <Legend />

        <Line
          type="monotone"
          dataKey="p25_price_per_sqm"
          name="p25"
        />

        <Line
          type="monotone"
          dataKey="median_price_per_sqm"
          name="中央値"
          strokeWidth={3}
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