<?php

namespace App\Http\Controllers;

use App\Bringing;
use Illuminate\Http\Request;

class BringingController extends Controller
{

    public function messageerreur(){

        //Les messages
        $message_fr = [
            'backimg.required'=> 'Vous devez mettre une image pour le background',
            'backimg.max'    => 'The :attribute ne doit pas depasser cette valeur  :max Bite. ',
            'backimg.mimes' => 'Le type format de l\'image n\'est pas prise en charge',

            'myTextEditor.required'=> 'Le champ Description ne doit pas etre vide',

            'link.required'=> 'Le champ Url ne doit pas etre vide',
            'link.url'=> 'Ce n\'est pas un adresse et doit ecrire de cette facon "http://www.mondomaine.com"',
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
        $data = Bringing::orderBy('updated_at', 'desc')->get();
        //dd($data);
        return view('admin/bringing/liste',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/bringing/new');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $link = $request->link;
        $description = $request->myTextEditor;
        $status = '0';
        $langues = '1';
        $iduser = '1';

        //verification et envoie des message
        $request->validate([
            'link'=>'required|url',
            'myTextEditor'=>'required',
        ],$this->messageerreur());

        //insertion de nouvelle de donnee
        $data= new Bringing();
        $data->link = $link;
        $data->description = $description;
        $data->status = $status;
        $data->langues = $langues;
        $data->iduser = $iduser;
        $data->save();
        //redirection vers la page liste
        return redirect()->route('editbringing',$data->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Bringing  $bringing
     * @return \Illuminate\Http\Response
     */
    public function show(Bringing $bringing)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Bringing  $bringing
     * @return \Illuminate\Http\Response
     */
    public function edit(Bringing $bringing)
    {
        $data=$bringing;
        return view('admin/bringing/edit',compact('data'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Bringing  $bringing
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bringing $bringing)
    {

        //dd($request->all());
        //dd('mon code');
        $id = $bringing->id;
        $link = $request->link;
        $description = $request->myTextEditor;
        $status = $request->status;
        $iduser = $request->iduser;


        $message_fr= $this->messageerreur();



        $helpupdatedata = Bringing::where('id', $id);//fixer l'id pour la mise a jour
        $nbr = time().'-'.date("Y").date("m").date("d"); //recupere l'annee le mois le jour
        //dd($request->indice);
        //Mise a jour du logo ssi indice ==2
        if ($request->indice==2){
            //on verifie que si c'est un images
            $request->validate([
                'backimg'=>'required|mimes:PNG,JPG,JPEG,png,jpg,jpeg|max:1024'
            ],$message_fr);

            $exte_file = $request->file(['backimg'])->extension();
            $newNameImage_file = $nbr.'-backimg';

            $filename_file = md5_file($request->file('backimg')->getRealPath()).$newNameImage_file.'.'.$exte_file;

            $data = $helpupdatedata->update([
                'backimg'=>$filename_file,
            ]);

            if($data==true) {
                //sauvegarde du fichier dans un repertoire
                $request->file('backimg')->storeAs('public/assets/img/logo/', $filename_file, 'public_perso');
            }
            return redirect(route('editbringing',$id));




        }
        //Mise a jour des texte ssi indice ==3
        elseif ($request->indice==3){

            $request->validate([
                'link'=>'required|url',
                'myTextEditor'=>'required'
            ],$message_fr);

            $helpupdatedata->update([
                'description' => $description,
                'link' => $link,
                'status' => $status
            ]);
            return redirect(route('editbringing',$id));

        }else{
            return redirect(route('listbringing'));
            echo 'On ne fait rien';
        }



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Bringing  $bringing
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bringing $bringing)
    {
        Bringing::destroy($bringing->id);
        return redirect()->route('listbringing');
    }


    //recuperon et supression total les elementys
    public function sofderestore()
    {
        //afficher les elements suprimers
        $data = Bringing::onlyTrashed()->get();;
        return view('admin/bringing/del', compact('data'));
    }

    //restauration des element suprimer par son ID
    public function restoredestroy(Request $request)
    {
        //dd($request->id);
        Bringing::onlyTrashed()
            ->where('id', $request->id)
            ->restore();
        return redirect()->route('listbringing');
    }


    //supression definitivement de la table
    public function destoredefinitely(Request $request)
    {
        //dd($request->id);
        Bringing::onlyTrashed()
            ->where('id', $request->id)
            ->forceDelete();
        return redirect()->route('listbringing');
    }
















}
