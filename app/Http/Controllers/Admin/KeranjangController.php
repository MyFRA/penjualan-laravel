<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;

use App\User;
use App\Models\Barang;
use App\Models\Traffic;
use App\Models\Keranjang;

class KeranjangController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if( Auth::user()->role == 'author' ) return redirect('/admin/list-perusahaan');

        if( Auth::user()->role == 'anggota' ) return redirect('/admin/dashboard')->with('gagal', 'kamu tidak memiliki akses');
        $data = array(
            'nav'       => 'penjualan',
            'title'     => 'Keranjang',
            'user'      => Auth::user(),
            'penjual'   => User::select('id', 'name')->where('perusahaan_id', Auth::user()->perusahaan_id)->get(),
            'produk'    => Barang::select('id', 'nama')->where('perusahaan_id', Auth::user()->perusahaan_id)->get(),
            'tarffics'  => Traffic::select('id', 'nama')->where('perusahaan_id', Auth::user()->perusahaan_id)->get(),
            'keranjang' => Keranjang::select('keranjang.id','users_id as nama_penjual', 'nama_pembeli', 'barang.nama', 'jumlah')->where('keranjang.perusahaan_id', Auth::user()->perusahaan_id)
                            ->join('users', 'users.id', '=', 'users_id')
                            ->join('barang', 'barang_id', '=', 'barang.id')
                            ->get()
        );

        return view('admin.pages.keranjang.create', $data);
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

        if( Auth::user()->role == 'anggota' ) return redirect('/admin/dashboard')->with('gagal', 'kamu tidak memiliki akses');

        $users_id = decrypt($request->penjual);
        if ( User::where('id', $users_id)->count() < 1 ) return back()->with('gagal', 'id tidak terdaftar');
        if ( Traffic::where('id', $request->traffics_id)->count() < 1 ) return back()->with('gagal', 'traffic tidak terdaftar');
        if ( Barang::where('id', $request->barang_id)->count() < 1 ) return back()->with('gagal', 'Barang tidak terdaftar');
        
        $validator = Validator::make($request->all(), [
            'nama_pembeli' => 'required|max:255',
            'barang_id'    => 'required',
            'status'       => 'required|in:Online,Offline',
            'traffics_id'  => 'required',
            'jumlah'       => 'required|numeric',
            'provinsi'     => 'required|max:64',
            'kabupaten'    => 'required|max:64',
            'kecamatan'    => 'required|max:64',
            'kelurahan'    => 'required|max:64',
        ], [
            'nama_pembeli.required' => 'nama pembeli tidak boleh kosong',
            'nama_pembeli.max'      => 'nama pembeli maksimal 255 karakter',
            'barang_id.required'    => 'barang tidak boleh kosong',
            'status.required'       => 'status tidak boleh kosong',
            'status.in'             => 'status tidak ada di dalam opsi',
            'traffics_id.required'  => 'traffic tidak boleh kosong',
            'jumlah.required'       => 'jumlah tidak boleh kosong',
            'provinsi.required'     => 'provinsi tidak boleh kosong',
            'provinsi.max'          => 'provinsi maksimal 64 karakter',
            'kabupaten.required'    => 'kabupaten tidak boleh kosong',
            'kabupaten.max'         => 'kabupaten maksimal 64 karakter',
            'kecamatan.required'    => 'kecamatan tidak boleh kosong',
            'kecamatan.max'         => 'kecamatan maksimal 64 karakter',
            'kelurahan.required'    => 'kelurahan tidak boleh kosong',
            'kelurahan.max'         => 'kelurahan maksimal 64 karakter',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                             ->withErrors($validator)
                             ->withInput();
        } else {
            $barang = Barang::find($request->barang_id);

            Keranjang::create([
                'users_id'      => $users_id,
                'perusahaan_id' => Auth::user()->perusahaan_id,
                'nama_pembeli'  => $request->nama_pembeli,
                'barang_id'     => $request->barang_id,
                'status'        => $request->status,
                'traffics_id'   => $request->traffics_id,
                'jumlah'        => $request->jumlah,
                'harga_asli'    => $barang->harga_asli,
                'harga_jual'    => $barang->harga_jual,
                'total_biaya'   => $barang->harga_jual * $request->jumlah,
                'provinsi'      => $request->provinsi,
                'kabupaten'     => $request->kabupaten,
                'kecamatan'     => $request->kecamatan,
                'kelurahan'     => $request->kelurahan,
                'keuntungan'    => ( $barang->harga_jual - $barang->harga_asli ) * $request->jumlah,
            ]);

            return back()->with('success', 'Produk telah masuk keranjang');
        }
    }

    public function addStore(Request $request)
    {
        if( Auth::user()->role == 'author' ) return redirect('/admin/list-perusahaan');

        if( Auth::user()->role == 'anggota' ) return redirect('/admin/dashboard')->with('gagal', 'kamu tidak memiliki akses');

        if ( Barang::where('id', $request->barang_id)->count() < 1 ) return back()->with('gagal', 'Barang tidak terdaftar');
        
        $validator = Validator::make($request->all(), [
            'barang_id'        => 'required',
            'jumlah'        => 'required|numeric',
        ], [
            'barang_id.required' => 'barang tidak boleh kosong',
            'jumlah.required'   => 'jumlah tidak boleh kosong',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                             ->withErrors($validator)
                             ->withInput();
        } else {

            $barang = Barang::find($request->barang_id);
            $cart = Keranjang::where('perusahaan_id', Auth::user()->perusahaan_id)->get()[0];

            Keranjang::create([
                'users_id' => $cart->users_id,
                'perusahaan_id' => Auth::user()->perusahaan_id,
                'nama_pembeli' => $cart->nama_pembeli,
                'barang_id' => $request->barang_id,
                'status' => $cart->status,
                'traffics_id' => $cart->traffics_id,
                'jumlah' => $request->jumlah,
                'harga_asli' => $barang->harga_asli,
                'harga_jual' => $barang->harga_jual,
                'total_biaya' => $barang->harga_jual * $request->jumlah,
                'provinsi' => $cart->provinsi,
                'kabupaten' => $cart->kabupaten,
                'kecamatan' => $cart->kecamatan,
                'kelurahan' => $cart->kelurahan,
                'keuntungan' => ( $barang->harga_jual - $barang->harga_asli ) * $request->jumlah,
            ]);

            return back()->with('success', 'Produk telah masuk keranjang');
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
        if( Auth::user()->role == 'author' ) return redirect('/admin/list-perusahaan');
        
        if( Auth::user()->role == 'anggota' ) return redirect('/admin/dashboard')->with('gagal', 'kamu tidak memiliki akses');
        
        Keranjang::destroy(decrypt($id));
        return back()->with('success', 'Produk keranjang telah dihapus');
    }
}
