<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Jurusan;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Mahasiswa::get();
        return view('pages.admin.mahasiswa.index', compact('items'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $jurusan = Jurusan::pluck('jurusan_name');

        return view('pages.admin.mahasiswa.create', compact('jurusan'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $data['password'] = Hash::make($request->password);
        // dd($data);
        Mahasiswa::create($data);

        return redirect()->route('index.mahasiswa');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $nim)
    {
        $item = Mahasiswa::find($nim);

        return view('pages.admin.mahasiswa.detail', compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $item = Mahasiswa::find($id);
        $jurusans = Jurusan::all();

        return view('pages.admin.mahasiswa.edit', compact('item', 'jurusans'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $data = $request->all();
        $item = Mahasiswa::find($request->nim);
        // dd($item);
        $item->update($data);

        return redirect()->route('index.mahasiswa');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $item = Mahasiswa::findOrFail($id);
        $item->delete();
        return redirect()->route('index.mahasiswa');
    }
}
