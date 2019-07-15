<?php

namespace App\Http\Controllers;

use App\ClientLink;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;

class ClientLinkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $links = ClientLink::paginate(10);
        return view('admin.pages.ClientLink.index', compact('links'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.ClientLink.create');
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
            'link' => 'required|min:1|max:255',
            'logo' => 'required|image|max:2000'
        ]);

        $data = $request->all();
        if (Input::file('logo')->isValid()) {
            $path = 'uploads/links';
            $filename = Input::file('logo')->getClientOriginalName();
            Input::file('logo')->move($path, $filename);
            ClientLink::create([
                'name' => $data['name'],
                'link' => $data['link'],
                'logo' => $filename
            ]);
            Session::flash('message', 'Link successfully added!');
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
        $link = ClientLink::findOrFail($id);
        return view('admin.pages.ClientLink.edit', compact('link'));
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
            'link' => 'required|min:1|max:255',
            'logo' => 'image|max:2000'
        ]);

        $data = $request->all();
        $link = ClientLink::findOrFail($id);
        if (Input::hasFile('logo')) {
            $path = 'uploads/links';
            $filename = Input::file('logo')->getClientOriginalName();
            Input::file('logo')->move($path, $filename);
            $link->update([
                'name' => $data['name'],
                'link' => $data['link'],
                'logo' => $filename
            ]);
        } else {
            $link->update([
                'name' => $data['name'],
                'link' => $data['link']
            ]);
        }

        Session::flash('message', 'Link successfully updated!');

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
        $link = ClientLink::findOrFail($id);
        $link->delete();
        Session::flash('message', 'Link successfullt deleted!');
        return redirect()->route('links.index');
    }

    public function delSome(Request $request)
    {
        $id = $request->id;
        foreach ($id as $value) {
            $item = ClientLink::findOrFail($value);
            $item->delete();
        }
        echo "Deleted!";
    }

}
