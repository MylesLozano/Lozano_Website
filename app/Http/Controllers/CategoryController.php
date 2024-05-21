<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Request;

class CategoryController extends Controller
{
    public function sortCategories($order)
    {
        $categories = Category::orderBy('name', $order)->get();
        return view('categories.index', compact('categories'));
    }
    /**
     * Show the form for editing the specified category.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        $view = view('categories.edit', compact('category'));
        return response($view);
    }

    /**
     * Update the specified category in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        $category->update($request->all());

        $successMessage = 'Category updated successfully';
        return redirect('categories.index')->with('success', $successMessage);
    }
    /**
     * Remove the specified category from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();

        $response = new Response(view('categories.index')
            ->with('success', 'Category deleted successfully'));

        return $response;
    }
}

