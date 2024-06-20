<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Auth::user()->categories;
        return view('category.index', compact('categories'));
    }

    public function create()
    {
        $users = User::all();
        return view('category.create', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:45',
            'color' => 'required|string|max:255',
           
        ]);

        $category = new Category();
        $category->name = $request->name;
        $category->color = $request->color;
        $category->user_id = Auth::id(); // Asigna el ID del usuario autenticado
        $category->save();

        return redirect()->route('home')->with('success', 'Copia creada exitosamente.');

        
    }
    public function show(Category $category)
    {
        return view('Category.show',compact('category'));
    }

    public function edit(Category $category)
    {
        

        return view('category.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|string|max:45',
            'color' => 'required|string|max:45',
        
        ]);

        $category->name = $request->name;
        $category->color = $request->color;
        $category->save();

        return redirect()->route('categories.index');
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('category.index');
    }
}
