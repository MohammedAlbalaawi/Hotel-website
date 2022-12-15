<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CategoryController extends Controller
{

    public function index()
    {
        $categories = Category::get();
        return view('dashboard.categories.index', compact('categories'));
    }


    public function create()
    {
        $parents = Category::get();
        $model = new Category;
        return view('dashboard.categories.create', compact('parents', 'model'));
    }


    public function store(CategoryRequest $request)
    {
        $data = $request->validated();

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('categories');
        }
        Category::create($data);

        return redirect()
            ->route('dashboard.categories.index')
            ->with('success', 'Category added successfully');
    }


    public function show(Category $model)
    {

    }


    public function edit(Category $model)
    {
        $parents = Category::where('id', '<>', $model->id)
            ->where(function ($query) use ($model) {
                $query->whereNull('parent_id')
                    ->orwhere('parent_id', '<>', $model->id);
            })->get();

        return view('dashboard.categories.edit', compact('model', 'parents'));
    }


    public function update(CategoryRequest $request, Category $model)
    {
        $data = $request->validated();

        if ($request->hasFile('image')) {

            if ($model->image && Storage::exists($model->image)) {
                Storage::delete($model->image);
            }

            $data['image'] = $request->file('image')->store('categories');
        }

        $model->update($data);

        return redirect()
            ->route('dashboard.categories.index')
            ->with('success', 'Category updated successfully');
    }

    public function destroy(Category $model)
    {
        $model->delete();

        return redirect()
            ->back()
            ->with('success', 'Category deleted successfully');

    }


}
