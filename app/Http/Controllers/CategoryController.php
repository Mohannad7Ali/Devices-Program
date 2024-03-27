<?php

namespace App\Http\Controllers;

use App\Interfaces\Categories\CategoryRepositoryInterface;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    private $category;
    public function __construct(CategoryRepositoryInterface $category){
        $this->category = $category;
    }

    public function index(){
        return $this->category->index();
    }
    public function store(Request $request){
        return $this->category->store($request);
    }
    public function show($id)
    {
        return $this->category->show($id);
    }
    public function update(Request $request){
        return $this->category->update($request);
    }
    public function destroy(Request $request){
        return $this->category->destroy($request);
    }
}
