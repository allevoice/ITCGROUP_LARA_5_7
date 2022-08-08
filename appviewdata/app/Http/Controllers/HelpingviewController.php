<?php

namespace App\Http\Controllers;

use App\Helpingview;
use Illuminate\Http\Request;

class HelpingviewController extends Controller
{

    public function messageerreur(){

        //Les messages
        $message_fr = [
            'backimghelp.required'=> 'Vous devez mettre une image pour le background',
            'backimghelp.max'    => 'The :attribute ne doit pas depasser cette valeur  :max Bite. ',
            'backimghelp.mimes' => 'Le type format de l\'image n\'est pas prise en charge',

            'title.required'=> 'Le champ titre ne doit pas etre vide',
            'title.max'=> 'Le champ titre ne doit pas depasser les :max caractères',
            'title.min'=> 'Le champ titre ne doit pas inferieur les :min caractères',

            'description.required'=> 'Le champ titre ne doit pas etre vide',
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
        $data = Helpingview::orderBy('updated_at', 'desc')->paginate(5);
        //dd($partner);
        return view('admin/helpingview/liste',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/helpingview/new');
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
        $description = $request->description;
        $status = '0';
        $langues = '1';
        $level = $request->level;
        $iduser = '1';

        //verification et envoie des message
        $request->validate([
            'title'=>'required|min:5|max:250',
            'description'=>'required',
        ],$this->messageerreur());

        //insertion de nouvelle de donnee
        $data= new Helpingview();
        $data->title = $title;
        $data->description = $description;
        $data->status = $status;
        $data->langues = $langues;
        $data->level = $level;
        $data->iduser = $iduser;
        $data->save();
        //redirection vers la page liste
        return redirect()->route('edithelping',$data->id);


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Helpingview  $helpingview
     * @return \Illuminate\Http\Response
     */
    public function show(Helpingview $helpingview)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Helpingview  $helpingview
     * @return \Illuminate\Http\Response
     */
    public function edit(Helpingview $helpingview)
    {
        $data=$helpingview;
        return view('admin/helpingview/edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Helpingview  $helpingview
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Helpingview $helpingview)
    {
        //

        $id = $helpingview->id;
        $title = $request->title;
        $description = $request->description;
        $status = $request->status;
        $langues = $request->langues;
        $level = $request->level;
        $iduser = $request->iduser;


        $message_fr= $this->messageerreur();



        $helpingviewdata = Helpingview::where('id', $id);//fixer l'id pour la mise a jour
        $nbr = time().'-'.date("Y").date("m").date("d"); //recupere l'annee le mois le jour
        //dd($request->indice);
          //Mise a jour du logo ssi indice ==2
        if ($request->indice==2){
            //on verifie que si c'est un images
            $request->validate([
                'backimghelp'=>'required|mimes:PNG,JPG,JPEG,png,jpg,jpeg|max:1024'
            ],$message_fr);

            $exte_file = $request->file(['backimghelp'])->extension();
            $newNameImage_file = $nbr.'-logo';

            $filename_file = md5_file($request->file('backimghelp')->getRealPath()).$newNameImage_file.'.'.$exte_file;

            $data = $helpingviewdata->update([
                'backimghelp'=>$filename_file,
            ]);

            if($data==true) {
                //sauvegarde du fichier dans un repertoire
                $request->file('backimghelp')->storeAs('public/assets/img/logo/', $filename_file, 'public_perso');
            }
            return redirect(route('edithelping',$id));




        }
        //Mise a jour des texte ssi indice ==3
        elseif ($request->indice==3){

            $request->validate([
                'title'=>'required|min:5|max:250',
                'description'=>'required'
            ],$message_fr);

            $helpingviewdata->update([
                'title' => $title,
                'description' => $description,
                'status' => $status,
                'level' => $level
            ]);
            return redirect(route('edithelping',$id));

        }else{
            echo 'On ne fait rien';
        }






    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Helpingview  $helpingview
     * @return \Illuminate\Http\Response
     */
    public function destroy(Helpingview $helpingview)
    {
        Helpingview::destroy($helpingview->id);
        return redirect()->route('listedelhelping');
    }



    //recuperon et supression total les elementys
    public function sofderestore()
    {
        //afficher les elements suprimers
        $data = Helpingview::onlyTrashed()->paginate(5);;
        return view('admin/helpingview/del', compact('data'));
    }

    //restauration des element suprimer par son ID
    public function restoredestroy(Request $request)
    {
        //dd($request->id);
        Helpingview::onlyTrashed()
            ->where('id', $request->id)
            ->restore();
        return redirect()->route('listhelping');
    }


    //supression definitivement de la table
    public function destoredefinitely(Request $request)
    {
        //dd($request->id);
        Helpingview::onlyTrashed()
            ->where('id', $request->id)
            ->forceDelete();
        return redirect()->route('listhelping');
    }


}
