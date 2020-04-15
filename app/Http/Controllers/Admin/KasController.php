<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

use App\Models\Kas;

class KasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if( Auth::user()->role == 'author' ) return redirect('/admin/list-perusahaan');

        $data = array(
            'nav'       => 'kas',
            'title'     => 'Kas',
            'kas'       => Kas::where('perusahaan_id', Auth::user()->perusahaan_id)->orderBy('id', 'DESC')->paginate(10),
            'jumlahKas' => Kas::where('perusahaan_id', Auth::user()->perusahaan_id)->sum('kas'),
            'user'      => Auth::user()
        );

        return view('admin.pages.kas.index', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if( Auth::user()->role == 'author' ) return redirect('/admin/list-perusahaan');
        
        if ( Auth::user()->role != 'pemilik' && Auth::user()->role != 'administrator' ) return back()->with('Anda tidak memiliki akses!');

        $validator = Validator::make($request->all(), [
            'kas'   => 'required|numeric',
            'pesan' => 'required|max:64',
        ], [
            'kas.required'  => 'kas tidak boleh kosong',
            'kas.numeric'   => 'kas harus angka',
            'pesan.max'     => 'pesan maksimal 64 karakter',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                             ->withErrors($validator)
                             ->withInput()
                             ->with('gagal', 'Ada kesalahan');
        } else {
            Kas::create([
                'perusahaan_id' => Auth::user()->perusahaan_id,
                'kas'           => -$request->kas,
                'pesan'         => $request->pesan,
            ]);

            return back()->with('success', 'Uang telah diambil');
        }
    }
}
