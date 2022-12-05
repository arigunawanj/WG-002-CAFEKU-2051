<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Mengambil seluruh data yang ada dalam tabel Menu
        $menu = Menu::all();

        // Mengambil seluruh data yang ada dalam tabel Category
        $category = Category::all();

        // Pergi ke halaman Menu dengan membawa data dari tabel menu dan kategori
        return view('menu', compact('menu', 'category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Mengambil seluruh data yang ada dalam form
        $data = $request->all();

        // Deklarasi untuk file penyimpanan Foto
        $files = $request->file('foto')->store('artikel/foto');

        // Mengubah penyimpanan foto sesuai deklarasi $file
        $data['foto'] = $files;

        // Menyimpan data yang ada dalam variabel data
        Menu::create($data);

        // Jika berhasil akan memberikan alert
        Alert::toast('Berhasil Menambahkan Data', 'success');

        // Dan dialihkan ke halaman menu
        return redirect('menu');
 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function show(Menu $menu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function edit(Menu $menu)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Menu $menu)
    {
        // Mengambil seluruh data yang ada dalam form
        $data = $request->all();

        // Jika foto ingin diganti 
        if($request->hasFile('foto')){

            // Maka dilakukan Deklarasi lagi untuk file penyimpanan Foto
            $files = $request->file('foto')->store('artikel/foto');

            // Menghapus Foto sebelumnya didalam Folder Artikel/Foto
            Storage::delete($menu->foto);

            // Mengubah penyimpanan foto sesuai deklarasi $file
            $data['foto'] = $files;

            // Jika sudah akan dilakukan update data
            $menu->update($data);
            
        } else {
            // Jika tidak ingin melakukan perganti foto maka isi form foto akan diisi yang ada dalam database
            $data['foto'] = $menu->foto;

            // Jika sudah akan dilakukan update data
            $menu->update($data);
        }

          // Jika berhasil akan memberikan alert
          Alert::toast('Berhasil Update Data', 'success');

          // Dan dialihkan ke halaman menu
          return redirect('menu');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Menu $menu)
    {
        // Menghapus foto yang ada dalam Folder Artikel/Foto
        Storage::delete($menu->foto);

        // Menghapus Data dalam tabel menu sesuai ID yang ingin dihapus
        $menu->delete();

        // Jika berhasil akan memberikan alert
        Alert::toast('Berhasil Hapus Data', 'success');

        // Dan dialihkan ke halaman menu
        return redirect('menu');
    }
}
