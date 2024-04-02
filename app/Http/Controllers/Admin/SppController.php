<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Spp;
use Illuminate\Http\Request;

class SppController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Spp::get();
        return view('pages.admin.spp.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.admin.spp.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        // dd($data['semester']);
        Spp::create($data);

        return redirect()->route('index.spp');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $item = Spp::find($id);

        return view('pages.admin.spp.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $data = $request->all();
        $item = Spp::find($request->id);
        // dd($data);
        $item->update($data);

        return redirect()->route('index.spp');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $item = Spp::findOrFail($id);
        $item->delete();
        return redirect()->route('index.spp');
    }
}
