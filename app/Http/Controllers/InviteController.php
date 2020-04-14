<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Perusahaan;

class InviteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($token)
    {
        $cekToken = Perusahaan::where('token', $token)->count();
        if($cekToken < 1) return view('404');
        return view('registerAnggota', ['token' => $token]);
    }
}
