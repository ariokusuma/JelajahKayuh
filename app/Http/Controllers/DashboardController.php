<?php

namespace App\Http\Controllers;

use App\Models\categories;
use Carbon\Carbon;

use App\Models\User;
use App\Models\items;
use App\Models\orders;
use Illuminate\Http\Request;

use Illuminate\View\View;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class DashboardController extends Controller
{


        // Main Dashboard Controller
        public function sumData(){
            $controller = new DashboardController();
            $total_users = $controller->sumTotalUsers();
            $total_items = $controller->sumTotalItems();
            $total_orders = $controller->sumTotalOrders();
            $total_penalty= $controller->sumTotalPenalty();

            // dd($total_orders);

            return view('admin.dashboard', [
                'total_users' => $total_users->total_users,
                'total_items' => $total_items->total_items,
                'total_orders' => $total_orders->total_orders,
                'total_penalty' => $total_penalty->total_penalty
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
    private function sumTotalPenalty(): View
    {
        $total_penalty = orders::where('status', 6)->count();
        return view('admin.dashboard', ['total_penalty' => $total_penalty]);
    }









    // ================================== User Controllers ==================================

     // CRUD User

    public function getAllUserData(): View {
        $AllUserData = DB::table('users')->get();

        $roleType = [
            0 => 'Admin',
            2 => 'Personal'
        ];

        return view('admin.dashboard_users', ['AllUserData' => $AllUserData, 'roleType' => $roleType]);
    }


    public function add_user() {
        return view('admin.cud.add_users');
    }

    public function add_user_action(Request $request) {
        // dd($request->toArray());
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

    // ============= UPDATE USER =============================
    public function edit_user(Request $request, $id) {
        // dd($request->all());

        $cari = User::find($id);

        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('photos', 'public');

            $cari->photo = $photoPath;
        }

        $cari->update([
            'role' => $request->role,
            'name' => $request->name,
            'nohp' => $request->nohp,
            'email' => $request->email,
        ]);

        // if ($request->hasFile('photo')) {
        //     $photoPath = $request->file('photo')->store('photos', 'public'); // simpan foro ke 'public/photos'
        //     $cari->photo = $photoPath;
        // }

        return redirect('/dashboard-user');
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

    public function getAllItemsData(): View
    {
        $AllItemsData = items::with('categories')->get();

        $pullCategories = categories::pluck('category_name','id');
        // $order->finalPrice = $finalPrice;

        foreach ($pullCategories as $categoryID => $categoryName) {
            $categories[] = [
                'id' => $categoryID,
                'name' => $categoryName,
            ];

        }
        // dd($AllItemsData);

        return view('admin.dashboard_items', ['AllItemsData' => $AllItemsData, 'categories' => $categories]);
    }

    public function cari(Request $request)
	{
		// menangkap data pencarian
		// $cari = $request->cari;
        $cari = $request->input('cari');

    		// mengambil data dari table items sesuai pencarian data
        $AllItemsData = items::where('item_name', 'like', '%' . $cari . '%')->get();
		// $AllItemsData = DB::table('items')
		// ->where('item_name','like',"%".$cari."%")->get();;
        $pullCategories = categories::pluck('category_name','id');

        foreach ($pullCategories as $categoryID => $categoryName) {
            $categories[] = [
                'id' => $categoryID,
                'name' => $categoryName,
            ];

        }
    		// mengirim data items ke view
            // dd($AllItemsData->toArray());
		return view('admin.dashboard_items',['AllItemsData' => $AllItemsData, 'categories' => $categories]);

	}


    public function add_items(Request $request) {
        dd($request->toArray());
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

        $response = [
            'message' => 'Data Added Successfully',
            'redirect' => route('dashboardItems')
        ];


        return redirect()->route('dashboardItems')->with('success', 'Tambah Data Berhasil!');
    }

    public function edit_items(Request $request, $id) {
        // dd($request->all());

        $cari = items::find($id);

        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('photos', 'public');
            $cari->photo = $photoPath;
        }

        $cari->update([
            'item_name' => $request->item_name,
            'category' => $request->category,
            'desc' => $request->desc,
            'price' => $request->price,
        ]);

        // if ($request->hasFile('photo')) {
        //     $photoPath = $request->file('photo')->store('photos', 'public'); // simpan foro ke 'public/photos'
        //     $cari->photo = $photoPath;
        // }

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


    public function getAllOrdersData()
    {
        $AllOrdersData = orders::with('item', 'user', 'categories')->get();
        // dd($AllOrdersData->toArray());

        foreach ($AllOrdersData as $order) {
            // Parse Date from db
            $startDate = Carbon::parse($order->start_date);
            $endDate = Carbon::parse($order->end_date);

            // Count Rent Durations
            $rentDuration =  $endDate->diffAsCarbonInterval($startDate)->
                                        settings(['locale' => 'id'])->
                                        forHumans(['short' => false]);
            $order->rentDuration = $rentDuration;

            // Count Rent Time Left
            $remainingTime = now()->diffAsCarbonInterval($endDate)->
                                    settings(['locale' => 'id'])->
                                    forHumans(['short' => false]);
            $order->remainingTime = $remainingTime;
            // dd($remainingTime);

            // Calculate Final Price
            $days = $endDate->diffInDays($startDate);
            $finalPrice =  number_format($days * $order->item->price, 0, ',', '.');
            $order->finalPrice = $finalPrice;
            // dd($days);

            // Penalty Mechanism
            if (now() > $endDate && $order->status != 5) {
                $penaltyDays = now()->diffInDays($endDate);
                // dd($penaltyDays);
                $penaltyAmount = $penaltyDays * 150000;

                $order->finalPrice += $penaltyAmount;
                $order->remainingTime = 'Jumlah Denda: ' . $penaltyAmount;
                $order->rentDuration = 'Telat: ' . $penaltyDays . ' hari';

            }
        }

        return view('admin.dashboard_orders', ['AllUserData' => $AllOrdersData]);
    }


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

// ================================== Category Controllers ==================================

public function getAllCategoryData(): View
{
    $AllCategoryData = categories::all();

    // dd($AllCategoryData->toArray());

    return view('admin.dashboard_category', ['AllCategoryData' => $AllCategoryData]);
}


// public function add_category() {
//     return view('admin.cud.add_users');
// }

public function add_category( Request $request) {
    // dd($request->all());
    $request->validate([
        'category_name' => 'required',
    ],
);

    $category = new categories([
        'category_name' => $request->category_name,
    ]);

    $category->save();

    return redirect()->route('dashboardCategory')->with('success', 'Tambah Data Berhasil!');
}


public function edit_category(Request $request, $id) {
    // dd($request->all());

    $cari = categories::find($id);

    $cari->update([
        'category_name' => $request->category_name,

    ]);

    return redirect('/dashboard-category');
}


public function delete_category($id) {
    // dd('Delete user method reached. User ID:', $id);
    $User = categories::findOrFail($id);
    $User->delete();


    return redirect('/dashboard-category');
}


public function update_order(Request $request, $id)
{
    // Validate other form fields as needed

    // Update the status
    $data = orders::findOrFail($id);
    $data->status = $request->input('status');
    $data->save();

    // Redirect or respond as needed
    return redirect('/dashboard-orders');
}



}





