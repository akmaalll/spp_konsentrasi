<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Mahasiswa;
use App\Models\Payment;
use App\Models\Spp;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Mahasiswa $mahasiswa)
    {
        $items = Payment::with('mahasiswa', 'fee')->get();
        // dd($items);
        return view('pages.admin.index', compact('items'));
    }
}
