/**
 * ㎡単価を万円/㎡表記に変換する
 *
 * @param value ㎡単価（円/㎡）
 * @return 万円/㎡形式の文字列
 *
 * @example
 * 785401 → "78.5万円/㎡"
 */
export function formatPricePerSqm(value: number): string {
  return `${(value / 10000).toFixed(1)}万円/㎡`;
}