<?php

namespace App\Http\Controllers;
use Carbon\Carbon;

use Illuminate\Http\Request;
use App\Models\items;
use Illuminate\Support\Facades\Auth;
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
    
    public function add_items(Request $request) {
        // dd($request->all());
        $request->validate([
            'item_name' => 'required',
            'category' => 'required',
            'desc' => 'required',
            'price' => 'required',
        ],
    );

        $user = new items([
            'item_name' => $request->item_name,
            'category' => $request->category,
            'desc' => $request->desc,
            'price' => $request->price,

        ]);

        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('photos', 'public'); // Save the photo to the 'public/photos' directory
            $user->photo = $photoPath;
        }

        $user->save();

        return redirect()->route('dashboard-items')->with('success', 'Tambah Data Berhasil!');
    }

    public function items() {
        return view('admin.cud.add_items');
    }
    public function getAllOrdersData()
    {
        $AllOrdersData = orders::with('item', 'user')->where('user_id',Auth::id())->get();


        // dd($AllOrdersData->all());
        if ($AllOrdersData->isEmpty()) {
            // $errorMessage = 'Belum ada Data Transaksi';
            $noTransactionData = true;

            // return view('profiluser', compact('errorMessage'));
            // return view('profiluser', ['AllOrdersData' => $AllOrdersData]);
        } else {
            $noTransactionData = false;

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
        }
        return view('profiluser', [
            'AllOrdersData' => $AllOrdersData,
            'noTransactionData' => $noTransactionData,
        ]);


    


    


}
