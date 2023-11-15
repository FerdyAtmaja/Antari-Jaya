@extends('layouts.dashboard')
@section('title')
    Admin || Dashboard
@endsection
@php
use App\Models\User;
use App\Models\Order;
@endphp
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-lg-6 col-md-12 col-6 mb-4">
            <div class="card">
              <div class="card-body">
                <div class="card-title d-flex align-items-start justify-content-between">
                  <div class="avatar flex-shrink-0">
                    <img
                      src="../assets/img/icons/unicons/wallet-info.png"
                      alt="chart success"
                      class="rounded" />
                  </div>
                </div>
                <span class="fw-medium d-block mb-1">Total Transaksi</span>
                {{-- <h3 class="card-title mb-2">{{ Order::count() }}</h3> --}}
                <small class="text-success fw-medium"><i class="bx bx-up-arrow-alt"></i></small>
              </div>
            </div>
          </div>
          <div class="col-lg-6 col-md-12 col-6 mb-4">
            <div class="card">
              <div class="card-body">
                <div class="card-title d-flex align-items-start justify-content-between">
                  <div class="avatar flex-shrink-0">
                    <img
                    src="../assets/img/icons/unicons/chart-success.png"
                      alt="Credit Card"
                      class="rounded" />
                  </div>
                </div>
            <span>Jumlah Customer</span>
                {{-- <h3 class="card-title text-nowrap mb-1">{{ User::where('id_role', 2)->count() }}</h3> --}}
                <small class="text-success fw-medium"><i class="bx bx-up-arrow-alt"></i></small>
              </div>
            </div>
          </div>
    </div>
</div>
@endsection
