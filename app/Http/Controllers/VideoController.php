<?php

namespace App\Http\Controllers;

use App\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $videos = Video::paginate(10);
        return view('admin.pages.video.index', compact('videos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.video.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        if ($data['page'] != "") {
            $this->validate($request, [
                'page' => 'unique:videos',
                'youtube' => 'required'
            ]);
        } else {
            $this->validate($request, [
                'youtube' => 'required'
            ]);
        }

        Video::create([
            'video' => $data['youtube'],
            'page' => $data['page']
        ]);
        Session::flash('message', 'Video successfully added!');
        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public
    function edit($id)
    {
        $video = Video::findOrFail($id);
        return view('admin.pages.video.edit', compact('video'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public
    function update(Request $request, $id)
    {
        $data = $request->all();
        $video = Video::findOrFail($id);
        if ($data['page'] != "" && $data['page'] != $video->page) {
            $this->validate($request, [
                'page' => 'unique:videos',
                'youtube' => 'required'
            ]);
        } else {
            $this->validate($request, [
                'youtube' => 'required'
            ]);
        }
        $video->update([
            'video' => $data['youtube'],
            'page' => $data['page']
        ]);
        Session::flash('message', 'Video successfully updated!');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public
    function destroy($id)
    {
        $video = Video::findOrFail($id);
        $video->delete();

        Session::flash('message', 'Video successfully deleted!');

        return redirect()->route('videos.index');
    }

    public function delSome(Request $request)
    {
        $id = $request->id;
        foreach ($id as $value) {
            $item = Video::findOrFail($value);
            $item->delete();
        }
        echo "Deleted!";
    }
}
