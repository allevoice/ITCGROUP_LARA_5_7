<?php

namespace App\Http\Controllers;



use Illuminate\Support\Facades\DB;

class DashpageController extends Controller
{


    public function index()
    {
        $sms = DB::table('messagings')->where('deleted_at',NULL)->get();
        $newsletter = DB::table('newsletters')->get();
        $account = DB::table('accounts')->where('deleted_at',NULL)->get();



        return view('admin.adminp',compact(['sms','newsletter','account']));
    }



}
