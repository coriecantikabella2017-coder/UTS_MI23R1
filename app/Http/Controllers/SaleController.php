<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\Product;
use App\Models\Customer;
use App\Models\SaleItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sales = Sale::with('customer')
                    ->latest()
                    ->get();

        return view('admin.sales.index', compact('sales'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $customers = Customer::all();
        $products = Product::all();

        return view(
            'admin.sales.create',
            compact('customers','products')
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
        'customer_id' => 'required',
        'sale_date'   => 'required',
        'product_id'  => 'required|array'
    ]);
            try {
                    DB::transaction(function () use ($request) {
            
                    $sale = Sale::create([
                    'kode' => 'INV-' . now()->format('YmdHis'),
                    'customer_id' => $request->customer_id,
                    'sale_date' => $request->sale_date,
                    'total_amount' => 0
                    ]);
                    $total = 0;
                    foreach($request->product_id as $key => $productId){

                        $product = Product::findOrFail($productId);

                     $qty = $request->qty[$key];
                    // VALIDASI STOK
                    if ($qty <= 0) {
                    return back()->with('error', 'Qty harus lebih dari 0');
                        }

                    if ($qty > $product->stok) {
                    return back()->with('error', 'Stok tidak cukup');
                     }
                    $subtotal = $product->harga * $qty;

                 SaleItem::create([
                    'sale_id'=>$sale->id,
                    'product_id'=>$product->id,
                    'qty'=>$qty,
                    'price'=>$product->harga,
                    'subtotal'=>$subtotal
                    ]);

                    $product->decrement('stok', $qty);
                
                    $total += $subtotal;
                }

            $sale->update([
                'total_amount'=>$total
            ]);
        });

        return redirect()->route('sales.index');
    }catch (\Exception $e) {

        dd($e->getMessage());
    }
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $sale = Sale::with(
            'customer',
            'items.product'
        )->findOrFail($id);

        return view(
            'admin.sales.show',
            compact('sale')
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
      $sale = Sale::with('items')
            ->findOrFail($id);

        DB::transaction(function() use($sale){

            foreach($sale->items as $item){

                Product::find(
                    $item->product_id
                )->increment(
                    'stok',
                    $item->qty
                );
            }

            $sale->delete();
        });

        return redirect()
            ->route('sales.index');  
    }
}
