<?php

namespace App\Http\Controllers;

use App\slidelogin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SlideloginController extends Controller
{

    public function messageerreur(){

        //Les messages
        $message_fr = [
            'backimgview.required'=> 'Vous devez mettre une image pour le background',
            'backimgview.max'    => 'The :attribute ne doit pas depasser cette valeur  :max Bite. ',
            'backimgview.mimes' => 'Le type format de l\'image n\'est pas prise en charge',
        ];
        return  $message_fr;


    }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('slidelogins')->Where('deleted_at',NULL)->orderBy('updated_at', 'desc')->get();
        //dd($data);
        return view('admin/slidelogin/liste',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $user = '1';
        $data= new slidelogin();
        $data->backimgview = 'default/login-banner.jpg';
        $data->level = '0';
        $data->status = '0';
        $data->langues = '1';
        $data->iduser = $user;
        $data->save();
        return redirect(route('editsldlogin',$data->id));



    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\slidelogin  $slidelogin
     * @return \Illuminate\Http\Response
     */
    public function show(slidelogin $slidelogin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Request $request
     * @param  \App\slidelogin $slidelogin
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, slidelogin $slidelogin)
    {
        $id= $request->slidelogindatum;
        $data=slidelogin::Where('id',$id)->first();
        //dd($data);
        if($data !=NULL){
            return view('admin/slidelogin/edit',compact('data'));
        }else{
            //abort('404');
            return redirect()->route('listsldlogin');
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\slidelogin  $slidelogin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, slidelogin $slidelogin)
    {
        //dd('mon code');
        $id = $request->id;
        $level = $request->level;
        $status = $request->status;
        $iduser = $request->iduser;


        //dd($request->all());
        $message_fr= $this->messageerreur();



        $helpupdatedata = slidelogin::where('id', $id);//fixer l'id pour la mise a jour
        $nbr = time().'-'.date("Y").date("m").date("d"); //recupere l'annee le mois le jour
        //dd($request->indice);
        //Mise a jour du logo ssi indice ==2
        if ($request->indice==2){
            //on verifie que si c'est un images
            $request->validate([
                'backimgview'=>'required|mimes:PNG,JPG,JPEG,png,jpg,jpeg|max:1024'
            ],$message_fr);

            $exte_file = $request->file(['backimgview'])->extension();
            $newNameImage_file = $nbr.'-backimgview';

            $filename_file = md5_file($request->file('backimgview')->getRealPath()).$newNameImage_file.'.'.$exte_file;

            $data = $helpupdatedata->update([
                'backimgview'=>$filename_file,
            ]);

            if($data==true) {
                //sauvegarde du fichier dans un repertoire
                $request->file('backimgview')->storeAs('public/assets/img/login/', $filename_file, 'public_perso');
            }
            return redirect(route('editsldlogin',$id));

        }
        //Mise a jour des texte ssi indice ==3
        elseif ($request->indice==3){

            $helpupdatedata->update([
                'level' => $level,
                'status' => $status
            ]);
            return redirect(route('editsldlogin',$id));

        }else{
            return redirect(route('listsldlogin'));
            echo 'On ne fait rien';
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @param  \App\slidelogin $slidelogin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,slidelogin $slidelogin)
    {
        //dd($request->id);
        slidelogin::destroy($request->id);
        return redirect()->route('listsldlogin');
    }

    //recuperon et supression total les elementys
    public function sofderestore()
    {
        //afficher les elements suprimers
        $data = slidelogin::onlyTrashed()->get();;
        return view('admin/slidelogin/del', compact('data'));
    }

    //restauration des element suprimer par son ID
    public function restoredestroy(Request $request)
    {
        //dd($request->id);
        slidelogin::onlyTrashed()
            ->where('id', $request->id)
            ->restore();
        return redirect()->route('listsldlogin');
    }


    //supression definitivement de la table
    public function destoredefinitely(Request $request)
    {
        //dd($request->id);
        slidelogin::onlyTrashed()
            ->where('id', $request->id)
            ->forceDelete();
        return redirect()->route('listsldlogin');
    }


















    public function newdata(){
        //dd('new data');
        $user = '1';
        $today = now();

        $data = slidelogin::insert([

            [
                'backimgview' =>'default/log_1.jpg',
                'level' => '1',
                'status' => '1',
                'langues' => '1',
                'iduser' => $user,
                'created_at'=>$today,
            ],

            [
                'backimgview' =>'default/log_2.jpg',
                'level' => '0',
                'status' => '1',
                'langues' => '1',
                'iduser' => $user,
                'created_at'=>$today,
            ],

            [
                'backimgview' =>'default/log_3.jpg',
                'level' => '0',
                'status' => '1',
                'langues' => '1',
                'iduser' => $user,
                'created_at'=>$today,
            ]


        ]);

        if($data == true){
            return redirect()->route('listsldlogin');
        }else{
            return 'erreur';
        }

    }














}
