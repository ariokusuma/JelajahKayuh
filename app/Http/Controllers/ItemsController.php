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
    public function getdetailpemesanan($id){

        return view('pemesanan', [
            "pemesanan" => items::find($id),

        ]);
    }
    public function postdetailpemesanan($id , Request $request){
        $order = new orders();
        $order->item_id = $id;
        $order->user_id = Auth::user()->id;
        $order->payment_evidence = null;
        $order->status = 1;
        $order->comments = 'No Telp Yang Bisa Di Hubugni' . $request->no_telp;
        $order->start_date = $request->date;

        $carbonDate = Carbon::parse($request->date);

        if ($request->masa == '1'){
            $order->end_date = $carbonDate->addDays(1);
        }
        if ($request->masa == '1/2'){
            $order->end_date = $carbonDate;
        }
        if ($request->masa == '2'){
            $order->end_date = $carbonDate->addDays(2);
        }
        if ($request->masa == '3'){
            $order->end_date = $carbonDate->addDays(3);
        }

        $order->save();
        return redirect('/');



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


    public function bukti($id , Request $request){
        // Menyimpan file ke dalam direktori yang diinginkan (misalnya, storage/app/public/bukti_transfer)
        $file = $request->file('bukti_transfer');

        $fileName = 'bukti_transfer_' . time() . '.' . $file->getClientOriginalExtension();
        // Pindahkan file ke folder public
        $file->move(public_path('bukti_transfer'), $fileName);

        $data = orders::find($id);
        $data->payment_evidence = $fileName;
        $data->status = 2;
        $data->update();



        return redirect()->back();
    }


}
