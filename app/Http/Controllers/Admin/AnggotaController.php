<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

use App\Models\Perusahaan;
use App\User;
use DB;

class AnggotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = array(
            'title' => 'Anggota',
            'nav'   => 'anggota',
            'user'  => Auth::user(),
            'anggota' => User::select('gambar', 'name', 'role', 'id',
                            DB::raw(
                                '( CASE 
                                        WHEN role = "pemilik" THEN 1 
                                        WHEN role = "administrator" THEN 2 
                                        WHEN role = "anggota" THEN 3 
                                    END
                                )'
                            )
                        )->where('perusahaan_id', Auth::user()->perusahaan_id)
                        ->orderBy('role')->get(),
            'perusahaan' => Perusahaan::select('nama', 'slogan', 'token')->where('id', Auth::user()->perusahaan_id)->get()[0]
        );

        return view('admin.pages.anggota.index', $data);
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
        $data = array(
            'user'  => Auth::user(),
            'title' => 'Profil Anggota',
            'nav'   => 'anggota',
            'item' => User::select('users.*', 'perusahaan.nama as namaPerusahaan')->from('users')->join('perusahaan', 'users.perusahaan_id', '=', 'perusahaan.id')->where('users.id', decrypt($id))->get()[0]
        );

        return view('admin.pages.anggota.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
    public function update(Request $request, $id, $role)
    {
        $anggota = User::find(decrypt($id));

        if( Auth::user()->role == 'anggota' || Auth::user()->role == $anggota->role ) {
            return back()->with('gagal', 'anda tidak memiliki akses, untuk melakukan update!');
        } else {
            if ( Auth::user()->role == 'administrator' && $anggota->role == 'pemilik' ) return back()->with('gagal', 'anda tidak memiliki akses, untuk melakukan update!');

            $anggota->update([
                'role' => decrypt($role)
            ]);
            return back()->with('success', "$anggota->name sekarang menjadi " . decrypt($role));
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
        $anggota = User::find(decrypt($id));

        if( Auth::user()->role == 'anggota' || Auth::user()->role == $anggota->role ) {
            return back()->with('gagal', 'anda tidak memiliki akses, untuk melakukan update!');
        } else {
            if ( Auth::user()->role == 'administrator' && $anggota->role == 'pemilik' ) return back()->with('gagal', 'anda tidak memiliki akses, untuk melakukan update!');

            if (Storage::disk('local')->exists('public/profil_user/' . $anggota->gambar)) {
                Storage::disk('local')->delete('public/profil_user/' . $anggota->gambar);
            }

            User::destroy(decrypt($id));
            return back()->with('success', "$anggota->name telah dikeluarkan");
        }
    }
}