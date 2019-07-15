<?php

namespace App\Http\Controllers;

use App\Benefit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;

class BenefitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $benefits = Benefit::paginate(10);
        return view('admin.pages.benefit.index', compact('benefits'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.benefit.create');
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
            'content' => 'required|min:10',
            'title-en' => 'max:255',
            'icon' => 'required|image|max:2000'
        ]);
        $data = $request->all();
        if (Input::file('icon')->isValid()) {
            $path = 'uploads/benefits';
            $filename = Input::file('icon')->getClientOriginalName();
            Input::file('icon')->move($path, $filename);
            Benefit::create([
                'title' => $data['title'],
                'content' => $data['content'],
                'icon' => $filename,
                'title_en' => $data['title-en'],
                'content_en' => $data['content-en'],
                'description' => $data['description'],
                'description_en' => $data['description-en']
            ]);
            Session::flash('message', 'Benefit successfully added!');
        } else {
            Session::flash('error', 'Upload file is not valid!');
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
        $benefit = Benefit::findOrFail($id);
        return view('admin.pages.benefit.edit', compact('benefit'));
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
            'content' => 'required|min:10',
            'title-en' => 'max:255',
            'icon' => 'image|max:2000'
        ]);
        $data = $request->all();
        $benefit = Benefit::findOrFail($id);
        if (Input::hasFile('icon')) {
            $path = 'uploads/benefits';
            $filename = Input::file('icon')->getClientOriginalName();
            Input::file('icon')->move($path, $filename);
            $benefit->update([
                'title' => $data['title'],
                'content' => $data['content'],
                'icon' => $filename,
                'title_en' => $data['title-en'],
                'content_en' => $data['content-en'],
                'description' => $data['description'],
                'description_en' => $data['description-en']
            ]);
        } else {
            $benefit->update([
                'title' => $data['title'],
                'content' => $data['content'],
                'title_en' => $data['title-en'],
                'content_en' => $data['content-en'],
                'description' => $data['description'],
                'description_en' => $data['description-en']
            ]);
        }

        Session::flash('message', 'Benefit successfully updated!');

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
        $benefit = Benefit::findOrFail($id);
        $benefit->delete();
        Session::flash('message', 'Benefit successfully deleted!');
        return redirect()->route('benefits.index');
    }

    public function delSome(Request $request)
    {
        $id = $request->id;
        foreach ($id as $value) {
            $item = Benefit::findOrFail($value);
            $item->delete();
        }
        echo "Deleted!";
    }

    public function featureSwitch(Request $request)
    {
        $id = $request->id;
        $benefit = Benefit::findOrFail($id);
        if ($benefit->feature == 1) {
            $benefit->feature = 0;
        } else {
            $benefit->feature = 1;
        }
        $benefit->save();
        $count = Benefit::where('feature', 1)->count();
        if ($count <= 3) {
            $respone = [
                'status' => 'OK',
                'message' => 'Updated!'
            ];
        } else {
            $respone = [
                'status' => 'FAIL',
                'message' => 'Feature Benefit Maximum: 3'
            ];
            $benefit->feature = 0;
            $benefit->save();
        }
        echo json_encode($respone);
    }
}
