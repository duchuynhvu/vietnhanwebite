<?php

namespace App\Http\Controllers;

use App\Regent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;

class RegentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $regents = Regent::paginate(10);
        return view('admin.pages.regent.index', compact('regents'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.regent.create');
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
            'name' => 'required|min:3|max:255',
            'regency' => 'required|min:3|max:255',
            'content' => 'required|min:10',
            'name-en' => 'max:255',
            'regency-en' => 'max:255',
            'image' => 'required|image|max:2000'
        ]);

        $data = $request->all();

        if (Input::file('image')->isValid()) {
            $path = 'uploads/regents';
            $filename = Input::file('image')->getClientOriginalName();
            Input::file('image')->move($path, $filename);
            Regent::create([
                'name' => $data['name'],
                'regency' => $data['regency'],
                'content' => $data['content'],
                'image' => $filename,
                'name_en' => $data['name-en'],
                'regency_en' => $data['regency-en'],
                'content_en' => $data['content-en']
            ]);

            Session::flash('message', 'Regent successfully added!');

        } else {
            Session::flash('error', 'Uplaod file is not valid!');
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
        $regent = Regent::findOrFail($id);
        return view('admin.pages.regent.edit', compact('regent'));
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
            'name' => 'required|min:3|max:255',
            'regency' => 'required|min:3|max:255',
            'content' => 'required|min:10',
            'name-en' => 'max:255',
            'regency-en' => 'max:255',
            'image' => 'image|max:2000'
        ]);
        $regent = Regent::findOrFail($id);
        $data = $request->all();
        if (Input::hasFile('image')) {
            $path = 'uploads/regents';
            $filename = Input::file('image')->getClientOriginalName();
            Input::file('image')->move($path, $filename);
            $regent->update([
                'name' => $data['name'],
                'regency' => $data['regency'],
                'content' => $data['content'],
                'image' => $filename,
                'name_en' => $data['name-en'],
                'regency_en' => $data['regency-en'],
                'content_en' => $data['content-en']
            ]);
        } else {
            $regent->update([
                'name' => $data['name'],
                'regency' => $data['regency'],
                'content' => $data['content'],
                'name_en' => $data['name-en'],
                'regency_en' => $data['regency-en'],
                'content_en' => $data['content-en']
            ]);
        }

        Session::flash('message', 'Regent successfully updated!');
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
        $regent = Regent::findOrFail($id);
        $regent->delete();
        Session::flash('message', 'Regent successfully deleted!');
        return redirect()->route('regents.index');
    }

    public function delSome(Request $request)
    {
        $id = $request->id;
        foreach ($id as $value) {
            $item = Regent::findOrFail($value);
            $item->delete();
        }
        echo "Deleted!";
    }
}
