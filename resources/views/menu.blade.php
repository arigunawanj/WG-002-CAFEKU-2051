@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col">
                <a href="" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#tambahdata">Tambah
                    Data</a>
                <div class="card">
                    <div class="card-header">Data Menu</div>

                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Harga</th>
                                    <th>Keterangan</th>
                                    <th>Kategori</th>
                                    <th>Foto</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($menu as $item)
                                    <tr>
                                        <th>{{ $loop->iteration }}</th>
                                        <td>{{ $item->nama }}</td>
                                        <td>{{ $item->harga }}</td>
                                        <td>{{ $item->keterangan }}</td>
                                        <td>{{ $item->category->Nama }}</td>
                                        <td><img src="{{ asset('storage/'. $item->foto) }}" width="200px" alt="" srcset=""></td>
                                        <td>
                                            <a class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editdata{{ $item->id }}">Edit</a>
                                            <a href="menu/{{ $item->id }}" class="btn btn-danger">Hapus</a>
                                        </td>
                                    </tr>
                                    <!-- Modal -->
                                    <div class="modal fade" id="editdata{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data Menu</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{ route('menu.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="form-group mb-3">
                                                            <label for="">Nama Menu</label>
                                                            <input type="text" class="form-control" value="{{ $item->nama }}" name="nama">
                                                        </div>
                                                        <div class="form-group mb-3">
                                                            <label for="">Harga Menu</label>
                                                            <input type="number" class="form-control" value="{{ $item->harga }}" name="harga">
                                                        </div>
                                                        <div class="form-group mb-3">
                                                            <label for="">Keterangan</label>
                                                            <input type="text" class="form-control" value="{{ $item->keterangan }}" name="keterangan">
                                                        </div>
                                                        <div class="form-group mb-3">
                                                            <label for="">Kategori</label>
                                                            <select name="category_id" class="form-select" id="">
                                                                @foreach ($category as $data)
                                                                    <option value="{{ $data->id }}" @selected($data->id == $item->category_id)>{{ $data->Nama }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="form-group mb-3">
                                                            <label for="">Foto</label>
                                                            <input type="file" class="form-control" name="foto">
                                                        </div>
                                                        <div class="form-group mb-3">
                                                            <label for="">Foto Sebelumnya :</label>
                                                        </div>
                                                        <div class="form-group mb-3">
                                                            <img src="{{ asset('storage/'. $item->foto) }}" width="300px" alt="" srcset="">
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                                        <button type="submit" class="btn btn-primary">Update Data</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="tambahdata" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data Menu</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('menu.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="">Nama Menu</label>
                            <input type="text" class="form-control" name="nama">
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Harga Menu</label>
                            <input type="number" class="form-control" name="harga">
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Keterangan</label>
                            <input type="text" class="form-control" name="keterangan">
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Kategori</label>
                            <select name="category_id" class="form-select" id="">
                                @foreach ($category as $data)
                                    <option value="{{ $data->id }}">{{ $data->Nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Foto</label>
                            <input type="file" class="form-control" name="foto">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Simpan Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
