<?php

namespace App\Http\Controllers;

use App\Introduce;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;

class IntroduceController extends Controller
{
    public function introduce()
    {
        $intro = Introduce::first();
        return view('admin.pages.product.introduce', compact('intro'));
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'introduce' => 'required|min:10',
            'founder' => 'required|min:3|max:255',
            'stated' => 'required|min:10',
            'founder-en' => 'max:255'
        ]);
        $intro = Introduce::first();
        $data = $request->all();
        if (Input::hasFile('image')) {
            $path = 'uploads/introduce';
            $filename = Input::file('image')->getClientOriginalName();
            Input::file('image')->move($path, $filename);
            $intro->update([
                'introduce' => $data['introduce'],
                'founder' => $data['founder'],
                'stated' => $data['stated'],
                'image' => $filename,
                'founder_en' => $data['founder-en'],
                'introduce_en' => $data['introduce-en'],
                'stated_en' => $data['stated-en']
            ]);
        } else {
            $intro->update([
                'introduce' => $data['introduce'],
                'founder' => $data['founder'],
                'stated' => $data['stated'],
                'founder_en' => $data['founder-en'],
                'introduce_en' => $data['introduce-en'],
                'stated_en' => $data['stated-en']
            ]);
        }
        Session::flash('message', 'Introduce successfully updated!');
        return redirect()->back();
    }
}
