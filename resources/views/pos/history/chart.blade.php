@extends('layouts.app')

@section('title', 'Chart Transaksi Harian')
@section('page_title', 'Chart Transaksi Harian')

@section('content')
  <div class="space-y-6">
    <div class="grid gap-4 sm:grid-cols-2">
      <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">
        <p class="text-xs font-semibold uppercase tracking-wide text-slate-500">Total 14 Hari</p>
        <p class="mt-2 text-2xl font-bold text-slate-900">Rp {{ number_format($totalAmount, 2, ',', '.') }}</p>
      </div>
      <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">
        <p class="text-xs font-semibold uppercase tracking-wide text-slate-500">Jumlah Transaksi 14 Hari</p>
        <p class="mt-2 text-2xl font-bold text-slate-900">{{ $totalTransactions }}</p>
      </div>
    </div>

    <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
      <div class="mb-4 flex items-center justify-between">
        <h3 class="text-lg font-semibold text-slate-900">Grafik Omzet per Hari</h3>
        <a href="{{ route('pos.transactions.index') }}"
          class="inline-flex items-center rounded-lg border border-slate-300 px-4 py-2 text-sm font-semibold text-slate-700 transition hover:border-cyan-400 hover:text-cyan-700">
          History
        </a>
      </div>
      <canvas id="dailyAmountChart" height="100"></canvas>
    </div>

    <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
      <h3 class="mb-4 text-lg font-semibold text-slate-900">Grafik Jumlah Transaksi per Hari</h3>
      <canvas id="dailyCountChart" height="100"></canvas>
    </div>
  </div>
@endsection

@push('scripts')
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script>
    (function() {
      const labels = @json($labels);
      const amountSeries = @json($amountSeries);
      const countSeries = @json($countSeries);

      const amountCtx = document.getElementById('dailyAmountChart');
      const countCtx = document.getElementById('dailyCountChart');

      if (amountCtx) {
        new Chart(amountCtx, {
          type: 'line',
          data: {
            labels,
            datasets: [{
              label: 'Omzet (Rp)',
              data: amountSeries,
              borderColor: '#0891b2',
              backgroundColor: 'rgba(8, 145, 178, 0.15)',
              fill: true,
              tension: 0.35,
              pointRadius: 3,
            }],
          },
          options: {
            responsive: true,
            plugins: {
              legend: {
                display: false
              },
            },
          },
        });
      }

      if (countCtx) {
        new Chart(countCtx, {
          type: 'bar',
          data: {
            labels,
            datasets: [{
              label: 'Jumlah Transaksi',
              data: countSeries,
              backgroundColor: 'rgba(15, 23, 42, 0.8)',
              borderRadius: 6,
            }],
          },
          options: {
            responsive: true,
            plugins: {
              legend: {
                display: false
              },
            },
          },
        });
      }
    })();
  </script>
@endpush
