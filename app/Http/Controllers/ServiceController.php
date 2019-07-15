<?php

namespace App\Http\Controllers;

use App\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Service::paginate(10);
        return view('admin.pages.product.service.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.product.service.create');
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
            'title-en' => 'max:255'
        ]);
        $data = $request->all();
        Service::create([
            'title' => $data['title'],
            'description' => $data['description'],
            'title_en' => $data['title-en'],
            'description_en' => $data['description-en']
        ]);
        Session::flash('message', 'Service successfully added!');
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
        $service = Service::findorFail($id);
        return view('admin.pages.product.service.edit', compact('service'));
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
            'title-en' => 'max:255'
        ]);
        $service =  Service::findOrFail($id);
        $data = $request->all();
        $service->update([
            'title' => $data['title'],
            'description' => $data['description'],
            'title_en' => $data['title-en'],
            'description_en' => $data['description-en']
        ]);
        Session::flash('message', 'Service successfully updated!');
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
        $service = Service::findOrFail($id);
        $service->delete();
        Session::flash('message', 'Service successfully deleted!');
        return redirect()->route('services.index');
    }

    public function delSome(Request $request)
    {
        $id = $request->id;
        foreach ($id as $value) {
            $item = Service::findOrFail($value);
            $item->delete();
        }
        echo "Deleted!";
    }
}
