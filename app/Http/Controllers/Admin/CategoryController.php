<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryFormRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function index()
    {
        $category = Category::all();
        return view('admin.category.index', compact('category'));
    }

    public function create()
    {
        return view('admin.category.create');
    }

    public function store(CategoryFormRequest $request)
    {
        $data = $request->validated();
        $category = new Category;
        $category->name = $data['name'];
        $category->description = $data['description'];
        $category->slug = $data['slug'];
        $category->created_by = Auth::user()->id;
        $category->save();

        return redirect('admin/category')->with('message','Category Added Successfully');
    }

    public function edit($category_id)
    {
        $category = Category::find($category_id);

    return view('admin.category.edit', compact('category'));
    }

    public function update(CategoryFormRequest $request, $category_id)
    {
        $data = $request->validated();

        $category = Category::find($category_id);
        $category->name = $data['name'];
        $category->description = $data['description'];
        $category->slug = $data['slug'];
        $category->created_by = Auth::user()->id;
        $category->update();

        return redirect('admin/category')->with('message','Category updated Successfully');
    }

    public function delete($category_id)
    {
        $category = Category::find($category_id);
        if($category_id)
        {
            $category->delete();
            return redirect('admin/category')->with('message','Category deleted Successfully');
        }
        else
        {
            return redirect('admin/category')->with('message','No category ID found');
        }
    }
}
