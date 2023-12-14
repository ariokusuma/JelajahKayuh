<?php

namespace App\Http\Controllers;
use Carbon\Carbon;

use App\Models\User;
use App\Models\items;
use App\Models\orders;
use Illuminate\Http\Request;

use Illuminate\View\View;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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

        $categories = [
            'Sepeda Gunung (Mountain Bike)',
            'Sepeda Balap (Race Bike)',
            'Sepeda Lipat (Folding Bike)' ,
            'Sepeda Listrik (E-Bike)',
        ];

        return view('admin.dashboard_items', ['AllItemsData' => $AllItemsData, 'categories' => $categories]);
    }


    public function getAllOrdersData(): View
    {
        $AllOrdersData = orders::with('item', 'user')->get();

        foreach ($AllOrdersData as $order) {
            $waktu = '';
            $sisaWaktu = '';

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

        return view('admin.dashboard_orders', ['AllOrdersData' => $AllOrdersData]);
    }



    // ================================== User Controllers ==================================

     // CRUD User
    public function add_user() {
        return view('admin.cud.add_users');
    }

    public function add_user_action(Request $request) {
        // dd($request->all());
        $request->validate([
            'name' => 'required',
            'nohp' => 'required',
            'email' => 'required|email|unique:users',
            'photo' => 'image|mimes:jpeg,png,jpg|max:2048',
            'password' => [
                'required',
                'confirmed',
                // 'min:8',
                // 'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]+$/',
                // function ($attribute, $value, $fail) {
                //     if (strlen($value) < 8) {
                //         throw ValidationException::withMessages([
                //             'password' => 'Password harus memiliki setidaknya 8 karakter.',
                //         ]);
                //     }
                //     if (preg_match('/^[a-zA-Z]+$/', $value)) {
                //         throw ValidationException::withMessages([
                //             'password' => 'Password tidak boleh berupa huruf semua.',
                //         ]);
                //     }
                //     if (preg_match('/^\d+$/', $value)) {
                //         throw ValidationException::withMessages([
                //             'password' => 'Password tidak boleh berupa angka semua.',
                //         ]);
                //     }
                //     if (!preg_match('/[@$!%*?&]/', $value)) {
                //         throw ValidationException::withMessages([
                //             'password' => 'Password harus memiliki setidaknya satu karakter khusus.',
                //         ]);
                //     }
                // },
            ],
        ],
    );

        $user = new User([
            'role' => 1,
            'name' => $request->name,
            'nohp' => $request->nohp,
            'email' => $request->email,
            'password' => Hash::make($request->password),

        ]);

        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('photos', 'public'); // Save the photo to the 'public/photos' directory
            $user->photo = $photoPath;
        }

        $user->save();

        return redirect()->route('dashboardUsers')->with('success', 'Tambah Data Berhasil!');
    }


    public function delete_user($id) {
        // dd('Delete user method reached. User ID:', $id);
        $User = User::findOrFail($id);
        $User->delete();


        return redirect('/dashboard-user');
    }

// ================================== Items Controllers ==================================
    public function items() {
        return view('admin.cud.add_items');
    }


    public function add_items(Request $request) {
        // dd($request->all());
        $request->validate([
            'item_name' => 'required',
            'category' => 'required',
            'desc' => 'required',
            'photo' => 'image|mimes:jpeg,png,jpg|max:2048',
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
            $photoPath = $request->file('photo')->store('photos', 'public'); // simpan foro ke 'public/photos'
            $user->photo = $photoPath;
        }

        $user->save();

        return redirect()->route('dashboardItems')->with('success', 'Tambah Data Berhasil!');
    }

    public function edit_items(Request $request, $id) {
        // dd($request->all());

        $cari = items::find($id);

        $cari->update([
            'item_name' => $request->item_name,
            'category' => $request->category,
            'desc' => $request->desc,
            'price' => $request->price,
        ]);

        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('photos', 'public'); // simpan foro ke 'public/photos'
            $cari->photo = $photoPath;
        }

        return redirect('/dashboard-items');
    }

    public function editItems(Request $request, $id) {

    }


    public function delete_item($id) {
        // dd('Delete user method reached. User ID:', $id);
        $User = items::findOrFail($id);
        $User->delete();


        return redirect('/dashboard-items');
    }

// ================================== Orders Controllers ==================================

public function order() {
    return view('admin.cud.add_orders');
}


public function add_order(Request $request) {
    // dd($request->all());
    $request->validate([
        'item_name' => 'required',
        'category' => 'required',
        'desc' => 'required',
        'photo' => 'image|mimes:jpeg,png,jpg|max:2048',
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

    return redirect()->route('dashboardItems')->with('success', 'Tambah Data Berhasil!');
}




}
