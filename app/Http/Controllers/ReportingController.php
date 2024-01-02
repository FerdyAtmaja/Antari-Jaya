<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductIn;
use App\Models\ProductOut;
use Carbon\Carbon;

class ReportingController extends Controller
{
    public function index()
    {
        return view('pages.report.index');
    }

    public function getMonthlySalesData(Request $request)
    {
        $startDate = Carbon::parse($request->start_date)->startOfMonth();
        $endDate = Carbon::parse($request->end_date)->endOfMonth();

        // Get data penjualan bulanan
        $productOutData = ProductOut::whereBetween('tanggal_keluar', [$startDate, $endDate])->get();

        $salesData = $productOutData->groupBy(function ($date) {
            return Carbon::parse($date->tanggal_keluar)->format('Y-m-d');
        })->map(function ($group) {
            return [
                'date' => $group->first()->tanggal_keluar->format('Y-m-d'),
                'total_sales' => $group->sum('subtotal'),
            ];
        })->values();

        return response()->json(['salesData' => $salesData]);
    }

    public function getTop5ProductsData(Request $request)
    {
        $startDate = Carbon::parse($request->start_date)->startOfMonth();
        $endDate = Carbon::parse($request->end_date)->endOfMonth();

        // Get data top 5 produk terjual
        $productOutData = ProductOut::whereBetween('tanggal_keluar', [$startDate, $endDate])->get();

        $topProducts = $productOutData->groupBy('id_produk')
            ->sortByDesc(function ($group) {
                return $group->sum('jumlah_keluar');
            })->take(5)->map(function ($group) {
                $productId = $group->first()->id_produk;
                $product = Product::find($productId);
                return [
                    'id_produk' => $productId,
                    'total_sold' => $group->sum('jumlah_keluar'),
                    'product_name' => $product ? $product->nama_produk : 'Unknown',
                ];
            })->values();

        return response()->json(['topProducts' => $topProducts]);
    }

}
