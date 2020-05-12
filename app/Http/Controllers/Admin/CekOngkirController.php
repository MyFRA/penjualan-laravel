<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Kavist\RajaOngkir\Facades\RajaOngkir;

class CekOngkirController extends Controller
{

    public function index()
    {
        $data = [
            'title' => 'Cek Ongkir',
            'nav' => 'cek-ongkir',
            'user' => Auth::user(),
            'kabupaten' => RajaOngkir::kota()->all()
        ];

        return view('admin.pages.cek-ongkir.index', $data);
    }

    public function cek(Request $request) {

        $validator = Validator::make($request->all(), [
            'kota_asal' => 'required',
            'kota_tujuan' => 'required',
            'kurir' => 'required|in:jne,tiki,pos',
            'berat' => 'required|numeric'
        ]);

        if ($validator->fails()) {
            return back()
                    ->withErrors($validator)
                    ->withInput();
        } else {
            $ongkir = RajaOngkir::ongkosKirim([
                'origin'        => $request->kota_asal,     // ID kota/kabupaten asal
                'destination'   => $request->kota_tujuan,      // ID kota/kabupaten tujuan
                'weight'        => $request->berat * 1000,    // berat barang dalam gram
                'courier'       => $request->kurir    // kode kurir pengiriman: ['jne', 'tiki', 'pos'] untuk starter
            ])->get();


            $kota_asal = RajaOngkir::kota()->find($request->kota_asal)['city_name'];
            $kota_tujuan = RajaOngkir::kota()->find($request->kota_tujuan)['city_name'];

            return back()
                    ->with('ongkir', $ongkir)
                    ->with('data', [
                        $kota_asal,
                        $kota_tujuan,
                        $request->berat,
                    ])
                    ->withInput();
        }
    }
}
