<?php

namespace App\Http\Controllers;

use App\Ourcompagnie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OurcompagnieController extends Controller
{


    public function messageerreur(){

        $message_fr = [
            'backimg.required'=> 'Vous devez mettre une image pour le background',
            'backimg.max'    => 'The :attribute ne doit pas depasser cette valeur  :max Bite. ',
            'backimg.mimes' => 'Le type format de l\'image n\'est pas prise en charge',

            'myTextEditor.required'=> 'Le champ Description ne doit pas etre vide',

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
        $data = DB::table('ourcompagnies')->Where('deleted_at',NULL)->orderBy('updated_at', 'desc')->get();
        //dd($data);
        return view('admin/ourcompagnie/liste',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/ourcompagnie/new');
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
        $data= new Ourcompagnie();
        $data->link = $link;
        $data->description = $description;
        $data->status = $status;
        $data->langues = $langues;
        $data->iduser = $iduser;
        $data->save();
        //redirection vers la page liste
        return redirect()->route('editourcmg',$data->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Ourcompagnie  $ourcompagnie
     * @return \Illuminate\Http\Response
     */
    public function show(Ourcompagnie $ourcompagnie)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ourcompagnie  $ourcompagnie
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,Ourcompagnie $ourcompagnie)
    {
        $data=$ourcompagnie;
        return view('admin/ourcompagnie/edit',compact('data'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ourcompagnie  $ourcompagnie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ourcompagnie $ourcompagnie)
    {
        $id = $ourcompagnie->id;
        $link = $request->link;
        $description = $request->myTextEditor;
        $status = $request->status;
        $iduser = $request->iduser;


        $message_fr= $this->messageerreur();



        $helpupdatedata = Ourcompagnie::where('id', $id);//fixer l'id pour la mise a jour
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
                $request->file('backimg')->storeAs('public/assets/img/about/', $filename_file, 'public_perso');
            }
            return redirect(route('editourcmg',$id));


        }
        //Mise a jour des texte ssi indice ==3
        elseif ($request->indice==3){

            $request->validate([
                'link'=>'url',
                'myTextEditor'=>'required'
            ],$message_fr);

            $helpupdatedata->update([
                'description' => $description,
                'link' => $link,
                'status' => $status
            ]);
            return redirect(route('editourcmg',$id));

        }else{
            return redirect(route('listourcmg'));
            //echo 'On ne fait rien';
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ourcompagnie  $ourcompagnie
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ourcompagnie $ourcompagnie)
    {
        Ourcompagnie::destroy($ourcompagnie->id);
        return redirect()->route('listourcmg');
    }



    //recuperon et supression total les elementys
    public function sofderestore()
    {
        //afficher les elements suprimers
        //dd('delete liste');
        $data = Ourcompagnie::onlyTrashed()->get();;
        return view('admin/ourcompagnie/del', compact('data'));
    }

    //restauration des element suprimer par son ID
    public function restoredestroy(Request $request)
    {
        //dd($request->id);
        Ourcompagnie::onlyTrashed()
            ->where('id', $request->id)
            ->restore();
        return redirect()->route('listourcmg');
    }


    //supression definitivement de la table
    public function destoredefinitely(Request $request)
    {
        //dd($request->id);
        Ourcompagnie::onlyTrashed()
            ->where('id', $request->id)
            ->forceDelete();
        return redirect()->route('listourcmg');
    }


    public function newdata(){
        //dd('new data');
        $user = '1';
        $today = now();

        $data = Ourcompagnie::insert([

            [
                'backimg' => 'default/company-graph.png',
                'description' => '
                 <h2 id="presoh2">our company</h2>
                        <p>ITC Group is an IT consulting firm founded in 2008. Since then, its client list has expanded to include a large number of private companies, as well as NGOs and public organizations. We have created a highly effective center of skills and expertise covering various domains in the technology world. Our staff members have the capabilities and resources to deal with very specific issues and highly specialized cases.</p>
                        <p class="monpa">Our mission is to empower our customers so they can realize their IT projects. A multidisciplinary team of consultants enables clients to benefit from a holistic approach to IT project management. From strategy to operational application and follow-ups, our clients experience a really close relationship and personalized support to ensure the success of their companies and their IT projects.</p>
                        <ul class="persoimage">
                            <li> Computer network implementation and maintenance;</li>
                            <li> Security and surveillance Systems for offices and vehicles;</li>
                            <li> Translation and video conference systems;</li>
                            <li> Satellite television systems setup;</li>
                            <li> Solar Energy system implementation;</li>
                            <li> Database setup and management;</li>
                            <li> Websites and software programing;</li>
                            <li> Seminars on integrated management software packages;</li>
                            <li> Translation & Interpration Services;</li>
                            <li> Technical support services; And many others…</li>
                        </ul>
                ',
                'link' => '',
                'status' => '0',
                'langues' => '1',
                'iduser' => $user,
                'created_at'=>$today,
            ],

            [
                'backimg' => 'default/company-graph.png',
                'description' => 'We have the service you need, with international quality.',
                'link' => '',
                'status' => '0',
                'langues' => '1',
                'iduser' => $user,
                'created_at'=>$today,
            ]
        ]);

        if($data == true){
            return redirect()->route('listourcmg');
        }else{
            return 'erreur';
        }

    }







}
