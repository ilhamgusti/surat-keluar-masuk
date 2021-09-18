<?php

namespace App\Http\Controllers;


class RedirectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $role = \Auth::user()->role;
        return redirect()->route('surat.index',['status'=>$role]);
    }

    public function logout()
    {
        \Auth::logout(); 
        return redirect()->route('login');
    }
}
