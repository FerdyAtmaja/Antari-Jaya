@extends('layouts.dashboard')
@section('title')
    Product || Dashboard
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
                + Tambah Produk
              </button>
            </h5>
            <div class="table-responsive text-nowrap">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th style="width: 5%">No</th>
                    <th style="width: 35%">Nama Produk</th>
                    {{-- <th style="width: 20%">Kategori</th> --}}
                    <th style="width: 30%">Stok</th>
                    <th style="width: 30%">Harga</th>
                    <th style="width: 10%">Actions</th>
                  </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    <?php $no=1; ?>
                    @foreach ($product as $data)
                  <tr>
                    <td>
                      <span class="fw-medium">{{ $no++ }}</span>
                    </td>
                    <td>{{ $data->nama_produk }}</td>
                    {{-- <td>{{ $data->category->name }}</td> --}}
                    <td><span class="badge bg-label-primary me-1">{{ $data->stok }}</span></td>
                    <td>{{ $data->harga }}</td>
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
                            data-bs-target="#exLargeModalEdit{{ $data->id_produk }}">
                            <i class="bx bx-edit-alt me-1"></i> Edit
                        </button>
                        <button
                          type="button"
                          class="dropdown-item"
                          data-bs-toggle="modal"
                          data-bs-target="#modalScrollableDelete{{ $data->id_produk }}">
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
          <form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
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
                        <div class="col mb-3">
                          <label for="nameExLarge" class="form-label">Nama Produk</label>
                          <input type="text" name="name" id="nameExLarge" class="form-control" placeholder="Masukan Nama Produk" />
                        </div>
                      </div>
                      <div class="row g-2 mb-2">
                        {{-- <div class="col mb-0">
                          <label for="emailExLarge" class="form-label">Kategori</label>
                          <select name="id_category" class="form-select" id="exampleFormControlSelect1" aria-label="Default select example">
                            <option selected>--- Pilih Kategori ---</option>
                            @foreach ($category as $data)
                            <option value="{{ $data->id_category }}">{{ $data->name }}</option>
                            @endforeach
                          </select>
                        </div> --}}
                        <div class="col mb-0">
                          <label for="dobExLarge" class="form-label">Stok</label>
                          <input type="text" name="stock" id="nameExLarge" class="form-control" placeholder="Masukan Stok Produk"/>
                        </div>
                      </div>
                      <div class="row g-2 mb-2">
                        <div class="col mb-0">
                          <label for="emailExLarge" class="form-label">Harga</label>
                          <input type="text" name="price" id="nameExLarge" class="form-control" placeholder="Masukan Harga Produk" />
                        </div>
                        {{-- <div class="col mb-0">
                          <label for="dobExLarge" class="form-label">Photo</label>
                          <div class="input-group">
                            <label class="input-group-text" for="inputGroupFile01">Upload</label>
                            <input type="file" name="photo" class="form-control" id="inputGroupFile01" />
                          </div>
                        </div> --}}
                      </div>
                      {{-- <div class="row">
                        <div class="col mb-3">
                          <label for="nameExLarge" class="form-label">Deskripsi</label>
                          <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3"></textarea>
                        </div>
                      </div> --}}
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
          @foreach ($product as $data)
          <div class="modal fade" id="exLargeModalEdit{{ $data->id_produk }}" tabindex="-1" aria-hidden="true">
              <form method="POST" enctype="multipart/form-data" action="{{ route('product.update', $data->id_produk) }}">
                @csrf
                @method('PUT')
            <div class="modal-dialog modal-xl" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel4">Edit Produk</h5>
                  <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal"
                    aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col mb-3">
                          <label for="nameExLarge" class="form-label">Nama Produk</label>
                          <input type="text" name="name" id="nameExLarge" class="form-control" placeholder="Masukan Nama Produk" value="{{ $data->name }}" />
                        </div>
                      </div>
                      <div class="row g-2 mb-2">
                        <div class="col mb-0">
                          <label for="nameExLarge" class="form-label">Stok</label>
                          <input type="number" name="stock" id="nameExLarge" class="form-control" placeholder="Masukan Stok Produk" value="{{ $data->stock}}"/>
                        </div>
                        <div class="col mb-0">
                          <label for="nameExLarge" class="form-label">Harga</label>
                          <input type="number" name="price" id="nameExLarge" class="form-control" placeholder="Masukan Harga Produk" value="{{ $data->price }}"/>
                        </div>
                      </div>
                      <div class="row g-2 mb-2">
                        {{-- <div class="col mb-0">
                          <label for="dobExLarge" class="form-label">Photo</label>
                          <div class="input-group">
                            <label class="input-group-text" for="inputGroupFile01">Upload</label>
                            <input type="file" name="photo" class="form-control" id="inputGroupFile01" />
                          </div>
                        </div> --}}

                      {{-- <div class="col mb-0">
                        @if ($data->photo)
                        <img src="{{ asset('store/photo/' . $data->photo) }}" class="mt-2" width="190px" height="175px" alt="profile logo">
                         @else
                             <p>Photo Produk Tidak Ditemukan</p>
                         @endif
                    </div> --}}
                      </div>
                      <div class="row">
                        {{-- <div class="col mb-3">
                          <label for="nameExLarge" class="form-label">Deskripsi</label>
                          <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3">{{ $data->description }}</textarea>
                        </div> --}}

                        {{-- <div class="col mb-0">
                          <label for="emailExLarge" class="form-label">Kategori</label>
                          <select name="id_category" class="form-select" id="exampleFormControlSelect1" aria-label="Default select example">
                            <option selected>--- Pilih Kategori ---</option>
                              @foreach ($category as $data)
                                <option value="{{ $data->id_category }}"
                                    @if (old('id_category', $data->id_category) == $data->id_category)
                                        selected
                                    @endif>
                                    {{ $data->name }}
                                </option>
                              @endforeach
                          </select>
                        </div> --}}
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
          @foreach ($product as $data)
            <!-- Modal -->
            <div class="modal fade" id="modalScrollableDelete{{ $data->id_produk }}" tabindex="-1" aria-hidden="true">
               <div class="modal-dialog modal-dialog-scrollable" role="document">
                 <div class="modal-content">
                   <div class="modal-header">
                     <h5 class="modal-title" id="modalScrollableTitle">Hapus Kategori {{ $data->name }}</h5>
                     <button
                       type="button"
                       class="btn-close"
                       data-bs-dismiss="modal"
                       aria-label="Close"></button>
                   </div>
                   <div class="modal-body">
                     <p>
                       Apakah anda ingin menghapus kategori ini?
                     </p>
                   </div>
                   <div class="modal-footer">
                     <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                       Close
                     </button>
                     <form method="POST" action="{{ route('product.destroy', $data->id_produk) }}">
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
