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
        if( Auth::user()->role == 'author' ) return redirect('/admin/list-perusahaan');
        $data = [
            'title' => 'Dashboard',
            'nav'   => 'dashboard',
            'user'  => Auth::user(),
            'jmlAnggota'                => User::where('perusahaan_id', Auth::user()->perusahaan_id)->count(),
            'jmlPenjualan'              => Penjualan::where('perusahaan_id', Auth::user()->perusahaan_id)->sum('jumlah'),
            'jmlKeuntungan'             => Penjualan::where('perusahaan_id', Auth::user()->perusahaan_id)->sum('keuntungan'),
            'jmlKas'                    => Kas::where('perusahaan_id', Auth::user()->perusahaan_id)->sum('kas'),
            'penjualanPerBulanGrafik'   => Penjualan::selectRaw('monthname(created_at) month, sum(jumlah) jumlah')->where('perusahaan_id', Auth::user()->perusahaan_id)->groupBy('month')->orderBy('created_at', 'ASC')->take(6)->get(),
            'penjualanPerTahun'         => Penjualan::selectRaw('year(created_at) year, sum(jumlah) jumlah')->where('perusahaan_id', Auth::user()->perusahaan_id)->groupBy('year')->orderBy('created_at', 'DESC')->take(10)->get(),
            'penjualanPerBulan'         => Penjualan::selectRaw('monthname(created_at) month, year(created_at) year, sum(jumlah) jumlah')->where('perusahaan_id', Auth::user()->perusahaan_id)->groupBy('month', 'year')->orderBy('created_at', 'DESC')->take(12)->get(),
            'penjualanPerDay'           => Penjualan::selectRaw('dayname(created_at) dayname, day(created_at) day, monthname(created_at) month, year(created_at) year, sum(jumlah) jumlah')->where('perusahaan_id', Auth::user()->perusahaan_id)->groupBy('dayname', 'day', 'month', 'year')->orderBy('created_at', 'DESC')->take(7)->get(),
            'topTraffics'               => Penjualan::selectRaw(' traffics.nama, sum(jumlah) as jumlah')->join('traffics', 'traffics_id', '=', 'traffics.id')->groupBy('traffics.nama')->where('penjualan.perusahaan_id', Auth::user()->perusahaan_id)->orderBy('jumlah', 'DESC')->take(5)->get(),
            'topProvinsi'               => Penjualan::selectRaw(' penjualan.provinsi, sum(jumlah) as jumlah')->groupBy('penjualan.provinsi')->where('penjualan.perusahaan_id', Auth::user()->perusahaan_id)->orderBy('jumlah', 'DESC')->take(10)->get(),
            'topKabupaten'              => Penjualan::selectRaw(' penjualan.kabupaten, sum(jumlah) as jumlah')->groupBy('penjualan.kabupaten')->where('penjualan.perusahaan_id', Auth::user()->perusahaan_id)->orderBy('jumlah', 'DESC')->take(10)->get(),
            'topKecamatan'              => Penjualan::selectRaw(' penjualan.kecamatan, sum(jumlah) as jumlah')->groupBy('penjualan.kecamatan')->where('penjualan.perusahaan_id', Auth::user()->perusahaan_id)->orderBy('jumlah', 'DESC')->take(10)->get(),
            'topKelurahan'              => Penjualan::selectRaw(' penjualan.kelurahan, sum(jumlah) as jumlah')->groupBy('penjualan.kelurahan')->where('penjualan.perusahaan_id', Auth::user()->perusahaan_id)->orderBy('jumlah', 'DESC')->take(10)->get(),

            
        ];

        return view('admin.pages.dashboard.index', $data);
    }
}