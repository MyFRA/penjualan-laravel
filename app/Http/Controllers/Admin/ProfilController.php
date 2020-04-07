<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;

use App\User;

class ProfilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = array(
            'title' => 'Profil',
            'nav' => 'profil',
            'user' => Auth::user(),
        );

        return view('admin.pages.profil.index', $data);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if( decrypt($id) != Auth::user()->id ) return back()->with('gagal', 'User Id Tidak Sama!');

        $data = array(
            'title' => 'Profil',
            'nav' => 'profil',
            'user' => Auth::user(),
            'item' => User::find(decrypt($id)),
        );

        return view('admin.pages.profil.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if ( User::where('email', $request->email)->count() > 0 ) {
            if( $request->email != Auth::user()->email ) return back()->with('gagal', 'Email sudah digunakan')
                                                                      ->withInput();
        }

        $validator = Validator::make($request->all(), [
            'name'          => 'required|max:50',
            'email'         => 'required|max:50',
            'umur'          => 'numeric',
            'alamat'        => 'max:255',
            'negara'        => 'max:50',
            'instansiasi'   => 'max:50',
        ], [
            'name.required' => 'nama tidak boleh kosong',
            'name.max'      => 'nama maksimal 50 karakter',
            'umur.numeric'  => 'umur hanya boleh angka',
            'alamat.max'    => 'alamat maksimal 255 karakter',
            'negara.max'    => 'negara maksimal 50 karakter',
            'instansiasi.max'   => 'instansiasi maksimal 50 karakter',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                             ->withErrors($validator)
                             ->withInput();
        } else {
            if( $this->updateProfil($request, $id) != true ) return back()->with('gagal', 'File yang kamu upload bukan gambar!')->withInput();
            return redirect('/admin/profil')->with('success', 'Profil kamu telah diubah');
        }       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function updateProfil($request, $id)
    {
        $data = User::find(decrypt($id));

        if( is_null($request->file('gambar')) )
        {
            $data->update([
                'name'          => $request->name,
                'email'         => $request->email,
                'alamat'        => $request->alamat,
                'negara'        => $request->negara,
                'instansiasi'   => $request->instansiasi,
                'umur'          => $request->umur,
                'jenis_kelamin' => $request->jenis_kelamin,
                'deskripsi'     => $request->deskripsi
            ]);

            return true;
        } else {
            $ekstensiValid = ['jpg', 'jpeg', 'png', 'svg', 'bmp', 'webp'];

            if( !in_array($request->file('gambar')->getClientOriginalExtension(), $ekstensiValid) ) return false;

            if ($exists = Storage::disk('local')->exists('profil_user/' . $data->gambar)) {
                Storage::disk('local')->delete('profil_user/' . $data->gambar);
            }

            $namaGambar = explode('.', $request->file('gambar')->getClientOriginalName())[0];
            $namaGambar .= '_' . time() . '.' . $request->file('gambar')->getClientOriginalExtension();

            $request->file('gambar')->storeAs('public/profil_user', $namaGambar);

            $data->update([
                'name'          => $request->name,
                'email'         => $request->email,
                'alamat'        => $request->alamat,
                'negara'        => $request->negara,
                'instansiasi'   => $request->instansiasi,
                'umur'          => $request->umur,
                'gambar'        => $namaGambar,
                'jenis_kelamin' => $request->jenis_kelamin,
                'deskripsi'     => $request->deskripsi
            ]);

            return true;
        }
    }
}
