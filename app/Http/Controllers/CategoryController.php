<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function index()
    {
        $categories = Category::latest()->get();
        return view('categories.index', compact('categories'));
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3',
        ]);

        Category::create([
            'name'        => $request->name,
            'description' => $request->description
        ]);

        return redirect()->route('categories.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function edit(Category $category)
    {
        return view('categories.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|min:3',
        ]);

        $category->update([
            'name'        => $request->name,
            'description' => $request->description
        ]);

        return redirect()->route('categories.index')->with(['success' => 'Data Berhasil Diupdate!']);
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('categories.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}