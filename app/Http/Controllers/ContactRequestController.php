<?php

namespace App\Http\Controllers;

use App\ContactRequest;
use Illuminate\Http\Request;

class ContactRequestController extends Controller
{
    public function index()
    {
        return view('admin.pages.ContactRequest.index');
    }
    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $contact = ContactRequest::findOrFail($id);
        $contact->update([
            'status' => 0
        ]);
        return view('admin.pages.ContactRequest.show', compact('contact'));
    }

    public function delSome(Request $request)
    {
        $id = $request->id;
        foreach ($id as $value) {
            $item = ContactRequest::findOrFail($value);
            $item->delete();
        }
        echo "Deleted!";
    }

    public function jsGrid(Request $request)
    {
        $data = $request->all();
        if ($data['status'] != "") {
            if ($data['name'] == "" && $data['email'] == "") {
                $contacts = ContactRequest::where('status', $data['status'])->orderBy('created_at', 'DESC')->get();
            } elseif ($data['name'] != "" && $data['email'] == "") {
                $contacts = ContactRequest::where('status', $data['status'])
                    ->where('name', 'LIKE', '%' . $data['name'] . '%')
                    ->orderBy('created_at', 'DESC')->get();
            } elseif ($data['name'] == "" && $data['email'] != "") {
                $contacts = ContactRequest::where('status', $data['status'])
                    ->where('email', 'LIKE', '%' . $data['email'] . '%')
                    ->orderBy('created_at', 'DESC')->get();
            } else {
                $contacts = ContactRequest::where('status', $data['status'])
                    ->where('name', 'LIKE', '%' . $data['name'] . '%')
                    ->where('email', 'LIKE', '%' . $data['email'] . '%')
                    ->orderBy('created_at', 'DESC')->get();
            }
        } else {
            if ($data['name'] == "" && $data['email'] == "") {
                $contacts = ContactRequest::orderBy('created_at', 'DESC')->get();
            } elseif ($data['name'] != "" && $data['email'] == "") {
                $contacts = ContactRequest::where('name', 'LIKE', '%' . $data['name'] . '%')
                    ->orderBy('created_at', 'DESC')->get();
            } elseif ($data['name'] == "" && $data['email'] != "") {
                $contacts = ContactRequest::where('email', 'LIKE', '%' . $data['email'] . '%')
                    ->orderBy('created_at', 'DESC')->get();
            } else {
                $contacts = ContactRequest::where('name', 'LIKE', '%' . $data['name'] . '%')
                    ->where('email', 'LIKE', '%' . $data['email'] . '%')
                    ->orderBy('created_at', 'DESC')->get();
            }
        }
        return $contacts;
    }

}
