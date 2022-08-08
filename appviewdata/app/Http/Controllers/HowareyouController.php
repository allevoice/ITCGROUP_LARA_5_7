<?php

namespace App\Http\Controllers;

use App\Howareyou;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HowareyouController extends Controller
{

    public function messageerreur(){

        //Les messages
        $message_fr = [
            'backimg.required'=> 'Vous devez mettre une image pour le background',
            'backimg.max'    => 'The :attribute ne doit pas depasser cette valeur  :max Bite. ',
            'backimg.mimes' => 'Le type format de l\'image n\'est pas prise en charge',

            'title.required'=> 'Le champ titre ne doit pas etre vide',
            'title.max'=> 'Le champ titre ne doit pas depasser les :max caractères',
            'title.min'=> 'Le champ titre ne doit pas inferieur les :min caractères',

            'description.required'=> 'Le champ titre ne doit pas etre vide',

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
        $data = DB::table('howareyous')->Where('deleted_at',NULL)->orderBy('updated_at', 'desc')->get();
        //dd($data);
        return view('admin/howareyou/liste',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/howareyou/new');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $title = $request->title;
        $link = $request->link;
        $description = $request->description;
        $status = '0';
        $langues = '1';
        $iduser = '1';

        //verification et envoie des message
        $request->validate([
            'title'=>'required|min:5|max:250',
            'link'=>'required|url',
            'description'=>'required',
        ],$this->messageerreur());

        //insertion de nouvelle de donnee
        $data= new Howareyou();
        $data->title = $title;
        $data->link = $link;
        $data->description = $description;
        $data->status = $status;
        $data->langues = $langues;
        $data->iduser = $iduser;
        $data->save();
        //redirection vers la page liste
        return redirect()->route('edithowareyou',$data->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Howareyou  $howareyou
     * @return \Illuminate\Http\Response
     */
    public function show(Howareyou $howareyou)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Howareyou  $howareyou
     * @return \Illuminate\Http\Response
     */
    public function edit(Howareyou $howareyou)
    {
        $data=$howareyou;
        return view('admin/howareyou/edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Howareyou  $howareyou
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Howareyou $howareyou)
    {
        //dd('update');

        $id = $howareyou->id;
        $title = $request->title;
        $link = $request->link;
        $description = $request->description;
        $status = $request->status;
        $iduser = $request->iduser;


        $message_fr= $this->messageerreur();



        $helpupdatedata = Howareyou::where('id', $id);//fixer l'id pour la mise a jour
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
                $request->file('backimg')->storeAs('public/assets/img/whoareuimg/', $filename_file, 'public_perso');
            }
            return redirect(route('edithowareyou',$id));




        }
        //Mise a jour des texte ssi indice ==3
        elseif ($request->indice==3){

            $request->validate([
                'title'=>'required|min:5|max:250',
                'link'=>'required|url',
                'description'=>'required'
            ],$message_fr);

            $helpupdatedata->update([
                'title' => $title,
                'description' => $description,
                'link' => $link,
                'status' => $status
            ]);
            return redirect(route('edithowareyou',$id));

        }else{
            return redirect(route('listhowareyou'));
            echo 'On ne fait rien';
        }





    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Howareyou  $howareyou
     * @return \Illuminate\Http\Response
     */
    public function destroy(Howareyou $howareyou)
    {
        Howareyou::destroy($howareyou->id);
        return redirect()->route('listhowareyou');
    }


    //recuperon et supression total les elementys
    public function sofderestore()
    {
        //afficher les elements suprimers
        $data = Howareyou::onlyTrashed()->get();;
        return view('admin/howareyou/del', compact('data'));
    }

    //restauration des element suprimer par son ID
    public function restoredestroy(Request $request)
    {
        //dd($request->id);
        Howareyou::onlyTrashed()
            ->where('id', $request->id)
            ->restore();
        return redirect()->route('listhowareyou');
    }


    //supression definitivement de la table
    public function destoredefinitely(Request $request)
    {
        //dd($request->id);
        Howareyou::onlyTrashed()
            ->where('id', $request->id)
            ->forceDelete();
        return redirect()->route('listhowareyou');
    }






}
