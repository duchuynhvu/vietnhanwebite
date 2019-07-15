<?php

namespace App\Http\Controllers;

use App\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AboutController extends Controller
{
    /**
     * Show the form for editing the specified resource.
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $content = About::first();
        return view('admin.pages.about.edit', compact('content'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $this->validate($request, [
            'content' => 'required|min:10'
        ]);
        $about = About::first();
        $data = $request->all();
        $about->update([
            'content' => $data['content'],
            'content_en' => $data['content-en']
        ]);
        Session::flash('message', 'Content successfully updated!');

        return redirect()->back();
    }
}
