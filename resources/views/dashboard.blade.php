@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

        {{-- Kolom 1 --}}
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">Order Data</div>

                <div class="card-body">
                    <form action="hasil" method="POST">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="">Nama</label>
                            <input type="text" name="nama" class="form-control" id="">
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Jumlah Pesanan</label>
                            <input type="text" name="jumlah" class="form-control" id="">
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Total Pesanan</label>
                            <input type="number" name="totalpesanan" class="form-control" id="">
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Status</label>
                            <select name="status" id="" class="form-select">
                                <option value="Member">Member</option>
                                <option value="Non Member">Non Member</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Order</button>
                    </form>
                </div>
            </div>
        </div>

        {{-- Kolom 2 --}}
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">Receipt</div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Data</th>
                                <th>Keluaran</th>
                            </tr>
                        </thead>
                        <tbody>
                            @isset($data)
                            <tr>
                                <th>Nama</th>
                                <td>{{ $data['nama'] }}</td>
                            </tr>
                            <tr>
                                <th>Jumlah pesanan</th>
                                <td>{{ $data['jumlah'] }}</td>
                            </tr>
                            <tr>
                                <th>Total pesanan</th>
                                <td>Rp {{ $data['totalpesanan'] }}</td>
                            </tr>
                            <tr>
                                <th>Status</th>
                                @if ($data['status'] == 'Member')
                                    <td><span class="badge bg-warning">{{ $data['status'] }}</span></td>
                                @else
                                    <td><span class="badge bg-dark">{{ $data['status'] }}</span></td>
                                @endif
                            </tr>
                            <tr>
                                <th>Diskon</th>
                                @if ($data['diskon'] == 'Diskon 10%')
                                    <td><span class="badge bg-success">{{ $data['diskon'] }}</span></td>
                                @else
                                    <td><span class="badge bg-secondary">{{ $data['diskon'] }}</span></td>
                                @endif
                            </tr>
                            <tr>
                                <th>Total Pembayaran</th>
                                <td><span class="badge bg-primary">Rp {{ $data['totalpembayaran'] }}</span></td>
                            </tr>
                            @endisset
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
