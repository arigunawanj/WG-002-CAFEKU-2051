<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::all();
        return view('user', compact('user'));
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
        // Mengambil seluruh data yang ada dalam Form
        $data = $request->all();

        // Mengubah string menjadi hash password yang akan digunakan dalam login
        $data['password'] = Hash::make($request->password);

        // Jika sudah data akan dicreate ke database
        User::create($data);

        // Jika berhasil akan memberikan alert
        Alert::toast('Berhasil Menambahkan User', 'success');

        // Dan dialihkan ke halaman user
        return redirect('user');
  
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        // Mengambil seluruh data yang ada dalam Form
        $data = $request->all();

        // Jika Password ingin diganti
        if($request->password){
            // Maka value string akan diubah menjadi Hash
            $data['password'] = Hash::make($request->password);

            // Lalu akan dilakukan update Data
            $user->update($data);
        } else {
            // Jika tidak ingin dilakukan pergantian maka menggunakan data yang ada dalam database
            $data['password'] = $user->password;

            // Jika berhasil akan dilakukan update data
            $user->update($data);
        }

        // Jika berhasil akan memberikan alert
        Alert::toast('Berhasil Mengupdate User', 'success');

        // Dan dialihkan ke halaman user
        return redirect('user');
  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        // Data dalam tabel user akan dihapus sesuai dengan ID yang akan dihapus
        $user->delete();

        // Jika berhasil akan memberikan alert
        Alert::toast('Berhasil menghapus User', 'success');

        // Dan dialihkan ke halaman user
        return redirect('user');
    }
}
