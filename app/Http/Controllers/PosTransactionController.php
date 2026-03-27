<?php

namespace App\Http\Controllers;

use App\Models\PosOrder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class PosTransactionController extends Controller
{
    public function index(): View
    {
        $orders = PosOrder::latest()->paginate(12);

        return view('pos.history.index', compact('orders'));
    }

    public function show(PosOrder $order): View
    {
        $order->load(['items.product']);

        return view('pos.history.show', compact('order'));
    }

    public function chart(): View
    {
        $days = 14;
        $startDate = Carbon::today()->subDays($days - 1);

        $rows = PosOrder::query()
            ->selectRaw('DATE(created_at) as trx_date, COUNT(*) as total_transactions, COALESCE(SUM(total_amount), 0) as total_amount')
            ->whereDate('created_at', '>=', $startDate)
            ->groupBy(DB::raw('DATE(created_at)'))
            ->orderBy('trx_date')
            ->get()
            ->keyBy('trx_date');

        $labels = [];
        $amountSeries = [];
        $countSeries = [];

        for ($i = 0; $i < $days; $i++) {
            $date = $startDate->copy()->addDays($i);
            $dateKey = $date->toDateString();
            $row = $rows->get($dateKey);

            $labels[] = $date->format('d M');
            $amountSeries[] = (float) ($row->total_amount ?? 0);
            $countSeries[] = (int) ($row->total_transactions ?? 0);
        }

        return view('pos.history.chart', [
            'labels' => $labels,
            'amountSeries' => $amountSeries,
            'countSeries' => $countSeries,
            'totalAmount' => array_sum($amountSeries),
            'totalTransactions' => array_sum($countSeries),
        ]);
    }

    public function receipt(PosOrder $order): View
    {
        $order->load('items');

        return view('pos.history.receipt', compact('order'));
    }
}
