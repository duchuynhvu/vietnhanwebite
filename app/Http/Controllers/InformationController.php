<?php

namespace App\Http\Controllers;

use App\Information;
use App\SMTP;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class InformationController extends Controller
{
    /**
     * Show the form for editing the specified resource.
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $info = Information::first();
        return view('admin.pages.information.edit', compact('info'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $info = Information::first();
        $this->validate($request, [
            'hotline' => 'required',
            'email' => 'required|email',
            'facebook' => 'max:255',
            'twitter' => 'max:255',
            'youtube' => 'max:255',
            'address' => 'required|max:255',
            'phone' => 'max:255',
            'address-en' => 'max:255'
        ]);
        $data = $request->all();
        $info->update([
            'hotline' => $data['hotline'],
            'email' => $data['email'],
            'facebook' => $data['facebook'],
            'twitter' => $data['twitter'],
            'youtube' => $data['youtube'],
            'address' => $data['address'],
            'phone' => $data['phone'],
            'address_en' => $data['address-en']
        ]);
        Session::flash('message', 'Information successfully updated!');

        return redirect()->back();
    }

    public function smtp()
    {
        $smtp = SMTP::first();
        return view('admin.pages.information.smtp', compact('smtp'));
    }

    public function smtpUpdate(Request $request)
    {
        $this->validate($request, [
            'host' => 'required',
            'port' => 'required|numeric',
            'encryption' => 'required',
            'username' => 'required',
            'password' => 'required'
        ]);
        $smtp = SMTP::first();
        $data = $request->all();
        $smtp->update([
            'host' => $data['host'],
            'port' => $data['port'],
            'encryption' => $data['encryption'],
            'username' => $data['username'],
            'password' => $data['password']
        ]);
        Session::flash('message', 'SMTP Setting successfully updated!');
        return redirect()->back();
    }
}
