<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

use App\Models\Barang;
use App\Models\Perusahaan;
use App\Models\Penjualan;

class BarangController extends Controller
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
            'title' => 'Produk',
            'nav'   => 'produk',
            'user'  => Auth::user(),
            'items' => Barang::where('perusahaan_id', Auth::user()->perusahaan_id)
                               ->orderBy('nama', 'ASC')->paginate(10),
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
        if( Auth::user()->role == 'author' ) return redirect('/admin/list-perusahaan');

        if( Auth::user()->role != 'pemilik' && Auth::user()->role != 'administrator' ) return back()->with('gagal', 'Kamu tidak memiliki akses');
        
        $data = array(
            'title' => 'Produk',
            'nav'   => 'produk',
            'user'  => Auth::user(),
        );

        return view('admin.pages.barang.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if( Auth::user()->role == 'author' ) return redirect('/admin/list-perusahaan');

        if( Auth::user()->role != 'pemilik' && Auth::user()->role != 'administrator' ) return back()->with('gagal', 'Kamu tidak memiliki akses');

        $validator = Validator::make($request->all(), [
            'nama'          => 'required|max:100',
            'harga_asli'    => 'required|numeric',
            'harga_jual'    => 'required|numeric',
            'satuan'        => 'required|max:20'
        ], [
            "nama.required"         => "Nama Produk Harus Diisi",
            "nama.max"              => "Nama Produk Maks 100 Karakter",
            "harga_asli.required"   => "Harga asli Produk Harus Diisi",
            "harga_asli.numeric"    => "Harga asli Harus Angka",
            "harga_jual.required"   => "Harga jual Produk Harus Diisi",
            "harga_jual.numeric"    => "Harga jual Harus Angka",
            'satuan.required'       => 'satuan tidak boleh kosong',
            'satuan.max'            => 'satuan maksimal 20 karakter',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        } else {
            if ($this->storeProduct($request) != true) {
                return redirect()->back()
                                ->with('gagal', 'File yang kamu upload bukan gambar');
            } else {
                return redirect('/admin/produk')->with('success', "Produk $request->nama Telah Ditambahkan");
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
        if( Auth::user()->role == 'author' ) return redirect('/admin/list-perusahaan');

        $data = array(
            'title'     => 'Produk',
            'nav'       => 'produk',
            'user'      => Auth::user(),
            'item'      => Barang::find(decrypt($id)),
            'terjual'   => Penjualan::where('barang_id', decrypt($id))->sum('jumlah'),
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
        if( Auth::user()->role == 'author' ) return redirect('/admin/list-perusahaan');

        if( Auth::user()->role != 'pemilik' && Auth::user()->role != 'administrator' ) return back()->with('gagal', 'Kamu tidak memiliki akses');
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
        if( Auth::user()->role == 'author' ) return redirect('/admin/list-perusahaan');

        if( Auth::user()->role != 'pemilik' && Auth::user()->role != 'administrator' ) return back()->with('gagal', 'Kamu tidak memiliki akses');

        $validator = Validator::make($request->all(), [
            'nama'          => 'required|max:100',
            'harga_asli'    => 'required|numeric',
            'harga_jual'    => 'required|numeric',
            'satuan'        => 'required|max:20'
        ], [
            "nama.required"         => "Nama Produk Harus Diisi",
            "nama.max"              => "Nama Produk Maks 100 Karakter",
            "harga_asli.required"   => "Harga asli Produk Harus Diisi",
            "harga_asli.numeric"    => "Harga asli Harus Angka",
            "harga_jual.required"   => "Harga jual Produk Harus Diisi",
            "harga_jual.numeric"    => "Harga jual Harus Angka",
            'satuan.required'       => 'satuan tidak boleh kosong',
            'satuan.max'            => 'satuan maksimal 20 karakter',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        } else {
            if ($this->updateProduct($request, $id) != true) {
                return redirect()->back()
                                ->with('gagal', 'File yang kamu upload bukan gambar');
            } else {
                return redirect('/admin/produk')->with('success', "Produk $request->nama Telah Diubah");
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
        if( Auth::user()->role == 'author' ) return redirect('/admin/list-perusahaan');

        if( Auth::user()->role != 'pemilik' && Auth::user()->role != 'administrator' ) return back()->with('gagal', 'Kamu tidak memiliki akses');
        if( Penjualan::where('barang_id', decrypt($id))->count() >= 0 ) return back()->with('gagal', 'Produk tidak dapat dihapus');
        
        $produk = Barang::find(decrypt($id));

        $cek    = Storage::disk('local')->exists('public/foto_produk/' . $produk->gambar);
        if($cek) Storage::disk('local')->delete('public/foto_produk/' . $produk->gambar); 

        Barang::destroy(decrypt($id));
        return redirect()->back()->with('success', "Produk $produk->nama Telah Dihapus");
    }

    public function storeProduct($request)
    {
        if( Auth::user()->role == 'author' ) return redirect('/admin/list-perusahaan');

        if(empty($request->file())) {
            Barang::create([
                'nama'          => $request->nama,
                'harga_asli'    => $request->harga_asli,
                'harga_jual'    => $request->harga_jual,
                'satuan'        => $request->satuan,
                'deskripsi'     => $request->deskripsi,
                'perusahaan_id' => Auth::user()->perusahaan_id,
            ]);
            return true;
        } else {
            $file           = $request->file('gambar');
            $ekstensiValid  = ['jpeg', 'png', 'bmp', 'gif', 'svg','webp', 'jpg'];
            if (!in_array($file->getClientOriginalExtension(), $ekstensiValid)) return false;
            
            $namaPerusahaan = Perusahaan::find(Auth::user()->perusahaan_id)->nama;
            $namaGambar     = (explode('.', $file->getClientOriginalName()))[0] . '-' . time() . '.' . $file->getClientOriginalExtension();
            
            Storage::putFileAs('public/foto_produk/', $file, $namaGambar);
            Barang::create([
                'nama'          => $request->nama,
                'harga_asli'    => $request->harga_asli,
                'harga_jual'    => $request->harga_jual,
                'satuan'        => $request->satuan,
                'deskripsi'     => $request->deskripsi,
                'perusahaan_id' => Auth::user()->perusahaan_id,
                'gambar'        => $namaGambar
            ]);
            return true;
        }
    }

    public function updateProduct($request, $id)
    {
        if( Auth::user()->role == 'author' ) return redirect('/admin/list-perusahaan');
        
        $data = Barang::find(decrypt($id));

        if(empty($request->file())) {
            $data->update([
                'nama'          => $request->nama,
                'deskripsi'     => $request->deskripsi,
                'perusahaan_id' => Auth::user()->perusahaan_id,
                'harga_asli'    => $request->harga_asli,
                'harga_jual'    => $request->harga_jual,
                'satuan'        => $request->satuan,
            ]);
            return true;
        } else {
            $produk = Barang::find(decrypt($id));
            $file           = $request->file('gambar');
            $ekstensiValid  = ['jpeg', 'png', 'bmp', 'gif', 'svg','webp', 'jpg'];
            if (!in_array($file->getClientOriginalExtension(), $ekstensiValid)) return false;
            
            $namaPerusahaan = Perusahaan::find(Auth::user()->perusahaan_id)->nama;
            $namaGambar     = (explode('.', $file->getClientOriginalName()))[0] . '-' . time() . '.' . $file->getClientOriginalExtension();
            
            $cek    = Storage::disk('local')->exists('/public/foto_produk/' . $produk->gambar);
            if($cek) Storage::disk('local')->delete('/public/foto_produk/' . $produk->gambar); 
            
            Storage::putFileAs('public/foto_produk/', $file, $namaGambar);
            $data->update([
                'nama'          => $request->nama,
                'deskripsi'     => $request->deskripsi,
                'perusahaan_id' => Auth::user()->perusahaan_id,
                'gambar'        => $namaGambar,
                'harga_asli'    => $request->harga_asli,
                'harga_jual'    => $request->harga_jual,
                'satuan'        => $request->satuan,
            ]);
            return true;
        }
    }
}


