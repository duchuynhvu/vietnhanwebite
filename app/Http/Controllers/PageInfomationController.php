<?php

namespace App\Http\Controllers;

use App\PageInformation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PageInfomationController extends Controller
{
    public function show()
    {
        $pages = PageInformation::all();
        return view('admin.pages.PageInfo.index', compact('pages'));
    }

    public function edit($code)
    {
        $page = PageInformation::where('page', $code)->first();
        return view('admin.pages.PageInfo.edit', compact('page'));
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'title' => 'max:255',
            'description' => 'max:255',
            'keyword' => 'max:255'
        ]);
        $data = $request->all();
        $code = $request->code;
        $page = PageInformation::where('page', $code)->first();
        $page->update([
            'title' => $data['title'],
            'description' => $data['description'],
            'keyword' => $data['keyword']
        ]);

        Session::flash('message', 'Page successfully updated!');

        return redirect()->back();
    }
}
