<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function utama()
    {
        return view('dashboard');
    }

    public function hasil(Request $request)
    {
        // Deklarasi Variabel
        $nama = $request->nama;
        $jumlah = explode(',', $request->jumlah);
        $totalpes = $request->totalpesanan;
        $status = $request->status;

        // Mengambil Inheritance Class dan Mendeklar sesuai dengan construct
        $order = new Total($status, $totalpes);
        
        // Digunakan untuk pengecekan data yang telah diinput dan data akan diproses sesuai dengan OOP yang telah dibuat
        $data = [
            'nama' => $nama,
            'jumlah' => count($jumlah) .' pcs' ,
            'totalpesanan' => number_format($totalpes,2,",","."),
            'status' => $status,
            'diskon' => $order->diskon(),
            'totalpembayaran' => number_format($order->totalpembayaran(),2,",","."),
        ];

        // Pergi ke halaman dengan membawa data yang telah diproses
        return view('dashboard', compact('data'));
    }
}

class Diskon {

    // Deklarasi kebutuhan data yang akan diproses
    public function __construct($status, $totalpesanan)
    {
        $this->status = $status;
        $this->totalpesanan = $totalpesanan;
    }

    // Pengambilan Hasil diskon sesuai dengan kondisi yang telah dibuat
    public function hasildiskon()
    {
        if($this->status == 'Member' && $this->totalpesanan <= 100000){
           return 10/100;
        } else if ($this->status == 'Member' && $this->totalpesanan >= 100000){
            return 20/100;
        } else {
            return 0;
        }
    }

    // Pengambilan String sesuai dengan hasil yang telah dikeluarkn oleh fungsi hasildiskon()
    public function diskon()
    {
        if($this->hasildiskon() == 10/100){
            return 'Diskon 10%';
        } else if ($this->hasildiskon() == 20/100){
            return 'Diskon 20%';
        } else {
            return 'Tidak mendapatkan diskon';
        }
    }
}

//Inheritance Total dari Parent Diskon
class Total extends Diskon {
    
    // Hasil Diskon dari Total pesanan * Hasildiskon (dikali)
    public function hasil()
    {
        return $this->totalpesanan * $this->hasildiskon();
    }

    // Hasil Total pembayaran yang didapat dari totalpesanan - hasil (dikurangi)
    public function totalpembayaran()
    {
        return $this->totalpesanan - $this->hasil();
    }
}
