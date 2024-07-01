<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Mahasiswa;
use App\Models\Payment;
use App\Models\Spp;
use App\Models\Jurusan;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $query = Payment::with(['mahasiswa.jurusan', 'fee']);

        if ($request->filled('nim')) {
            $query->whereHas('mahasiswa', function ($q) use ($request) {
                $q->where('nim', 'like', '%' . $request->nim . '%');
            });
        }

        if ($request->filled('jurusan')) {
            $query->whereHas('mahasiswa.jurusan', function ($q) use ($request) {
                $q->where('id', $request->jurusan);
            });
        }

        if ($request->filled('semester')) {
            $query->whereHas('fee', function ($q) use ($request) {
                $q->where('semester', $request->semester);
            });
        }

        if ($request->filled('year')) {
            $query->whereHas('fee', function ($q) use ($request) {
                $q->where('year', $request->year);
            });
        }

        $items = $query->get();
        $jurusans = Jurusan::all();

        return view('pages.admin.index', compact('items', 'jurusans'));
    }
}