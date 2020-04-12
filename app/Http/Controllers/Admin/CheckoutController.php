<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use App\Models\Keranjang;
use App\Models\Penjualan;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = array(
            'nav' => 'penjualan',
            'title' => 'checkout',
            'user' => Auth::user(),
            'keranjang' => Keranjang::select('keranjang.*', 'users.name as name', 'barang.nama as nama_barang', 'barang.satuan', 'traffics.nama as nama_traffic')
                                    ->join('users', 'users_id', '=', 'users.id')
                                    ->join('barang', 'barang_id', '=', 'barang.id')
                                    ->join('traffics', 'traffics_id', '=', 'traffics.id')
                                    ->where('keranjang.perusahaan_id', Auth::user()->perusahaan_id)->get(),
            'jumlah_biaya_total' => Keranjang::where('perusahaan_id', Auth::user()->perusahaan_id)->sum('total_biaya'),
        );

        return view('admin.pages.checkout.index', $data);
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
        $keranjang = Keranjang::where('perusahaan_id', Auth::user()->perusahaan_id)->get();

        foreach ($keranjang as $cart) {
            Penjualan::create([
                'users_id' => $cart->users_id,
                'perusahaan_id' => $cart->perusahaan_id,
                'nama_pembeli' => $cart->nama_pembeli,
                'barang_id' => $cart->barang_id,
                'status' => $cart->status,
                'traffics_id' => $cart->traffics_id,
                'jumlah' => $cart->jumlah,
                'keuntungan' => $cart->keuntungan,
                'harga_asli' => $cart->harga_asli,
                'harga_jual' => $cart->harga_jual,
                'total_biaya' => $cart->total_biaya,
                'provinsi' => $cart->provinsi,
                'kabupaten' => $cart->kabupaten,
                'kecamatan' => $cart->kecamatan,
                'kelurahan' => $cart->kelurahan,
            ]);
        };

        foreach ($keranjang as $cart) {
            Keranjang::destroy($cart->id);
        }

        return redirect('/admin/penjualan')->with('success', 'Penjualan telah ditambahkan');
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
        //
    }
}
