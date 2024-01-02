<!-- resources/views/reporting/index.blade.php -->

@extends('layouts.dashboard')
@section('title')
    Report 
@endsection
@section('content')

<div class="container mt-3">
    <!-- Tabel Reporting -->
    <!-- Input Filter Tanggal -->
    <div class="row mt-4">
        <div class="col-md-3">
            <label for="start_date" class="form-label">Start Date:</label>
            <input type="date" id="start_date" name="start_date" class="form-control">
        </div>
        <div class="col-md-3">
            <label for="end_date" class="form-label">End Date:</label>
            <input type="date" id="end_date" name="end_date" class="form-control">
        </div>
        <div class="col-md-3">
            <button onclick="getReportingData()" class="btn btn-primary mt-4">
                <i class="bx bx-search"></i> &nbsp; Filter
            </button>
        </div>
    </div>

    <div class="table-responsive text-nowrap mt-3">
        <h5>Tabel Reporting Rentang Waktu </h5>
        <table class="table table-hover mt-2">
            <thead>
                <tr class="nowrap">
                    <th scope="col">#</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Total Penjualan</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody id="reportingTableBody">
                <!-- Data dari AJAX akan ditampilkan di sini -->
            </tbody>
        </table>
    </div>

    <div class="row">
        <!-- Line Chart -->
        <div class="col-md-8 mb-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Grafik Penjualan Bulanan</h5>
                    <div id="lineChart" style="height: 300px;"></div>
                </div>
            </div>
        </div>

        <!-- Doughnut Chart -->
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Grafik Top 5 Produk Terjual</h5>
                    <div id="doughnutChart" style="height: 300px;"></div>
                </div>
            </div>
        </div>
    </div>

</div>



@endsection
