<?php

namespace App\Http\Controllers;

use App\NewsCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class NewsCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = NewsCategory::paginate(10);
        return view('admin.pages.NewsCategory.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.NewsCategory.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'min:3|max:255|required',
            'name-en' => 'max:255|min:3'
        ]);

        $data = $request->all();
        NewsCategory::create([
            'name' => $data['name'],
            'slug' => str_slug($data['name']),
            'name_en' => $data['name-en'],
            'slug_en' => str_slug($data['name-en'])
        ]);

        Session::flash('message', 'Category successfully added!');

        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = NewsCategory::findOrFail($id);
        return view('admin.pages.NewsCategory.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'min:3|max:255|required',
            'name-en' => 'min:3|max:255'
        ]);
        $category = NewsCategory::findOrFail($id);
        $data = $request->all();
        $category->update([
            'name' => $data['name'],
            'slug' => str_slug($data['name']),
            'name_en' => $data['name-en'],
            'slug_en' => str_slug($data['name-en'])
        ]);

        Session::flash('message', 'Category successfully updated!');

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = NewsCategory::findOrFail($id);
        $count = $category->news->count();
        if ($count > 0) {
            Session::flash('error', 'Can not delete this category because it has ' . $count . ' post(s)!');

            return redirect()->back();
        } else {
            $category->delete();

            Session::flash('message', 'Category successfully deleted!');

            return redirect()->route('news-categories.index');
        }
    }

    public function delSome(Request $request)
    {
        $id = $request->id;
        foreach ($id as $value) {
            $item = NewsCategory::findOrFail($value);
            $item->delete();
        }
        echo "Deleted!";
    }
}
