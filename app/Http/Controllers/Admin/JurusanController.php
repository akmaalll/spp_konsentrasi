<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Jurusan;
use Illuminate\Http\Request;

class JurusanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Jurusan::get();
        return view('pages.admin.jurusan.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $jurusan = Jurusan::pluck('jurusan_name');

        return view('pages.admin.jurusan.create', compact('jurusan'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        Jurusan::create($data);

        return redirect()->route('index.jurusan');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $item = Jurusan::find($id);

        return view('pages.admin.jurusan.edit', compact('item',));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $data = $request->all();
        $item = Jurusan::find($request->id);
        // dd($item);
        $item->update($data);

        return redirect()->route('index.jurusan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $item = Jurusan::findOrFail($id);
        $item->delete();
        return redirect()->route('index.jurusan');
    }
}
