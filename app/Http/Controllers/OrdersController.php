<?php

namespace App\Http\Controllers;

use App\Models\orders;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    
     public function storecontoh(Request $request )
    {
        $request->validate([
            'wisata_id' => 'required',
            'totalHarga' => 'required',
            'namaPemesan' => 'required',
            'noTelepon' => 'required',
            'emailPemesan' => 'required',
            'buktiTf' => 'required',
            'status' => 'required', 
            'tanggal' => 'required',
            'travel_agent_id' => 'required',

        ]);
      
        orders::create($request->all());
       
        return redirect('/riwayatpesanan')->with('success','Pemesanan berhasil dipesan.');
    }
   

    /**
     * Display the specified resource.
     */
    public function show(orders $orders)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(orders $orders)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, orders $orders)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(orders $orders)
    {
        //
    }
}
