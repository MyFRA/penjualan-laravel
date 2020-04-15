<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

use App\Models\Perusahaan;

class ProfilPerusahaanController extends Controller
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
            'nav'           => 'profil-perusahaan',
            'title'         => 'Profil Perusahaan',
            'user'          => Auth::user(),
            'perusahaan'    => Perusahaan::Find(Auth::user()->perusahaan_id),
        );

        return view('admin.pages.profil-perusahaan.index', $data);
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
            'nav'           => 'profil-perusahaan',
            'title'         => 'Profil Perusahaan',
            'user'          => Auth::user(),
            'perusahaan'    => Perusahaan::find(decrypt($id))
        );

        return view('admin.pages.profil-perusahaan.edit', $data);
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
            'nama'      => 'required|max:100',
            'slogan'    => 'required|max:100',
            'telp'      => 'max:20',
            'email'     => 'required|max:128',
            'fax'       => 'max:32',
            'site'      => 'max:64',
            'facebook'  => 'max:64',
            'instagram' => 'max:64',
        ], [
            'nama.required'     => 'nama tidak boleh kosong',
            'nama.max'          => 'nama maksimal 100 karakter',
            'slogan.required'   => 'slogan tidak boleh kosong',
            'slogan.max'        => 'slogan maksimal 100 karakter',
            'telp.max'          => 'telp maksimal 20 karakter',
            'email.required'    => 'email tidak boleh kosong',
            'email.max'         => 'email maksimal 128 karakter',
            'fax.max'           => 'fax maksimal 32 karakter',
            'site.max'          => 'site maksimal 64 karakter',
            'facebook.max'      => 'facebook maksimal 64 karakter',
            'instagram.max'     => 'instagram maksimal 64 karakter',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)
                         ->withInput();               
        } else {
            if( $this->updateProfilPerusahaan($request, $id) == false ) return back()->withInput()
                                                                               ->with('gagal', 'file yang kamu upload bukan gambar');                                    
        
            return redirect('/admin/profil-perusahaan')->with('success', 'Data perusahaan telah diperbarui');
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
        //
    }

    public function updateProfilPerusahaan($request, $id)
    {
        if( Auth::user()->role == 'author' ) return redirect('/admin/list-perusahaan');
        
        $data = Perusahaan::find(decrypt($id));

        if( is_null($request->file('logo')) ) {

            $data->update([
                'nama'      => $request->nama,
                'slogan'    => $request->slogan,
                'telp'      => $request->telp,
                'email'     => $request->email,
                'fax'       => $request->fax,
                'site'      => $request->site,
                'facebook'  => $request->facebook,
                'instagram' => $request->instagram,
                'deskripsi' => $request->deskripsi,
                'sejarah'   => $request->sejarah,
                'alamat'    => $request->alamat,
            ]);
            return true;
        } else {
            $logo = $request->file('logo');
            $ekstensiValid = ['jpg', 'jpeg', 'png', 'svg', 'bmp', 'webp'];

            if( !in_array($logo->getClientOriginalExtension(), $ekstensiValid) ) return false;

            if (Storage::disk('local')->exists('public/logo_perusahaan/' . $data->logo)) {
                Storage::disk('local')->delete('public/logo_perusahaan/' . $data->logo);
            }

            $namaGambar = explode('.', $logo->getClientOriginalName())[0];
            $namaGambar .= '-' . time() . '.' . $logo->getClientOriginalExtension();

            Storage::putFileAs('public/logo_perusahaan', $logo, $namaGambar);
            $data->update([
                'nama'      => $request->nama,
                'slogan'    => $request->slogan,
                'telp'      => $request->telp,
                'email'     => $request->email,
                'fax'       => $request->fax,
                'logo'      => $namaGambar,
                'site'      => $request->site,
                'facebook'  => $request->facebook,
                'instagram' => $request->instagram,
                'deskripsi' => $request->deskripsi,
                'sejarah'   => $request->sejarah,
                'alamat'    => $request->alamat,
            ]);
            return true;
        }
    }
}
