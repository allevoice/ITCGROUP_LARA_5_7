<?php

namespace App\Http\Controllers;

use App\Advisor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdvisorController extends Controller
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

            'post.required'=> 'Le champ Poste ne doit pas etre vide',
            'post.max'=> 'Le champ Poste ne doit pas depasser les :max caractères',
            'post.min'=> 'Le champ Poste ne doit pas inferieur les :min caractères',


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
        $data = DB::table('advisors')->Where('deleted_at',NULL)->orderBy('updated_at', 'desc')->get();
        //dd($data);
        return view('admin/advisor/liste',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/advisor/new');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd('insert');
        $title = $request->title;
        $post = $request->post;
        $spost= $request->spost;
        $facelink = $request->facelink;
        $facest = $request->facest;
        $inlink = $request->inlink;
        $inst = $request->inst;
        $goopluslink = $request->goopluslink;
        $gooplusst = $request->gooplusst;
        $tweetlink = $request->tweetlink;
        $tweetst = $request->tweetst;

        $status = '0';
        $langues = '1';
        $iduser = '1';

        //verification et envoie des message
        $request->validate([
            'title'=>'required|min:5|max:250',
            'post'=>'required|min:5|max:250'
        ],$this->messageerreur());

        //insertion de nouvelle de donnee
        $data= new Advisor();
        $data->title = $title ;
        $data->post = $post;
        $data->spost= $spost;
        $data->facelink = $facelink;
        $data->facest = $facest;
        $data->inlink = $inlink;
        $data->inst = $inst;
        $data->goopluslink = $goopluslink;
        $data->gooplusst = $gooplusst;
        $data->tweetlink = $tweetlink;
        $data->tweetst = $tweetst;
        $data->status = $status;
        $data->langues = $langues;
        $data->iduser = $iduser;
        $data->save();
        //redirection vers la page liste
        return redirect()->route('editadvisor',$data->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Advisor  $advisor
     * @return \Illuminate\Http\Response
     */
    public function show(Advisor $advisor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Advisor  $advisor
     * @return \Illuminate\Http\Response
     */
    public function edit(Advisor $advisor)
    {
        $data=$advisor;
        return view('admin/advisor/edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Advisor  $advisor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Advisor $advisor)
    {
        //dd('update',$request->all());

        //imgprofile,
        //title,post,spost,facelink,facest,inlink,inst,goopluslink,gooplusst,tweetlink,tweetst

        $id = $advisor->id;

        $title = $request->title;
        $post = $request->post;
        $spost= $request->spost;
        $facelink = $request->facelink;
        $facest = $request->facest;
        $inlink = $request->inlink;
        $inst = $request->inst;
        $goopluslink = $request->goopluslink;
        $gooplusst = $request->gooplusst;
        $tweetlink = $request->tweetlink;
        $tweetst = $request->tweetst;


        $status = $request->status;
        $iduser = $request->iduser;
        //dd($id , $title , $post , $spost, $facelink , $facest , $inlink , $inst , $goopluslink , $gooplusst , $tweetlink , $tweetst ,  $status);

        $message_fr= $this->messageerreur();



        $helpupdatedata = Advisor::where('id', $id);//fixer l'id pour la mise a jour
        $nbr = time().'-'.date("Y").date("m").date("d"); //recupere l'annee le mois le jour
        //dd($request->indice);
        //Mise a jour du logo ssi indice ==2
        if ($request->indice==2){
            //on verifie que si c'est un images
            $request->validate([
                'imgprofile'=>'required|mimes:PNG,JPG,JPEG,png,jpg,jpeg|max:1024'
            ],$message_fr);

            $exte_file = $request->file(['imgprofile'])->extension();
            $newNameImage_file = $nbr.'-imgprofile';

            $filename_file = md5_file($request->file('imgprofile')->getRealPath()).$newNameImage_file.'.'.$exte_file;

            $data = $helpupdatedata->update([
                'imgprofile'=>$filename_file,
            ]);

            if($data==true) {
                //sauvegarde du fichier dans un repertoire
                $request->file('imgprofile')->storeAs('public/assets/img/about/', $filename_file, 'public_perso');
            }
            return redirect(route('editadvisor',$id));




        }

        //Mise a jour des texte ssi indice ==3
        elseif ($request->indice==3){

            $request->validate([
                'title'=>'required|min:5|max:250',
                'post'=>'required|min:5|max:250'
            ],$message_fr);

            $helpupdatedata->update([
                'title' => $title,
                'post' => $post,
                'spost' => $spost,

                'facelink' => $facelink,
                'facest' => $facest,

                'inlink' => $inlink,
                'inst' => $inst,

                'goopluslink' => $goopluslink,
                'gooplusst' => $gooplusst,

                'tweetlink' => $tweetlink,
                'tweetst' => $tweetst,

                'status' => $status

            ]);
            return redirect(route('editadvisor',$id));

        }else{
            return redirect(route('listadvisor'));
            echo 'On ne fait rien';
        }



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Advisor  $advisor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Advisor $advisor)
    {
        Advisor::destroy($advisor->id);
        return redirect()->route('listadvisor');
    }



    //recuperon et supression total les elementys
    public function sofderestore()
    {
        //afficher les elements suprimers
        $data = Advisor::onlyTrashed()->get();;
        return view('admin/advisor/del', compact('data'));
    }

    //restauration des element suprimer par son ID
    public function restoredestroy(Request $request)
    {
        //dd($request->id);
        Advisor::onlyTrashed()
            ->where('id', $request->id)
            ->restore();
        return redirect()->route('listadvisor');
    }


    //supression definitivement de la table
    public function destoredefinitely(Request $request)
    {
        //dd($request->id);
        Advisor::onlyTrashed()
            ->where('id', $request->id)
            ->forceDelete();
        return redirect()->route('listadvisor');
    }








    public function newdata(){
        //dd('new data');
        $user = '1';
        $today = now();

        $data = Advisor::insert([

            [
                'imgprofile' => 'default/advisor-img1.png',
                'title' =>'Jean Samuel Jules',
                'post' =>'Chief Advisor',
                'spost'=>'CEO',

                'facelink' =>'https://web.facebook.com/jsjulessam/',
                'facest' =>'1',

                'inlink' =>'',
                'inst' =>'0',

                'goopluslink' =>'',
                'gooplusst' =>'0',

                'tweetlink' =>'https://twitter.com/jsjulessam',
                'tweetst' =>'1',

                'status' => '1',
                'langues' => '1',
                'iduser' => $user,
                'created_at'=>$today,
            ],
            [
                'imgprofile' => 'default/itAdv.jpg',
                'title' =>'Ing. Davillière Davidson Daguillard',
                'post' =>'IT Assistant',
                'spost'=>'',

                'facelink' =>'',
                'facest' =>'0',

                'inlink' =>'',
                'inst' =>'0',

                'goopluslink' =>'',
                'gooplusst' =>'0',

                'tweetlink' =>'',
                'tweetst' =>'0',

                'status' => '1',
                'langues' => '1',
                'iduser' => $user,
                'created_at'=>$today,
            ],
            [
                'imgprofile' => 'default/rjweb2.jpg',
                'title' =>'Joseph Rodney',
                'post' =>'Web developer',
                'spost'=>'',

                'facelink' =>'',
                'facest' =>'0',

                'inlink' =>'',
                'inst' =>'0',

                'goopluslink' =>'',
                'gooplusst' =>'0',

                'tweetlink' =>'',
                'tweetst' =>'0',

                'status' => '1',
                'langues' => '1',
                'iduser' => $user,
                'created_at'=>$today,
            ]
        ]);

        if($data == true){
            return redirect()->route('listadvisor');
        }else{
            return 'erreur';
        }

    }







}
