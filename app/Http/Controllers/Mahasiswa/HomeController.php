<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $items = Payment::where('nim', Auth::user()->nim)
            ->where('status', 'paid')
            ->with('mahasiswa', 'fee')
            ->get();

        return view('pages.mahasiswa.index', compact('items'));
    }
}
