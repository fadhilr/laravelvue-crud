<?php

namespace App\Http\Controllers;
// namespace App\Helpers;
use Illuminate\Http\Request;

class DomainController extends Controller
{
    public function index()
    {
    	$data_domain= \App\Domain::all();
    	
    	return view('domain.index',['data_domain'=> $data_domain]);
    }
    public function create(Request $request)
    {
    	$data_domain= \App\Domain::all();
    	foreach ($data_domain as $domain) {
    		if ($domain['domain']==$request->url) {

    			return view('domain/edit',['data_domain'=> $data_domain]);
    			echo $domain['domain'];
    		}
    	}
    	// dd($data->terbilang);
    	// $angka=$request->harga ;
    	$terbilang=\App\Helpers\Rupiah::terbilang($request->harga);
    	\App\Domain::create([
			'domain' => $request->url,
			'url' => $request->url,
			'harga' => $request->harga,
			'terbilang' => $terbilang,
		]);
    	return redirect('/domain')->with('sukses','data berhasil diinput');
    }
    
    public function edit($id)
    {
    	$siswa = \App\Siswa::find($id);
    	return view('siswa/edit',['siswa'=>$siswa]);
    }
    public function update(Request $request, $id)
    {
    	$siswa = \App\Siswa::find($id);
    	$siswa->update($request->all());
    	return redirect('/siswa')->with('sukses','data berhasil diupdate');
    }
    public function delete($id)
    {
    	$siswa = \App\Domain::find($id);
    	$siswa->delete();
    	return redirect('/domain')->with('sukses','data berhasil didelete');
    }
}
