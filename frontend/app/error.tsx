'use client';

type Props = {
  error: Error;
  reset: () => void;
};

export default function Error({ error, reset }: Props) {
  return (
    <main className="min-h-screen bg-gray-50 p-8 text-gray-900">
      <div className="mx-auto flex min-h-[60vh] max-w-3xl items-center justify-center">
        <div className="rounded border border-red-200 bg-white p-6 shadow-sm">
          <h1 className="text-xl font-bold text-red-700">
            データの取得に失敗しました
          </h1>

          <p className="mt-3 text-sm text-gray-600">
            時間をおいて再度お試しください。
          </p>

          <p className="mt-4 rounded bg-red-50 p-3 text-sm text-red-700">
            {error.message}
          </p>

          <button
            type="button"
            onClick={reset}
            className="mt-6 rounded bg-gray-900 px-4 py-2 text-sm font-medium text-white hover:bg-gray-700"
          >
            再試行する
          </button>
        </div>
      </div>
    </main>
  );
}