<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;
use Inertia\Inertia;

class BrandController extends Controller
{
    // Controller methods for Brand resource

    // Listar todas las marcas
    public function index()
    {
        $brands = Brand::all();

        return Inertia::render('Brands/Index', [
            'brands' => $brands,
        ]);
    }

    public function create()
    {
        return Inertia::render('Brands/Create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Brand::create([
            'name' => $request->name,
        ]);

        return redirect()->route('brands.index');
    }

    public function show($id)
    {
        // Code to display a specific brand
    }

    public function edit(Brand $brand)
    {
        return Inertia::render('Brands/Edit', [
            'brand' => $brand,
        ]);
    }

    public function update(Request $request, Brand $brand)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $brand->update([
            'name' => $request->name,
        ]);

        return redirect()->route('brands.index');

    }

    public function destroy(Brand $brand)
    {
        $brand->delete();

        return redirect()->route('brands.index');
    }


}
