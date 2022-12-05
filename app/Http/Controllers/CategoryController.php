<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Mengambil Seluruh Data yang ada dalam tabel Category
        $category = Category::all();

        // Pergi ke halaman category dan membawa data dari tabel category
        return view('category', compact('category'));
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
        // Mengambil seluruh isi data form
        $category = $request->all();
        
        // Menyimpan data yang sudah diambil dari form
        Category::create($category);

        // Jika berhasil akan memberikan alert
        Alert::toast('Berhasil menyimpan Data', 'success');

        // Dan dialihkan ke halaman kategori
        return redirect('category');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        // Mengambil seluruh data yang ada di dalam form
        $data = $request->all();

        // Jika data sudah diambil akan dilakukan update data
        $category->update($data);

        // Jika berhasil akan memberikan alert
        Alert::toast('Berhasil Mengupdate Data', 'success');

        // Dan dialihkan ke halaman kategori
        return redirect('category');

        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        // Data dalam tabel category akan dihapus sesuai dengan ID yang akan dihapus
        $category->delete();

        // Jika berhasil akan memberikan alert
        Alert::toast('Berhasil Menghapus Data', 'success');

        // Dan dialihkan ke halaman kategori
        return redirect('category');

        
    }
}
