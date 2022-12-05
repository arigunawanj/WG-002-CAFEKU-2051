@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @foreach ($menu as $item)
                <div class="card ms-3 mt-3" style="width: 18rem">
                    <div class="card-header text-center mb-2">{{ $item->nama }}</div>
                    <img src="{{ asset('storage/'. $item->foto) }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h6 class="card-title"><span class="badge bg-primary">Rp {{ $item->harga }}</span></h6>
                        <h6>Kategori : <span class="badge bg-warning">{{ $item->category->Nama }}</span></h6>
                        <p class="card-text">Keterangan : {{ $item->keterangan }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <footer>
        <div class="container">
            <p class="text-center mt-3">Cafeku &copy; 2022 | Jl. Kelengkeng 2B Kec. Klojen Kel. Bareng Kota Malang |</p>
        </div>
    </footer>
@endsection
