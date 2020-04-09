<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

use App\Models\Traffic;

class TrafficsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = array(
            'nav' => 'traffics',
            'title' => 'Traffic',
            'user' => Auth::user(),
            'traffics' => Traffic::where('perusahaan_id', Auth::user()->perusahaan_id)->get(),
        );

        return view('admin.pages.traffics.index', $data);
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
        if (Auth::user()->role != 'pemilik' && Auth::user()->role != 'administrator') {
            return back()->with('gagal', 'Maaf, Anda tidak memiliki akses!');
        } else {

            $validator = Validator::make($request->all(), [
            'nama' => 'required|max:50',
            ], [
                "nama.max" => "Nama Produk Maks 50 Karakter",
            ]);

            if ($validator->fails()) {
                return redirect()->back()
                            ->withErrors($validator)
                            ->with('gagal', 'Produk Gagal Ditambahkan');
            } else {

                Traffic::create([
                    'nama' => $request->nama,
                    'perusahaan_id' => Auth::user()->perusahaan_id
                ]);

                return back();
            }
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
        return Traffic::find(decrypt($id));
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
        if (Auth::user()->role != 'pemilik' && Auth::user()->role != 'administrator') {
            return back()->with('gagal', 'Maaf, Anda tidak memiliki akses!');
        } else {

            $validator = Validator::make($request->all(), [
            'nama' => 'required|max:50',
            ], [
                "nama.max" => "Nama Produk Maks 50 Karakter",
            ]);

            if ($validator->fails()) {
                return redirect()->back()
                            ->withErrors($validator)
                            ->with('gagal', 'Produk Gagal Ditambahkan');
            } else {

                $data = Traffic::find(decrypt($id));

                $data->update([
                    'nama' => $request->nama,
                    'perusahaan_id' => Auth::user()->perusahaan_id,
                ]);

                return back();
            }
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
        if (Auth::user()->role != 'pemilik' && Auth::user()->role != 'administrator') {
            return back()->with('gagal', 'Maaf, Anda tidak memiliki akses!');
        } else {
            Traffic::destroy(decrypt($id));

            return back()->with('success', 'Traffic telah dihapus');
        }
    }
}
