<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;

class ClientController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'official_name' => 'required|string|max:255',
            'kana' => 'required|string|max:255',
            'app_registered_name' => 'required|string|max:255',
        ]);

        Client::create([
            'official_name' => $request->official_name,
            'kana' => $request->kana,
            'app_registered_name' => $request->app_registered_name,
        ]);

        return redirect()->route('ledger.clients')->with('success', '取引先が登録されました。');
    }
}
