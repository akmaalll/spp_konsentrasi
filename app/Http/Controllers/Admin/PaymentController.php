<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Mahasiswa;
use App\Models\Payment;
use App\Models\Spp;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function getNamaSpp(Request $request)
    {
        $id = $request->id;
        $spp = Spp::where('id', $id)->first();
        // dd($spp);

        return response()->json(['semester' => $spp->semester, 'nominal' => $spp->nominal, 'year' => $spp->year]);
    }
    public function getNamaMahasiswa(Request $request)
    {
        $nim = $request->nim;
        $mahasiswa = Mahasiswa::where('nim', $nim)->first();

        return response()->json(['name' => $mahasiswa->name]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $mahasiswas = Mahasiswa::all();
        $spps = Spp::all();
        // dd($mahasiswa);
        return view('pages.admin.payment.create', compact('mahasiswas', 'spps'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        // dd($data);
        Payment::create($data);

        return redirect()->route('dashboard_admin');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
