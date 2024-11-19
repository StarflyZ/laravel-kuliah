<?php

namespace App\Http\Controllers;

use App\Models\Contribution;
use App\Models\Employee;
use App\Models\Citizen;
use App\Models\Product;
use Illuminate\Http\Request;

class ContributionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contributions = Contribution::all();

        return view("contribution.index", compact("contributions"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $employees = Employee::all();
        $citizens = Citizen::all();
        $products = Product::all();
        $contributions = Contribution::all();

        return view("contribution.formcreate", compact("employees", "citizens", "products"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'username' => 'required|exists:employee_accounts,username',
            'citizen_id' => 'required|exists:citizens,citizen_id',
            'products' => 'required|array',
            'products.*.id' => 'required|exists:products,product_id',
            'products.*.amount' => 'required|numeric|min:1',
        ]);

        $contribution = Contribution::create([
            'contribution_date' => now(),
            'username' => $validatedData['username'],
            'citizen_id' => $validatedData['citizen_id'],
        ]);

        foreach ($validatedData['products'] as $product) {
            $contribution->products()->attach($product['id'], ['amount' => $product['amount']]);
        }

        return redirect()->route('contribution.index')->with('success', 'Contribution added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Contribution $contribution)
    {
        return view("contribution.show", compact("contribution"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Contribution $contribution)
    {
        $employees = Employee::all();
        return view('contribution.edit', compact('contribution', 'employees'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Contribution $contribution)
    {
        $contribution->username = $request->username;
        $contribution->save();
        return redirect()->route('contribution.index')->with('status', 'Data employee berhasil diubah !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contribution $contribution)
    {
        try {
            $contribution->delete();
            return redirect()->route('contribution.index')->with('status', 'Data kontributsi sukses dihapus !');
        } catch (\PDOException $e) {
            return redirect()->route('contribution.index')->with('status', 'Data kontributsi gagal dihapus !');
        }
    }

    public function contributionProduct_create()
    {
        $contributions = Contribution::all();
        $products = Product::all();
        return view("contribution_product.formcreate", compact("contributions", "products"));
    }

    public function contributionProduct_store(Request $request)
    {
        $validatedData = $request->validate([
            'contribution_id' => 'required|exists:contributions,contribution_id',
            'product_id' => 'required|exists:products,product_id',
            'amount' => 'required|numeric|min:1',
        ]);

        $contribution = Contribution::findOrFail($validatedData['contribution_id']);
        $exists = $contribution->products()
            ->where('contribution_product.product_id', $validatedData['product_id'])
            ->exists();

        if (!$exists) {
            $contribution->products()->attach($validatedData['product_id'], ['amount' => $validatedData['amount']]);
        } else {
            return redirect()->back()->with('error', 'The selected product is already linked to this contribution.');
        }

        return redirect()->back()->with('success', 'Contribution Product added successfully!');
    }

    public function contributionProduct_delete(Contribution $contribution, Product $product)
    {
        try {
            $contribution->products()->detach($product->product_id);
            return redirect()->back()->with('success', 'Contribution Product deleted successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to delete Contribution Product: ' . $e->getMessage());
        }
    }
}
