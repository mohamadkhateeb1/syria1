<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoriesController extends Controller
{

    /*
    Category index
     */
    public function index()
    {
        // filter logic
        $request = request();
        $query = Category::query();
        $name = $request->query('name');
        $status = $request->query('status');
        if ($name) {
            $query->where('name', 'like', "%$name%");
        }
        if ($status) {
            $query->where('status', $status);
        }
        // $categories = Category::all();
        $categories = $query->paginate(2);

        return view('dashboard.pages.categories.index', ['Categories' => $categories]);
    }
    /*
     Create Category
    */


    public function create()
    {
        $parentCategories = Category::all();
        $categories = Category::all();
        return view('dashboard.pages.categories.create', ['Categories' => $categories, 'ParentCategories' => $parentCategories]);
    }
    public function store(Request $request)
    {
        $category = new Category();
        // Validate the request data
        $request->validate(Category::rules()); //validation
        $category->name = $request->name;
        $category->status = $request->status;
        $category->slug = Str::slug($request->name);
        $category->description = $request->description;
        $category->parent_id = $request->parent_category;
        $category->save();
        return redirect(route('categories.index'))->with('flash_message', 'Category created successfully.');
    }
    public function edit($id)
    {
        $parentCategories = Category::all();
        $category = Category::find($id);
        return view('dashboard.pages.categories.edit', ['Categories' => $category, 'ParentCategories' => $parentCategories]);
    }
    public function update(Request $request, $id)
    {

        $category = Category::find($id);
        $request->validate(Category::rules()); //validation
        $category->name = $request->name;
        $category->slug = Str::slug($request->name);
        $category->description = $request->description;
        $category->parent_id = $request->parent_category;
        $category->save();
        return redirect(route('categories.index'))
            ->with('warning', 'Category updated successfully.');
    }
    public function destroy($id)
    {
        $category = Category::find($id);
        if ($category) {
            $category->delete();
        }
        return redirect(route('categories.index'))->with('danger', 'Category deleted successfully.');
    }
}
