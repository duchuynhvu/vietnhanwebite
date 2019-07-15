<?php

namespace App\Http\Controllers;

use App\SliderImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;

class SliderImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $images = SliderImage::paginate(10);
        return view('admin.pages.slider.index', compact('images'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.slider.create');
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
            'image' => 'required|image|max:2000'
        ]);
        $data = $request->all();
        if (!isset($data['publish'])) {
            $publish = 0;
        } else {
            $publish = $data['publish'];
        }

        if (Input::file('image')->isValid()) {
            $path = 'uploads/images';
            $fileName = Input::file('image')->getClientOriginalName();
            Input::file('image')->move($path, $fileName);
            SliderImage::create([
                'image' => $fileName,
                'alt' => $data['alt'],
                'publish' => $publish
            ]);
            Session::flash('message', 'Image successfully added!');
        } else {
            Session::flash('error', 'Upload File is not valid!');
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
        $image = SliderImage::findOrFail($id);
        return view('admin.pages.slider.edit', compact('image'));
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
            'image' => 'image|max:2000'
        ]);
        $data = $request->all();
        $image = SliderImage::findOrFail($id);
        if (!isset($data['publish'])) {
            $publish = 0;
        } else {
            $publish = 1;
        }
        if (Input::hasFile('image')) {
            $path = 'uploads/images';
            $fileName = Input::file('image')->getClientOriginalName();
            Input::file('image')->move($path, $fileName);
            $image->update([
                'image' => $fileName,
                'alt' => $data['alt'],
                'publish' => $publish
            ]);
        } else {
            $image->update([
                'alt' => $data['alt'],
                'publish' => $publish
            ]);
        }

        Session::flash('message', 'Image successfully updated!');

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
        $image = SliderImage::findOrFail($id);
        $image->delete();

        Session::flash('message', 'Image successfully deleted!');

        return redirect()->route('slider.index');
    }

    /**
     * Change publish of Image.
     */
    public function switchPublish(Request $request)
    {
        $id = $request->id;
        $image = SliderImage::find($id);
        if ($image->publish == 1) {
            $image->publish = 0;
        } else {
            $image->publish = 1;
        }
        $image->save();
        echo "Updated!";
    }

    public function delSome(Request $request)
    {
        $id = $request->id;
        foreach ($id as $value) {
            $item = SliderImage::findOrFail($value);
            $item->delete();
        }
        echo "Deleted!";
    }
}
