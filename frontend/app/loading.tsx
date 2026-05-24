export default function Loading() {
  return (
    <main className="min-h-screen bg-gray-50 p-8 text-gray-900">
      <div className="mx-auto max-w-7xl">
        <div className="h-8 w-64 animate-pulse rounded bg-gray-200" />
        <div className="mt-4 h-5 w-80 animate-pulse rounded bg-gray-200" />

        <div className="mt-8 grid gap-4 rounded border border-gray-200 bg-white p-4 md:grid-cols-4">
          <div className="h-16 animate-pulse rounded bg-gray-100" />
          <div className="h-16 animate-pulse rounded bg-gray-100" />
          <div className="h-16 animate-pulse rounded bg-gray-100" />
          <div className="h-16 animate-pulse rounded bg-gray-100" />
        </div>

        <div className="mt-8 rounded border border-gray-200 bg-white p-4">
          <div className="h-6 w-40 animate-pulse rounded bg-gray-200" />
          <div className="mt-2 h-4 w-96 animate-pulse  rounded bg-gray-200" />
          <div className="mt-6 h-[400px] animate-pulse rounded  bg-gray-100" />
        </div>
      </div>
    </main>
  );
}