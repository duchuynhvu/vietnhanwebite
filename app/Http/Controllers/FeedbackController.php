<?php

namespace App\Http\Controllers;

use App\Feedback;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;

class FeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $feeds = Feedback::paginate(10);
        return view('admin.pages.feedback.index', compact('feeds'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.feedback.create');
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
            'content' => 'required|min:10',
            'name-en' => 'max:255',
            'image' => 'required|image|max:2000'
        ]);

        $data = $request->all();
        if (Input::file('image')->isValid()) {
            $path = 'uploads/feedbacks';
            $filename = Input::file('image')->getClientOriginalName();
            Input::file('image')->move($path, $filename);
            Feedback::create([
                'name' => $data['name'],
                'content' => $data['content'],
                'image' => $filename,
                'name_en' => $data['name-en'],
                'content_en' => $data['content-en']
            ]);

            Session::flash('message', 'Feedback successfully added!');
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
        $feed = Feedback::findOrFail($id);
        return view('admin.pages.feedback.edit', compact('feed'));
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
            'content' => 'required|min:10',
            'name-en' => 'max:255',
            'image' => 'image|max:2000'
        ]);
        $feed = Feedback::findOrFail($id);
        $data = $request->all();
        if (Input::hasFile('image')) {
            $path = 'uploads/feedbacks';
            $filename = Input::file('image')->getClientOriginalName();
            Input::file('image')->move($path, $filename);
            $feed->update([
                'name' => $data['name'],
                'content' => $data['content'],
                'image' => $filename,
                'name_en' => $data['name-en'],
                'content_en' => $data['content-en']
            ]);
        } else {
            $feed->update([
                'name' => $data['name'],
                'content' => $data['content'],
                'name_en' => $data['name-en'],
                'content_en' => $data['content-en']
            ]);
        }

        Session::flash('message', 'Feedback successfully updated!');

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Feedback $feedback
     * @return \Illuminate\Http\Response
     */
    public function destroy(Feedback $feedback)
    {
        $feedback->delete();

        Session::flash('message', 'Feddback successfully deleted!');

        return redirect()->route('feedbacks.index');
    }

    public function delSome(Request $request)
    {
        $id = $request->id;
        foreach ($id as $value) {
            $item = Feedback::findOrFail($value);
            $item->delete();
        }
        echo "Deleted!";
    }
}
