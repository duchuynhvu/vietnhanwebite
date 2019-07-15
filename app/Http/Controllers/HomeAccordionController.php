<?php

namespace App\Http\Controllers;

use App\HomeAccordion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class HomeAccordionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $accordions = HomeAccordion::paginate(10);
        return view('admin.pages.HomeAccordion.index', compact('accordions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.HomeAccordion.create');
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
            'title' => 'required|max:255',
            'description' => 'required',
            'title-en' => 'max:255'
        ]);

        $data = $request->all();
        HomeAccordion::create([
            'title' => $data['title'],
            'description' => $data['description'],
            'title_en' => $data['title-en'],
            'description_en' => $data['description-en']
        ]);

        Session::flash('message', 'Home Accordion successfully added!');

        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\HomeAccordion $homeAccordion
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(HomeAccordion $homeAccordion, $id)
    {
        $homeAccordion = $homeAccordion->findOrFail($id);
        return view('admin.pages.HomeAccordion.edit', compact('homeAccordion'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\HomeAccordion $homeAccordion
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HomeAccordion $homeAccordion, $id)
    {
        $homeAccordion = $homeAccordion->findOrFail($id);
        $this->validate($request, [
            'title' => 'required|max:255',
            'description' => 'required',
            'title-en' => 'max:255'
        ]);
        $data = $request->all();
        $homeAccordion->update([
            'title' => $data['title'],
            'description' => $data['description'],
            'title_en' => $data['title-en'],
            'description_en' => $data['description-en']
        ]);

        Session::flash('message', 'Home Accordion successfully updated!');

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\HomeAccordion $homeAccordion
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(HomeAccordion $homeAccordion, $id)
    {
        $homeAccordion = $homeAccordion->findOrFail($id);
        $homeAccordion->delete();
        Session::flash('message', 'Home Accordion successfully deleted!');
        return redirect()->route('home-accordions.index');
    }

    public function delSome(Request $request)
    {
        $id = $request->id;
        foreach ($id as $value) {
            $item = HomeAccordion::findOrFail($value);
            $item->delete();
        }
        echo "Deleted!";
    }
}
