<?php

namespace App\Http\Controllers;

use App\Blogue;
use Illuminate\Http\Request;

class BlogueController extends Controller
{
    public function messageerreur(){

        //Les messages
        $message_fr = [
            'namepost.required'=> 'Le champ ne peut etre vide',

            'backimg.required'=> 'Vous devez mettre une image pour le background',
            'backimg.max'    => 'The :attribute ne doit pas depasser cette valeur  :max Bite. ',
            'backimg.mimes' => 'Le type format de l\'image n\'est pas prise en charge',

            'myTextEditor.required'=> 'Le champ Description ne doit pas etre vide',
            'myTextEditor.min'=> 'Le champ Description ne doit pas inferieur les :min caractères',
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
        $data = Blogue::orderBy('updated_at', 'desc')->get();
        //dd($data);
        return view('admin/blogues/liste',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/blogues/new');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd('soummission de nouvelle donne');
        $namepost = $request->namepost;
        $description = $request->myTextEditor;
        $status = '0';
        $langues = '1';
        $iduser = '1';

        //verification et envoie des message
        $request->validate([
            'myTextEditor'=>'required|min:100',
            'namepost'=>'required',
        ],$this->messageerreur());

        //insertion de nouvelle de donnee
        $data= new Blogue();
        $data->namepost = $namepost;
        $data->description = $description;
        $data->status = $status;
        $data->langues = $langues;
        $data->iduser = $iduser;
        $data->save();
        //redirection vers la page liste
        //dd($data->id);
        return redirect()->route('editblog',$data->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Blogue  $blogue
     * @return \Illuminate\Http\Response
     */
    public function show(Blogue $blogue)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Request $request
     * @param  \App\Blogue $blogue
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Blogue $blogue)
    {
        //dd('modification de nouvelle donne');
        $id = $request->bloguedatum;
        $data = Blogue::where('id',$id)->first();

        if($data !=NULL){
            return view('admin/blogues/edit',compact('data'));
        }else{
            //abort('404');
            return redirect()->route('listblog');
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Blogue  $blogue
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blogue $blogue)
    {
        //dd($request->all());
        //dd('mon code');
        $id = $request->id;
        $namepost = $request->namepost;
        $description = $request->myTextEditor;
        $face = $request->facelink;
        $face_status = $request->facest;
        $inlink = $request->inlink;
        $inst_status = $request->inst;
        $goopluslink = $request->goopluslink;
        $gooplusst_status = $request->gooplusst;
        $tweetlink = $request->tweetlink;
        $tweetst_status = $request->tweetst;
        $level = $request->level;
        $status = $request->status;
        $postdate = $request->postdate;

        $message_fr= $this->messageerreur();



        $helpupdatedata = Blogue::where('id', $id);//fixer l'id pour la mise a jour
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
                $request->file('backimg')->storeAs('public/assets/img/blog/', $filename_file, 'public_perso');
            }
            return redirect(route('editblog',$id));




        }
        //Mise a jour des texte ssi indice ==3
        elseif ($request->indice==3){

            $request->validate([
                'myTextEditor'=>'required|min:100'
            ],$message_fr);

            $helpupdatedata->update([
                'namepost' => $namepost,
                'description' => $description,
                'post_date'=> $postdate,
                'facelink'=>$face,
                'facest'=> $face_status,
                'inlink'=> $inlink ,
                'inst'=> $inst_status,
                'goopluslink'=> $goopluslink,
                'gooplusst'=> $gooplusst_status,
                'tweetlink'=> $tweetlink,
                'tweetst'=> $tweetst_status,
                'level' => $level,
                'status' => $status
            ]);
            return redirect(route('editblog',$id));

        }else{
            return redirect(route('listblog'));
            echo 'On ne fait rien';
        }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @param  \App\Blogue $blogue
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Blogue $blogue)
    {
        $id = $request->id;
        //dd($id);
        Blogue::destroy($id);
        return redirect()->route('listblog');
    }


    //recuperon et supression total les elementys
    public function sofderestore()
    {
        //afficher les elements suprimers
        $data = Blogue::onlyTrashed()->get();;
        return view('admin/blogues/del', compact('data'));
    }

    //restauration des element suprimer par son ID
    public function restoredestroy(Request $request)
    {
        //dd($request->id);
        Blogue::onlyTrashed()
            ->where('id', $request->id)
            ->restore();
        return redirect()->route('listblog');
    }


    //supression definitivement de la table
    public function destoredefinitely(Request $request)
    {
        //dd($request->id);
        Blogue::onlyTrashed()
            ->where('id', $request->id)
            ->forceDelete();
        return redirect()->route('listblog');
    }





    public function newdata(){
        //dd('new data');
        $user = '1';
        $today = now();

        $data = Blogue::insert([

            [
                'backimg' => 'default/post-img1.jpg',
                'namepost' => 'JEAN SAMUEL JULES',
                'description' => '
                 <h2 id="presoh2">Jean Samuel JULES’s Biography</h2>
                        <p>JEAN SAMUEL JULES, S.E. SYSTEM ENGINEER </p>
                        <h3 id="presoh3">CEO. CHIEF EXECUTIVE OFFICER.</h3>
                        <h3 id="presoh3">NTPSAMS-TECHNOLOGY & ITCGROUP Education:</h3>
                            <ul>
                                <li>4 Years of Studies in the field of Computer Sciences at University of INUQUA</li>
                                <li>1 Year of Master in the specialization of Network and Telecommunication the field of Computer Sciences at University of CREFIMA) (Licence in Computer Sciences / INUQUA / CREFIMA)</li>
                                <li>Has attended several seminaries on self performance for Certifications in specific fields such as:  Networking, Telecom, Entrepreneurship, Law of work, Project Management and Programming Systems at ESIH, AUF, INUQUA, UNIQ, PACT respectively.(Certificates/ESIH( Ecole Superieur en Informatique d’Haiti, INUQUA(Institut Universitaire Quisqueya D\'AMÉRIQUE), AUF(Agence Universitaire Francophone), UNIQ(Universite Quisqueya), CPLA(Cabinet Patrick Laurent) PACT(Progress & Accelerated Change Through Technology))</li>
                            </ul>
                        <h3 id="presoh3">Affiliations</h3>
                            <ul>
                                <li>Member of AHTIC (L’Association Haïtienne pour les Technologies de l’Information et de la Communication).</li>                               
                            </ul>
                                            
                       <h3 id="presoh3">Summary:</h3>
                            <ul>
                                <li>Has worked as an IT Consultant and Sales Engineering for the past 10 years always available and passionate in bringing the assistance needed to his Customers and Enterprises like; NGOs, UN locally and Internationally as well as the general population in these specific lists of services.</li>
                            </ul>
                            <p>For more information please follow these links: (http://www.ntpsams.com https://itcgrouphaiti.com/blog</p>
                                            
                         <h3 id="presoh3">Experience:</h3>
                            <ul>
                                <li>Pixel Haïti, IT Technicien, in the Cabling System for Both Building Hainet at Darguin Street, Petion-Ville.</li>
                                <li>Manutech INC, IT Consultant for the Local and International Company Managing the servers and taking care of the maintenance in the help desk department.</li>
                                <li>Digicel Haïti, CCTECH Agent in Help Desk Department.</li>
                                <li>Accesshaiti, IT Assistant IN NOC Department.</li>
                                <li>PLAZA HOTEL, IT Consultant, Translator, Driver and Logistic Supervisor in Chef for the Hotel and the CNN Staff Journalist. Since The earthquake.</li>
                                <li>ATALOU Micro System, Sales and System Engineer Manager and Marketing Agent. Etc…</li>
                                <li>NTPSAMS-TECHNOLOGY & ITCGROUP, CEO since 2011.</li>
                            </ul>
                ',

                'facelink'=>'https://web.facebook.com/jsjulessam/',
                'facest'=>'1',

                'tweetlink'=>'https://twitter.com/jsjulessam',
                'tweetst'=>'1',

                'status' => '0',
                'langues' => '1',
                'iduser' => $user,
                'post_date'=>'2020-08-12',
                'created_at'=>$today,
            ],
        ]);

        if($data == true){
            return redirect()->route('listblog');
        }else{
            return 'erreur';
        }

    }






}
