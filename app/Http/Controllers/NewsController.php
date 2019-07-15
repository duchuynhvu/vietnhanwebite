<?php

namespace App\Http\Controllers;

use App\News;
use App\NewsSEO;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = News::orderBy('created_at', 'DESC')->paginate(10);
        return view('admin.pages.news.index', compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = \App\NewsCategory::all();
        return view('admin.pages.news.create', compact('categories'));
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
            'title' => 'required|min:3|max:255',
            'description' => 'required|min:10',
            'content' => 'required|min:10',
            'title-en' => 'max:255',
            'image' => 'required|image|max:2000'
        ]);
        $data = $request->all();
        if (!isset($data['publish'])) {
            $publish = 0;
        } else {
            $publish = $data['publish'];
        }
        if (Input::file('image')->isValid()) {
            $path = 'uploads/news';
            $fileName = Input::file('image')->getClientOriginalName();
            Input::file('image')->move($path, $fileName);
            $id = News::create([
                'title' => $data['title'],
                'description' => $data['description'],
                'category_id' => $data['category'],
                'content' => $data['content'],
                'image' => $fileName,
                'author_id' => Auth::user()->id,
                'slug' => str_slug($data['title']),
                'publish' => $publish,
                'title_en' => $data['title-en'],
                'description_en' => $data['description-en'],
                'content_en' => $data['content-en']
            ])->id;

            NewsSEO::create([
                'news_id' => $id,
                'title' => $data['title'],
                'description' => $data['title']
            ]);

            Session::flash('message', 'New Successfully Added!');
        } else {
            Session::flash('error', 'Upload File Is Not Valid!');
        }

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
        $news = News::findOrFail($id);
        $categories = \App\NewsCategory::all();
        return view('admin.pages.news.edit', compact('news', 'categories'));
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
            'title' => 'required|min:3|max:255',
            'description' => 'required|min:10',
            'content' => 'required|min:10',
            'title-en' => 'max:255',
            'image' => 'image|max:2000'
        ]);
        $news = News::findOrFail($id);
        $data = $request->all();
        if (!isset($data['publish'])) {
            $publish = 0;
        } else {
            $publish = 1;
        }
        if (Input::hasFile('image')) {
            $path = 'uploads/news';
            $fileName = Input::file('image')->getClientOriginalName();
            Input::file('image')->move($path, $fileName);
            $news->update([
                'title' => $data['title'],
                'description' => $data['description'],
                'category_id' => $data['category'],
                'content' => $data['content'],
                'image' => $fileName,
                'author_id' => Auth::user()->id,
                'slug' => str_slug($data['title']),
                'publish' => $publish,
                'title_en' => $data['title-en'],
                'description_en' => $data['description-en'],
                'content_en' => $data['content-en']
            ]);
        } else {
            $news->update([
                'title' => $data['title'],
                'description' => $data['description'],
                'category_id' => $data['category'],
                'content' => $data['content'],
                'author_id' => Auth::user()->id,
                'slug' => str_slug($data['title']),
                'publish' => $publish,
                'title_en' => $data['title-en'],
                'description_en' => $data['description-en'],
                'content_en' => $data['content-en']
            ]);
        }

        Session::flash('message', 'News successfully updated!');

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
        $news = News::findOrFail($id);
        $news->delete();

        Session::flash('message', 'News successfully deleted!');

        return redirect()->route('news.index');
    }

    public function delSome(Request $request)
    {
        $id = $request->id;
        foreach ($id as $value) {
            $item = News::findOrFail($value);
            $item->delete();
        }
        echo "Deleted!";
    }

    public function switchPublish(Request $request)
    {
        $id = $request->id;
        $news = News::find($id);
        if ($news->publish == 1) {
            $news->publish = 0;
        } else {
            $news->publish = 1;
        }
        $news->save();
        echo "Updated!";
    }

    public function seo()
    {
        $news = News::orderBy('created_at', 'DESC')->paginate(10);
        return view('admin.pages.news.seo', compact('news'));
    }

    public function seoEdit($id)
    {
        $news = News::findOrFail($id);
        return view('admin.pages.news.SEOEdit', compact('news'));
    }

    public function seoUpdate(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'max:255',
            'description' => 'max:255',
            'keyword' => 'max:255',
        ]);
        $data = $request->all();
        $seo = NewsSEO::where('news_id', $id)->first();
        $seo->update([
            'title' => $data['title'],
            'description' => $data['description'],
            'keyword' => $data['keyword']
        ]);

        Session::flash('message', 'News successfully update!');

        return redirect()->back();
    }
}
