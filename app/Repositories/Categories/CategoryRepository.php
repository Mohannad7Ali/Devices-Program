<?php

namespace App\Repositories\Categories;

use App\Interfaces\Categories\CategoryRepositoryInterface;
use App\Models\Category;
use Symfony\Component\HttpFoundation\Session\Session;

class CategoryRepository implements CategoryRepositoryInterface
{

    public function index()
    {
        $categories = Category::all();
        return view("Dashboard.Categories.index", compact("categories"));
    }

    public function store($request)
    {
        Category::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
        ]);
        session()->flash('add','تمت الاضافة بنجاح');
        return redirect()->route('categories.index');
    }

    public function update($request)
    {
        $category = Category::findorFail($request->id);
        $category->update([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
        ]);
        session()->flash('edit');
        return redirect()->route('categories.index');
    }

    public function show($id){
        $category = Category::findorFail($id);
        $devices = $category->devices()->get();
        return view('Dashboard.Categories.show_devices' , compact('category' , 'devices'));

    }
    public function destroy($request)
    {
        Category::findorFail($request->id)->delete();
        session()->flash('delete');
        return redirect()->route('categories.index');
    }
}
