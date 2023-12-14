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

    


    


}
