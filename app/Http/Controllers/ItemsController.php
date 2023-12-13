<?php

namespace App\Http\Controllers;
use Carbon\Carbon;

use Illuminate\Http\Request;
use App\Models\items;
use Illuminate\View\View;
use App\Models\orders;
use App\Models\User;

use Illuminate\Support\Facades\DB;

class ItemsController extends Controller
{

    public function getAllItemsData(): View
    {
        return view('landingpage', [
            "AllItemsData" => items::all(),
        ]);
    }
    public function getdetailpemesanan($id){

        return view('pemesanan', [
            "pemesanan" => items::find($id),
            
        ]);
    }

    public function getAllOrdersData(): View
    {
        $AllOrdersData = orders::with('item', 'user')->get();

        foreach ($AllOrdersData as $order) {
            $startDate = Carbon::parse($order->start_date);
            // $endDate = Carbon::parse($order->end_date);

            $sisaHari = max(0, 5 - $startDate->diffInDays());

            // hitung sisa Waktu
            // $waktu = $endDate->diffInDays($startDate);

            $waktu = $sisaHari . ' Hari';

            // Compare with the current date
            $now = Carbon::now();
            $hari = $now->diffInDays($startDate);
            $jam = $now->diffInHours($startDate) % 24; // Limit hours to 24
            $menit = $now->diffInMinutes($startDate) % 60;

            // $sisaWaktu = $now->diffInDays($endDate) . ' Hari ' . $now->diffInHours($endDate) . ' Jam ' . $now->diffInMinutes($endDate) . ' Menit left';
            // $sisaWaktu = $hari . ' Hari ' . $jam . ' Jam ' . $menit . ' Menit';
            $sisaWaktu = $hari . ' Hari ' . $jam . ' Jam ' . $menit . ' Menit until 5 days since start';


            // $order->waktu = $waktu;
            // $order->sisaWaktu = $sisaWaktu;


        }
        // dd($dataa->all());

        return view('profiluser', ['AllOrdersData' => $AllOrdersData]);
    }
}
