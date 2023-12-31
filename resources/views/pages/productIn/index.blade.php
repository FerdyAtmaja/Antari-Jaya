@extends('layouts.dashboard')
@section('title')
    Product || Product-In
@endsection
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="card">
            <h5 class="card-header">
                <button
                type="button"
                class="btn btn-primary"
                data-bs-toggle="modal"
                data-bs-target="#exLargeModal">
                + Tambah Transaksi Masuk
              </button>
            </h5>
            <div class="table-responsive text-nowrap">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th style="width: 5%">No</th>
                    <th style="width: 15%">Tanggal Masuk</th>
                    <th style="width: 25%">Nama Produk</th>
                    <th style="width: 15%">Jumlah Masuk</th>
                    <th style="width: 15%">Harga</th>
                    <th style="width: 15%">Subtotal</th>
                    <th style="width: 10%">Actions</th>
                </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    <?php $no=1; ?>
                    @foreach ($productIn as $data)
                  <tr>
                    <td>
                      <span class="fw-medium">{{ $no++ }}</span>
                    </td>
                    {{-- <td>{{ SEHARUSE KODE TRANSAKSI }}</td> --}}
                    <td>{{ $data->tanggal_masuk }}</td>
                    {{-- <td>{{ $data->id_produk }}</td>  --}}
                    <td>{{ $data->products->nama_produk }}</td>
                    <td>{{ $data->jumlah_masuk }}</span></td>
                    <td>{{ $data->harga }}</td>
                    <td>{{ $data->subtotal }}</td>
                    {{-- <td>
                          <img src="{{ asset('store/photo/' . $data->photo) }}" alt="Avatar" class="rounded-circle w-20" />
                    </td> --}}
                    <td>
                      <div class="dropdown">
                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                          <i class="bx bx-dots-vertical-rounded"></i>
                        </button>
                        <div class="dropdown-menu">
                            <button
                            type="button"
                            class="dropdown-item"
                            data-bs-toggle="modal"
                            data-bs-target="#exLargeModalEdit{{ $data->kode_transaksi_masuk }}">
                            <i class="bx bx-edit-alt me-1"></i> Edit
                        </button>
                        <button
                          type="button"
                          class="dropdown-item"
                          data-bs-toggle="modal"
                          data-bs-target="#modalScrollableDelete{{ $data->kode_transaksi_masuk }}">
                          <i class="bx bx-trash me-1"></i> Delete
                        </button>
                        </div>
                      </div>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>

          <!-- Add Transaction Modal -->
          <form action="{{ route('productIn.store') }}" method="post" enctype="multipart/form-data">
            @csrf
          <div class="modal fade" id="exLargeModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel4">Tambah Produk</h5>
                  <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal"
                    aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                      <div class="col mb-0">
                        <label for="emailExLarge" class="form-label">Nama Produk</label>
                        <select name="id_produk" class="form-select" id="exampleFormControlSelect1" aria-label="Default select example">
                          <option selected>--- Pilih Produk ---</option>
                          @foreach ($product as $data)
                          <option value="{{ $data->id_produk }}">{{ $data->nama_produk }}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                    <div class="row g-2 mb-2">
                      <div class="col mb-0">
                        <label for="emailExLarge" class="form-label">Harga</label>
                        <input type="text" name="price" id="nameExLarge" class="form-control" placeholder="Masukan Harga Produk" />
                      </div>
                    </div>
                    <div class="row g-2 mb-2">
                      <div class="col mb-0">
                        <label for="emailExLarge" class="form-label">Jumlah Masuk</label>
                        <input type="text" name="qty" id="nameExLarge" class="form-control" placeholder="Masukan Harga Produk" />
                      </div>
                      <div class="col mb-0">
                        <label for="emailExLarge" class="form-label">Subtotal</label>
                        <input type="text" name="subtotal" id="nameExLarge" class="form-control" placeholder="Masukan Harga Produk" />
                      </div>
                    </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                    Close
                  </button>
                  <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
              </div>
            </div>
          </div>
          </form>
          {{-- Edit --}}
          @foreach ($productIn as $data)
          <div class="modal fade" id="exLargeModalEdit{{ $data->kode_transaksi_masuk }}" tabindex="-1" aria-hidden="true">
              <form method="POST" enctype="multipart/form-data" action="{{ route('productIn.update', $data->kode_transaksi_masuk) }}">
                @csrf
                @method('PUT')
            <div class="modal-dialog modal-xl" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel4">Edit Data Transaksi</h5>
                  <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal"
                    aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <div class="row">
                    <div class="col mb-0">
                      <label for="emailExLarge" class="form-label">Nama Produk</label>
                      <select name="id_produk" class="form-select" id="exampleFormControlSelect1" aria-label="Default select example">
                        <option selected>--- Pilih Produk ---</option>
                        @foreach ($product as $data)
                        <option value="{{ $data->id_produk }}">{{ $data->nama_produk }}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                  <div class="row g-2 mb-2">
                    <div class="col mb-0">
                      <label for="emailExLarge" class="form-label">Harga</label>
                      <input type="text" name="price" id="nameExLarge" class="form-control" placeholder="Masukan Harga Produk" />
                    </div>
                  </div>
                  <div class="row g-2 mb-2">
                    <div class="col mb-0">
                      <label for="emailExLarge" class="form-label">Jumlah Masuk</label>
                      <input type="text" name="qty" id="nameExLarge" class="form-control" placeholder="Masukan Harga Produk" />
                    </div>
                    <div class="col mb-0">
                      <label for="emailExLarge" class="form-label">Subtotal</label>
                      <input type="text" name="subtotal" id="nameExLarge" class="form-control" placeholder="Masukan Harga Produk" />
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                    Close
                  </button>
                  <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
              </div>
            </div>
            </form>
          </div>
          @endforeach

          {{-- delete --}}
          @foreach ($productIn as $data)
            <!-- Modal -->
            <div class="modal fade" id="modalScrollableDelete{{ $data->kode_transaksi_masuk }}" tabindex="-1" aria-hidden="true">
               <div class="modal-dialog modal-dialog-scrollable" role="document">
                 <div class="modal-content">
                   <div class="modal-header">
                     <h5 class="modal-title" id="modalScrollableTitle">Hapus Transaksi {{ $data->kode_transaksi_masuk }}</h5>
                     <button
                       type="button"
                       class="btn-close"
                       data-bs-dismiss="modal"
                       aria-label="Close"></button>
                   </div>
                   <div class="modal-body">
                     <p>
                       Apakah anda ingin menghapus Transaksi ini?
                     </p>
                   </div>
                   <div class="modal-footer">
                     <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                       Close
                     </button>
                     <form method="POST" action="{{ route('productIn.destroy', $data->kode_transaksi_masuk) }}">
                       @csrf
                       @method('DELETE')
                       <button type="submit" class="btn btn-danger">Delete</button>
                   </form>
                   </div>
                 </div>
               </div>
             </div>
          @endforeach
    </div>
</div>
@endsection
