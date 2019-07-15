<?php

namespace App\Http\Controllers;

use App\Package;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $packages = Package::orderBy('from', 'ASC')->paginate(10);
        return view('admin.pages.product.package.index', compact('packages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.product.package.create');
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
            'from' => 'required|numeric|min:1',
            'to' => 'required|numeric|min:0',
            'price' => 'required'
        ]);
        $data = $request->all();
        Package::create([
            'from' => $data['from'],
            'to' => $data['to'],
            'price' => $data['price']
        ]);
        Session::flash('message', 'Package successfully added!');
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
        $package = Package::findOrFail($id);
        return view('admin.pages.product.package.edit', compact('package'));
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
            'from' => 'required|numeric|min:1',
            'to' => 'required|numeric|min:0',
            'price' => 'required'
        ]);
        $data = $request->all();
        $package = Package::findOrFail($id);
        $package->update([
            'from' => $data['from'],
            'to' => $data['to'],
            'price' => $data['price']
        ]);
        Session::flash('message', 'Package successfully updated!');
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
        $package = Package::findOrFail($id);
        $package->delete();
        Session::flash('message', 'Package successfully deleted!');
        return redirect()->route('packages.index');
    }

    public function delSome(Request $request)
    {
        $id = $request->id;
        foreach ($id as $value) {
            $item = Package::findOrFail($value);
            $item->delete();
        }
        echo "Deleted!";
    }
}
