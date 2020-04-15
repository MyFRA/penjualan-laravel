<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\Models\Perusahaan;

class ListPerusahaanController extends Controller
{
    public function index()
    {
    	if( Auth::user()->role != 'author' ) return redirect('/admin/dashboard');
    	$data = [
    		'nav' 			=> 'list-perusahaan',
    		'title' 		=> 'List Perusahaan',
    		'user' 			=> Auth::user(),
    		'perusahaan' 	=> Perusahaan::selectRaw('perusahaan.nama, perusahaan.logo, count(users.perusahaan_id) as jumlah')
    										->groupBy('perusahaan.nama', 'perusahaan.logo')
    										->join('users', 'users.perusahaan_id', '=', 'perusahaan.id')
    										->orderBy('perusahaan.nama', 'ASC')
    										->get()
    	];

    	return view('admin.pages.listPerusahaan.index', $data);
    }
}
