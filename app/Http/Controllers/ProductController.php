<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'item' => 'required|string|max:255',
            'packaging' => 'required|string|max:255',
            'unit' => 'required|string|max:255',
            'price' => 'required|numeric',
        ]);

        Product::create([
            'item' => $request->item,
            'packaging' => $request->packaging,
            'unit' => $request->unit,
            'price' => $request->price,
        ]);

        return redirect()->route('ledger.products')->with('success', '商品が登録されました。');
    }
}
