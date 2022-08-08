<?php

namespace App\Http\Controllers;

use App\Messaging;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MessagingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('messagings')->orderBy('updated_at', 'desc')->where('deleted_at',NULL)->paginate(5);
        //dd($partner);
        return view('admin/messaging/liste',compact('data'));
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request->id;
        Messaging::destroy($id);
        return redirect()->route('smsliste');
    }



    //recuperon et supression total les elementys
    public function sofderestore()
    {
        //afficher les elements suprimers
        //dd('delete liste');
        $data = DB::table('messagings')->orderBy('updated_at', 'desc')->where('deleted_at','!=',NULL)->paginate(5);
        return view('admin/messaging/del', compact('data'));
    }

    //restauration des element suprimer par son ID
    public function restoredestroy(Request $request)
    {
        //dd($request->id);
        Messaging::onlyTrashed()
            ->where('id', $request->id)
            ->restore();
        return redirect()->route('smsliste');
    }


    //supression definitivement de la table
    public function destoredefinitely(Request $request)
    {
        //dd($request->id);
        Messaging::onlyTrashed()
            ->where('id', $request->id)
            ->forceDelete();
        return redirect()->route('smsliste');
    }




}
