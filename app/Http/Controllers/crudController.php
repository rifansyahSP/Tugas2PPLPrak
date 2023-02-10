<?php

namespace App\Http\Controllers;

use App\Models\crud;
use Illuminate\Http\Request;

class crudController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $katakunci = $request->katakunci;
        $jumlahbaris = 10;
        if(strlen($katakunci)){
            $data = crud::where('nip', 'like', "%$katakunci%")
                ->orwhere('nama', 'like', "%$katakunci%")
                ->orwhere('email', 'like', "%$katakunci%")
                ->paginate($jumlahbaris);
        } else {
            $data = crud::orderBy('nip', 'desc')->paginate($jumlahbaris);
        }
        return view('crud.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('crud.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nip'=>'required|numeric|unique:crud,nip',
            'nama'=>'required',
            'email'=>'required',
        ],[
            'nip.required'=>'NIP wajib diisi',
            'nip.numeric'=>'NIP wajib diisi dan wajib berupa angka',
            'nip.unique'=>'NIP sudah terdaftar ',
            'nama.required'=>'Nama wajib diisi',
            'email.required'=>'Email wajib diisi',
        ]);
        $data = [
            'nip' => $request->nip,
            'nama' => $request->nama,
            'email' => $request->email,
        ];
        crud::create($data);
        return redirect()->to('crud')->with('success', 'Berhasil menambahkan data');
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
        $data = crud::where('nip', $id)->first();
        return view('crud.edit')->with('data', $data);
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
        $request->validate([
            'nama'=>'required',
            'email'=>'required',
        ],[
            'nama.required'=>'Nama wajib diisi',
            'email.required'=>'Email wajib diisi',
        ]);
        $data = [
            'nama' => $request->nama,
            'email' => $request->email,
        ];
        crud::where('nip',$id)->update($data);
        return redirect()->to('crud')->with('success', 'Berhasil melakukan update data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        crud::where('nip', $id)->delete();
        return redirect()->to('crud')->with('success','Berhasil melakukan delete data');
    }
}
