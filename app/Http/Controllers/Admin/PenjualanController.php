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
use App\Models\Kas;


class PenjualanController extends Controller
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
            'nav'           => 'penjualan',
            'title'         => 'Penjualan',
            'user'          => Auth::user(),
            'penjualan'     => Penjualan::select('penjualan.id', 'penjualan.jumlah', 'penjualan.created_at', 'penjualan.status', 'barang.nama as nama_barang', 'barang.gambar', 'barang.satuan', 'users.name as nama_penjual', 'traffics.nama as nama_traffic')
                            ->join('barang', 'penjualan.barang_id', '=', 'barang.id')
                            ->join('users', 'penjualan.users_id', '=', 'users.id')
                            ->join('traffics', 'penjualan.traffics_id', '=', 'traffics.id')
                            ->where('penjualan.perusahaan_id', Auth::user()->perusahaan_id)
                            ->orderBy('id', 'DESC')
                            ->paginate(10),
            'totalPenjualan' => Penjualan::where('perusahaan_id', Auth::user()->perusahaan_id)->count(),
        );

        return view('admin.pages.penjualan.index', $data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if( Auth::user()->role == 'author' ) return redirect('/admin/list-perusahaan');

        $data = array(
            'nav'   => 'penjualan',
            'title' => 'Detail Penjualan',
            'user'  => Auth::user(),
            'item'  => Penjualan::select('penjualan.*', 'users.name as nama_penjual', 'perusahaan.nama as nama_perusahaan', 'barang.nama as nama_barang', 'barang.satuan', 'traffics.nama as nama_traffic')
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
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if( Auth::user()->role == 'author' ) return redirect('/admin/list-perusahaan');
        
        if( Auth::user()->role != 'pemilik' && Auth::user()->role != 'administrator' ) return back()->with('gagal', 'Anda tidak memiliki akses!');
        $penjualan = Penjualan::find(decrypt($id));

        Kas::create([
            'perusahaan_id' => Auth::user()->perusahaan_id,
            'kas'           => -$penjualan->total_biaya,
            'pesan'         => "Karena data penjualan dengan nama pembeli $penjualan->nama_pembeli dihapus"
        ]);

        Penjualan::destroy(decrypt($id));

        return back()->with('success', 'Penjualan telah dihapus');
    }
}
