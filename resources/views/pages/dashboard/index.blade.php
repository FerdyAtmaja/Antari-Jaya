@extends('layouts.dashboard')
@section('title')
    Admin || Dashboard
@endsection
@php
use App\Models\User;
use App\Models\Order;
@endphp
@section('content')

<div class="content-page">
  <div class="content">
    <!-- Start Content-->
    <div class="container-fluid mt-3">
          <div class="row mt-3">
            <div class="col-xxl-3 col-sm-4">
              <div class="card">
                <div class="card-body">
                  <div class="card-title d-flex align-items-start justify-content-between">
                    <div class="avatar flex-shrink-0">
                      <img
                        src="../assets/img/icons/unicons/chart-success.png"
                        alt="chart success"
                        class="rounded" />
                    </div>
                  </div>
                    <span class="fw-medium d-block mb-1">Pendapatan</span>
                      <h3 class="card-title mb-2">IDR 12,246</h3>
                      <small class="text-success fw-medium me-1"><i class="bx bx-up-arrow-alt"></i> +72.80%</small>
                        <span class="text-nowrap">dari bulan lalu</span>
                </div>
              </div>
            </div> <!-- end card 1-->

            <div class="col-xxl-3 col-sm-4">
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
                    <span class="fw-medium d-block mb-1">Produk</span>
                      <h3 class="card-title mb-2">246</h3>
                      <small class="fw-medium me-1" style="color: #4e95f8;"><i class="bx bx-up-arrow-alt"></i> +13.04%</small>
                        <span class="text-nowrap">dari bulan lalu</span>
                </div>
              </div>
            </div> <!-- end card 1-->

            <div class="col-xxl-3 col-sm-4">
              <div class="card">
                <div class="card-body">
                  <div class="card-title d-flex align-items-start justify-content-between">
                    <div class="avatar flex-shrink-0">
                      <img
                        src="../assets/img/icons/unicons/cc-primary.png"
                        alt="chart success"
                        class="rounded" />
                    </div>
                  </div>
                    <span class="fw-medium d-block mb-1">Pemesanan</span>
                      <h3 class="card-title mb-2">62</h3>
                      <small class="fw-medium me-1" style="color: #4a24f8;"><i class="bx bx-up-arrow-alt"></i> +24.50%</small>
                        <span class="text-nowrap">dari bulan lalu</span>
                </div>
              </div>
            </div> <!-- end card 1-->

          </div>

          <div class="row mt-4 mb-3">
            <div class="row">
              <!-- Order Statistics -->
              <div class="col-xxl-3 col-sm-5">
                <div class="card h-100">
                  <div class="card-header d-flex align-items-center justify-content-between pb-0">
                    <div class="card-title mb-0">
                      <h5 class="m-0 me-2">Statistik Penjualan</h5>
                        <small class="text-muted">IDR 42,85 (bulan ini)</small>
                    </div>
                  </div>
                      <div class="card-body mt-4">
                          <ul class="p-0 m-0">
                            <li class="d-flex mb-4 pb-1">
                              <div class="avatar flex-shrink-0 me-3">
                                <span class="avatar-initial rounded bg-label-primary"
                                  ><i class="bx bx-hard-hat"></i
                                ></span>
                              </div>
                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                              <div class="me-2">
                                <h6 class="mb-0">Keselamatan Kerja</h6>
                                <small class="text-muted">Helm, Rompi, Sepatu, dll</small>
                              </div>
                              <div class="user-progress">
                                <small class="fw-medium">82.5k</small>
                              </div>
                            </div>
                          </li>
                          <li class="d-flex mb-4 pb-1">
                            <div class="avatar flex-shrink-0 me-3">
                              <span class="avatar-initial rounded bg-label-success"><i class="bx bx-scatter-chart"></i></span>
                            </div>
                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                              <div class="me-2">
                                <h6 class="mb-0">Material</h6>
                                <small class="text-muted">Pasir, Semen, Besi, dll</small>
                              </div>
                              <div class="user-progress">
                                <small class="fw-medium">23.8k</small>
                              </div>
                            </div>
                          </li>
                          <li class="d-flex mb-4 pb-1">
                            <div class="avatar flex-shrink-0 me-3">
                              <span class="avatar-initial rounded bg-label-info"><i class="bx bx-cable-car"></i></span>
                            </div>
                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                              <div class="me-2">
                                <h6 class="mb-0">Alat Kontruksi</h6>
                                <small class="text-muted">Mixer, Pemotong, dll</small>
                              </div>
                              <div class="user-progress">
                                <small class="fw-medium">849k</small>
                              </div>
                            </div>
                          </li>
                          <li class="d-flex">
                            <div class="avatar flex-shrink-0 me-3">
                              <span class="avatar-initial rounded bg-label-secondary"
                                ><i class="bx bx-buildings"></i
                              ></span>
                            </div>
                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                              <div class="me-2">
                                <h6 class="mb-0">Alat Bangunan</h6>
                                <small class="text-muted">Tangga, Troli, dll</small>
                              </div>
                              <div class="user-progress">
                                <small class="fw-medium">99</small>
                              </div>
                            </div>
                          </li>
                </ul>
              </div>
            </div>
          </div>
            <!--/ Order Statistics -->
              <div class="col-xxl-3 col-sm-7">
                <div class="card h-100">
                  <div class="card-header d-flex align-items-center justify-content-between pb-0">
                    <div class="card-title mb-0">
                      <h5 class="m-0">Stok Produk</h5>
                        <small class="text-muted">Produk dengan stok tipis</small>            
                    </div>
                  </div>         
                  <div class="table-responsive text-nowrap">
                  <table class="table table-hover mt-2">
                    <thead>
                      <tr class="text-nowrap">
                        <th>#</th>
                        <th>Nama Produk</th>
                        <th>Harga Satuan</th>
                        <th>Stok</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th scope="row">1</th>
                        <td>Besi Beton</td>
                        <td>Rp90.000</td>
                        <td>12</td>
                        
                      </tr>
                      <tr>
                        <th scope="row">2</th>
                        <td>Helm Safety</td>
                        <td>Rp65,000</td>
                        <td>6</td>
                        
                      </tr>
                      <tr>
                        <th scope="row">3</th>
                        <td>Semen</td>
                        <td>Rp52.500</td>
                        <td>64</td>
                        
                      </tr>
                      <tr>
                        <th scope="row">4</th>
                        <td>Mandor</td>
                        <td>Rp15.000</td>
                        <td>3</td>    
                      </tr>
                      <tr>
                        <th scope="row">5</th>
                        <td>Bubur Kadang Ijo</td>
                        <td>Rp6000</td>
                        <td>12</td>                      
                      </tr>
                    </tbody>
                  </table>
                </div>
              

                </div>                
              </div>
    
    </div>
  </div>
</div>

@endsection
