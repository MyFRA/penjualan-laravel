<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

use App\Models\Barang;
use App\Models\Perusahaan;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = array(
            'title' => 'Produk',
            'nav'   => 'produk',
            'user'  => Auth::user(),
            'namaPerusahaan' => Perusahaan::find(Auth::user()->perusahaan_id)->nama,
            'items' => Barang::where('perusahaan_id', Auth::user()->perusahaan_id)->orderBy('id', 'DESC')->get(),
            'jmlProduk' => Barang::where('perusahaan_id', Auth::user()->perusahaan_id)->count(),
        );

        return view('admin.pages.barang.index', $data);
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
            'nama' => 'required|max:100',
            'harga_asli' => 'required|numeric',
            'harga_jual' => 'required|numeric',
            'satuan'     => 'required|max:20'
        ], [
            "nama.required" => "Nama Produk Harus Diisi",
            "nama.max" => "Nama Produk Maks 100 Karakter",
            "harga_asli.required" => "Harga asli Produk Harus Diisi",
            "harga_asli.numeric" => "Harga asli Harus Angka",
            "harga_jual.required" => "Harga jual Produk Harus Diisi",
            "harga_jual.numeric" => "Harga jual Harus Angka",
            'satuan.required'   => 'satuan tidak boleh kosong',
            'satuan.max'        => 'satuan maksimal 20 karakter',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->with('gagal', 'Produk Gagal Ditambahkan');
        } else {
            if ($this->storeProduct($request) != true) {
                return redirect()->back()
                        ->withErrors('File Yang Kamu Upload Bukan Gambar')
                        ->with('gagal', 'Produk Gagal Ditambahkan');
            } else {
                return redirect()->back()->with('success', "Produk $request->nama Telah Ditambahkan");
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
        $data = array(
            'title' => 'Produk',
            'nav'   => 'produk',
            'user'  => Auth::user(),
            'namaPerusahaan' => Perusahaan::find(Auth::user()->perusahaan_id)->nama,
            'item'  => Barang::find(decrypt($id)),
        );

        return view('admin.pages.barang.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = array(
            'title' => 'Produk',
            'nav'   => 'produk',
            'user'  => Auth::user(),
            'namaPerusahaan' => Perusahaan::find(Auth::user()->perusahaan_id)->nama,
            'item'  => Barang::find(decrypt($id)),
        );

        return view('admin.pages.barang.edit', $data);
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
        $data = Barang::find(decrypt($id));
        $data->update([
            'nama' => $request->nama,
            'harga' => $request->harga,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect('/admin/produk')->with('success', "Produk $request->nama telah diubah");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   
        $produk = Barang::find(decrypt($id));
        $cek    = Storage::disk('local')->exists('/public/' . Perusahaan::find(Auth::user()->perusahaan_id)->nama . '/' . $produk->gambar);
        if($cek) Storage::disk('local')->delete('/public/' . Perusahaan::find(Auth::user()->perusahaan_id)->nama . '/' . $produk->gambar); 
        Barang::destroy(decrypt($id));
        return redirect()->back()->with('success', "Produk $produk->nama Telah Dihapus");
    }

    public function storeProduct($request)
    {
        if(empty($request->file())) {
            Barang::create([
                'nama' => $request->nama,
                'harga_asli' => $request->harga_asli,
                'harga_jual' => $request->harga_jual,
                'satuan' => $request->satuan,
                'deskripsi' => $request->deskripsi,
                'perusahaan_id' => Auth::user()->perusahaan_id,
            ]);
            return true;
        } else {
            $file = $request->file('gambar');
            $ekstensiValid = ['jpeg', 'png', 'bmp', 'gif', 'svg','webp', 'jpg'];
            if (!in_array($file->getClientOriginalExtension(), $ekstensiValid)) return false;
            
            $namaPerusahaan = Perusahaan::find(Auth::user()->perusahaan_id)->nama;
            $namaGambar     = (explode('.', $file->getClientOriginalName()))[0] . '-' . time() . '.' . $file->getClientOriginalExtension();
            
            Storage::putFileAs('public/foto_produk/', $file, $namaGambar);
            Barang::create([
                'nama' => $request->nama,
                'harga_asli' => $request->harga_asli,
                'harga_jual' => $request->harga_jual,
                'satuan' => $request->satuan,
                'deskripsi' => $request->deskripsi,
                'perusahaan_id' => Auth::user()->perusahaan_id,
                'gambar' => $namaGambar
            ]);
            return true;
        }
    }
}
