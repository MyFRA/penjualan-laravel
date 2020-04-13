<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use DB;
use App\User;
use App\Models\Penjualan;
use App\Models\Kas;

class DashboardController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() 
    {
        $data = [
            'title' => 'Dashboard',
            'nav'   => 'dashboard',
            'user'  => Auth::user(),
            'jmlAnggota'        => User::where('perusahaan_id', Auth::user()->perusahaan_id)->count(),
            'jmlPenjualan'      => Penjualan::where('perusahaan_id', Auth::user()->perusahaan_id)->sum('jumlah'),
            'jmlKeuntungan'     => Penjualan::where('perusahaan_id', Auth::user()->perusahaan_id)->sum('keuntungan'),
            'jmlKas'            => Kas::where('perusahaan_id', Auth::user()->perusahaan_id)->sum('kas'),
            'penjualanPerBulan' => Penjualan::selectRaw('monthname(created_at) month, sum(jumlah) jumlah')->where('perusahaan_id', Auth::user()->perusahaan_id)->groupBy('month')->orderBy('created_at', 'ASC')->take(6)->get(),
            'topTraffics'       => Penjualan::selectRaw(' traffics.nama, count(traffics_id) as jumlahOrder')->join('traffics', 'traffics_id', '=', 'traffics.id')->groupBy('traffics.nama')->where('penjualan.perusahaan_id', Auth::user()->perusahaan_id)->orderBy('jumlahOrder', 'DESC')->take(5)->get(),
            'topProvinsi'       => Penjualan::selectRaw(' penjualan.provinsi, count(provinsi) as jumlahProvinsi')->groupBy('penjualan.provinsi')->where('penjualan.perusahaan_id', Auth::user()->perusahaan_id)->orderBy('jumlahProvinsi', 'DESC')->take(10)->get(),
            'topKabupaten'      => Penjualan::selectRaw(' penjualan.kabupaten, count(kabupaten) as jumlahKabupaten')->groupBy('penjualan.kabupaten')->where('penjualan.perusahaan_id', Auth::user()->perusahaan_id)->orderBy('jumlahKabupaten', 'DESC')->take(10)->get(),
            'topKecamatan'      => Penjualan::selectRaw(' penjualan.kecamatan, count(kecamatan) as jumlahKecamatan')->groupBy('penjualan.kecamatan')->where('penjualan.perusahaan_id', Auth::user()->perusahaan_id)->orderBy('jumlahKecamatan', 'DESC')->take(10)->get(),
            'topKelurahan'      => Penjualan::selectRaw(' penjualan.kelurahan, count(kelurahan) as jumlahKelurahan')->groupBy('penjualan.kelurahan')->where('penjualan.perusahaan_id', Auth::user()->perusahaan_id)->orderBy('jumlahKelurahan', 'DESC')->take(10)->get(),

            
        ];

        return view('admin.pages.dashboard.index', $data);
    }
}