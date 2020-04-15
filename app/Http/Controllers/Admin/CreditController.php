<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CreditController extends Controller
{
    public function index()
    {
    	$data = [
    		'nav' => 'credit',
    		'title' => 'Credit',
    		'user' => Auth::user()
    	];

    	return view('admin.pages.credit.index', $data);
    }
}
