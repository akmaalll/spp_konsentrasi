<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class SppController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Payment::where('nim', Auth::user()->nim)->with('mahasiswa', 'fee')->get();
        // dd($items);

        return view('pages.mahasiswa.payment.index', [
            'items' => $items
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $orderId = 'PAY-' . Str::uuid()->toString();

        $payment = Payment::where('nim', Auth::user()->nim)->with('mahasiswa', 'fee')->first();
        \Midtrans\Config::$serverKey = config('midtrans.server_key');
        \Midtrans\Config::$isProduction = config('midtrans.is_production');
        \Midtrans\Config::$isSanitized = true;
        \Midtrans\Config::$is3ds = true;

        $params = array(
            'transaction_details' => array(
                'order_id' => $orderId,
                'gross_amount' => $payment->amount,
            ),
            'customer_details' => array(
                'first_name' => $request->name,
                'last_name' => '',
                'phone' => '',
            ),
        );

        $snapToken = \Midtrans\Snap::getSnapToken($params);

        return view('pages.mahasiswa.payment.create', compact('snapToken', 'payment'));
    }

    public function callback(Request $request)
    {
        $serverKey = config('midtrans.server_key');
        $hashed = hash('sha512', $request->order_id . $request->status_code . $request->gross_amount . $serverKey);
        if ($hashed == $request->signature_key) {
            if ($request->transaction_status == 'settlement') {
                $order = Payment::find($request->order_id);
                // dd($order);
                $order->update(['status' => 'paid']);
                dd($order);
            }
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
