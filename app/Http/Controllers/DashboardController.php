<?php

namespace App\Http\Controllers;
use Carbon\Carbon;

use App\Models\User;
use App\Models\items;
use App\Models\orders;
use Illuminate\Http\Request;

use Illuminate\View\View;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{



    public function sumData(){
        $controller = new DashboardController();
        $total_users = $controller->sumTotalUsers();
        $total_items = $controller->sumTotalItems();
        $total_orders = $controller->sumTotalOrders();

        // dd($total_orders);

        return view('admin.dashboard', [
            'total_users' => $total_users->total_users,
            'total_items' => $total_items->total_items,
            'total_orders' => $total_orders->total_orders,
        ]);
    }


    private function sumTotalUsers(): View
    {
        $total_users = User::count();
        return view('admin.dashboard', ['total_users' => $total_users]);
    }
    private function sumTotalItems(): View
    {
        $total_users = items::count();
        return view('admin.dashboard', ['total_items' => $total_users]);
    }
    private function sumTotalOrders(): View
    {
        $total_users = orders::count();
        return view('admin.dashboard', ['total_orders' => $total_users]);
    }



    public function getAllUserData(): View
    {
        $AllUserData = DB::table('users')->get();

        return view('admin.dashboard_users', ['AllUserData' => $AllUserData]);
    }

    public function getAllItemsData(): View
    {
        $AllItemsData = DB::table('items')->get();

        return view('admin.dashboard_items', ['AllItemsData' => $AllItemsData]);
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


            $order->waktu = $waktu;
            $order->sisaWaktu = $sisaWaktu;


        }
        // dd($dataa->all());

        return view('admin.dashboard_orders', ['AllOrdersData' => $AllOrdersData]);
    }
}
