<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryFormRequest;

class CategoryController extends Controller
{
    public function index()
    {
        $category = new Category();
        $category = Category::where( $category->name)->paginate(4);
        return view('admin.category.index', compact('category'));
    }
    public function add()
    {
        return view('admin.category.add');
    }
    public function insert(CategoryFormRequest $request)
    {
        $validatedData = $request->validated();
        $category = new Category();

        // $category =new Category;
        $category->name = $validatedData['name'];
        $category->slug = Str::slug($validatedData['slug']);
        $category->description = $validatedData['description'];

        $uploadPath = 'assets/uploads/category/';
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('assets/uploads/category/', $filename);
            $category->image =  $uploadPath.$filename;
            // $category->image = $filename;
        }

        $category->meta_title = $validatedData['meta_title'];
        $category->meta_keyword = $validatedData['meta_keyword'];
        $category->meta_description = $validatedData['meta_description'];
        $category->status = $request->status == true ? '1' : '0';
        $category->popular = $request->popular == true ? '1' : '0';
        $category->save();
        return redirect('/categories')->with('message', 'Category Added Successfully');
    }
    public function edit($id)
    {
        $category = Category::find($id);
        return view('admin.category.edit', compact('category'));
    }
    public function update(CategoryFormRequest $request, $id)
    {
        $category = Category::findOrFail($id);
        $validatedData = $request->validated();

        $category->name = $validatedData['name'];
        $category->slug = Str::slug($validatedData['slug']);
        $category->description = $validatedData['description'];


        if ($request->hasFile('image')) {
            $uploadPath = 'assets/uploads/category/';
            $path = 'assets/uploads/category/' . $category->image;
            if (File::exists($path)) {
                File::delete($path);
            }
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('assets/uploads/category/', $filename);
            $category->image = $uploadPath . $filename;
            // $category->image = $filename;
        }
        $category->meta_title = $validatedData['meta_title'];
        $category->meta_keyword = $validatedData['meta_keyword'];
        $category->meta_description = $validatedData['meta_description'];
        $category->status = $request->status == true ? '1' : '0';
        $category->update();
        return redirect('/categories')->with('message', 'Category Update Successfully');
    }
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        if ($category->image) {
            $path = 'assets/uploads/category/'.$category->image;
            if (File::exists($path)) {
                File::delete($path);
            }
        }
        $category->delete();
        return redirect('categories')->with('message', 'Category deleted successfully');
    }
}
