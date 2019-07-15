<?php

namespace App\Http\Controllers;

use App\ContactRequest;
use App\News;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts = ContactRequest::where('status', 1)->count();
        $news= News::orderBy('created_at', 'DESC')->take(2)->get();
        return view('admin.pages.index', compact('contacts', 'news'));
    }

    public function setLocale($local)
    {
        Session::put('locale', $local);
        return redirect()->back();
    }
}
