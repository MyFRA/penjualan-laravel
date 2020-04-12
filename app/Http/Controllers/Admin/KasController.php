<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

use App\Models\Kas;

class KasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = array(
            'nav' => 'kas',
            'title' => 'Kas',
            'kas' => Kas::where('perusahaan_id', Auth::user()->perusahaan_id)->orderBy('id', 'DESC')->get(),
            'jumlahKas' => Kas::where('perusahaan_id', Auth::user()->perusahaan_id)->sum('kas'),
            'user' => Auth::user()
        );

        return view('admin.pages.kas.index', $data);
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
        $validator = Validator::make($request->all(), [
            'kas' => 'required|numeric',
            'pesan' => 'required|max:64',
        ], [
            'kas.required' => 'kas tidak boleh kosong',
            'kas.numeric' => 'kas harus angka',
            'pesan.max' => 'pesan maksimal 64 karakter',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                             ->withErrors($validator)
                             ->withInput()
                             ->with('gagal', 'Ada kesalahan');
        } else {
            Kas::create([
                'perusahaan_id' => Auth::user()->perusahaan_id,
                'kas' => -$request->kas,
                'pesan' => $request->pesan,
            ]);

            return back()->with('success', 'Uang telah diambil');
        }
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
