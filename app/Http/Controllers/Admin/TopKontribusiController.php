<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Penjualan;

class TopKontribusiController extends Controller
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
            'nav'           => 'top-kontribusi',
            'title'         => 'Top Kontribusi',
            'user'          => Auth::user(),
            'topKontribusi' => Penjualan::selectRaw(' users.name, users.gambar, users.role, sum(penjualan.jumlah) as jumlahOrder')->join('users', 'users_id', '=', 'users.id')->groupBy('users.name', 'users.gambar', 'users.role')->where('penjualan.perusahaan_id', Auth::user()->perusahaan_id)->orderBy('jumlahOrder', 'DESC')->get(),
        );

        return view('admin.pages.top-kontribusi.index', $data);
    }
    
}
