<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

use App\User;
use App\Models\Barang;
use App\Models\Traffic;
use App\Models\Keranjang;
use App\Models\Penjualan;

class PenjualanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = array(
            'nav'       => 'penjualan',
            'title'     => 'Penjualan',
            'user'      => Auth::user(),
            'penjualan' => Penjualan::select('penjualan.id', 'penjualan.jumlah', 'penjualan.created_at', 'penjualan.status', 'barang.nama as nama_barang', 'barang.gambar', 'barang.satuan', 'users.name as nama_penjual', 'traffics.nama as nama_traffic')
                        ->join('barang', 'penjualan.barang_id', '=', 'barang.id')
                        ->join('users', 'penjualan.users_id', '=', 'users.id')
                        ->join('traffics', 'penjualan.traffics_id', '=', 'traffics.id')
                        ->where('penjualan.perusahaan_id', Auth::user()->perusahaan_id)->get(),
        );

        return view('admin.pages.penjualan.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = array(
            'nav'       => 'penjualan',
            'title'     => 'Penjualan',
            'user'      => Auth::user(),
            'penjual'   => User::select('id', 'name')->where('perusahaan_id', Auth::user()->perusahaan_id)->get(),
            'produk'    => Barang::select('id', 'nama')->where('perusahaan_id', Auth::user()->perusahaan_id)->get(),
            'tarffics'  => Traffic::select('id', 'nama')->where('perusahaan_id', Auth::user()->perusahaan_id)->get(),
            'keranjang' => Keranjang::select('keranjang.id','users_id as nama_penjual', 'nama_pembeli', 'barang.nama', 'jumlah')->where('keranjang.perusahaan_id', Auth::user()->perusahaan_id)
                            ->join('users', 'users.id', '=', 'users_id')
                            ->join('barang', 'barang_id', '=', 'barang.id')
                            ->get()
        );

        return view('admin.pages.penjualan.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
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
            'nav' => 'penjualan',
            'title' => 'Detail Penjualan',
            'user' => Auth::user(),
            'item' => Penjualan::select('penjualan.*', 'users.name as nama_penjual', 'perusahaan.nama as nama_perusahaan', 'barang.nama as nama_barang', 'barang.satuan', 'traffics.nama as nama_traffic')
                                ->join('users', 'users.id', '=', 'penjualan.users_id')
                                ->join('barang', 'barang.id', '=', 'penjualan.barang_id')
                                ->join('traffics', 'traffics.id', '=', 'penjualan.traffics_id')
                                ->join('perusahaan', 'perusahaan.id', '=', 'penjualan.perusahaan_id')
                                ->where('penjualan.perusahaan_id', Auth::user()->perusahaan_id)
                                ->where('penjualan.id', decrypt($id))
                                ->get()[0]

        );

        return view('admin.pages.penjualan.show', $data);
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Penjualan::destroy(decrypt($id));

        return back()->with('success', 'Penjualan telah dihapus');
    }
}
