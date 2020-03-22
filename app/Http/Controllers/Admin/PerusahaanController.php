<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

use App\Models\Perusahaan;
use App\User;

class PerusahaanController extends Controller
{
    public function __construct()
    {
        $this->middleware('checkPerusahaanId');         
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = array(
            'title' => 'Perusahaan',
            'nav'   => 'perusahaan',
            'user'  => Auth::user(),
        );

        return view('admin/pages/perusahaan/index', $data);
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
            'nama' => 'required',
       ]);

       if ($validator->fails()) {
           return back()
                    ->withErrors($validator)
                    ->withInput();
       } else {
            $token = uniqid();
            Perusahaan::create(
                [
                    'nama'  => $request['nama'],
                    'token' => $token,
                ]);

            $id_perusahaan = Perusahaan::where('token', $token)->get();
            $id_perusahaan = $id_perusahaan[0]->id;

            $data = User::where('id', Auth::user()->id);
            $data->update([
                'perusahaan_id' => $id_perusahaan,
            ]);
            return redirect('/admin/dashboard');
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
