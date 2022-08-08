<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProjectController extends Controller
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

            'description.required'=> 'Le champ Poste ne doit pas etre vide',
            'description.max'=> 'Le champ Poste ne doit pas depasser les :max caractères',
            'description.min'=> 'Le champ Poste ne doit pas inferieur les :min caractères',


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
        $data = DB::table('projects')->Where('deleted_at',NULL)->orderBy('updated_at', 'desc')->get();
        //dd($data);
        return view('admin/projects/liste',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/projects/new');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd('insert',$request->all());
        $title = $request->title;
        $link = $request->link;
        $level = $request->level;
        $description = $request->description;
        $status = '0';
        $langues = '1';
        $iduser = '1';

        //verification et envoie des message
        $request->validate([
            'title'=>'required|min:5|max:250',
            'description'=>'required',
            'link'=>'required|url',
            'level'=>'required',
        ],$this->messageerreur());

        //insertion de nouvelle de donnee
        $data= new Project();
        $data->title = $title;
        $data->link = $link;
        $data->level = $level;
        $data->description = $description;
        $data->status = $status;
        $data->langues = $langues;
        $data->iduser = $iduser;
        $data->save();
        //redirection vers la page liste
        return redirect()->route('editprojectdata',$data->id);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Request $request
     * @param  \App\Project $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Project $project)
    {
        //$data=$project;
        //dd($request->all());
        $id= $request->projectdatum;
        $data=Project::Where('id',$id)->first();
        //dd($service);
        if($data !=NULL){
            return view('admin/projects/edit',compact('data'));
        }else{
            //abort('404');
            return redirect()->route('listprojectdata');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {

        //dd($request->all(),$project->id);
        //dd('mon code');





        $id = $request->id;
        $title = $request->title;
        $link = $request->link;
        $description = $request->description;
        $status = $request->status;
        $level = $request->level;
        $iduser = $request->iduser;


        $message_fr= $this->messageerreur();



        $helpupdatedata = Project::where('id', $id);//fixer l'id pour la mise a jour
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
                $request->file('backimg')->storeAs('public/assets/img/projects/', $filename_file, 'public_perso');
            }
            return redirect(route('editprojectdata',$id));




        }
        //Mise a jour des texte ssi indice ==3
        elseif ($request->indice==3){

            $request->validate([
                'title'=>'required|min:5|max:250',
                'description'=>'required',
                'link'=>'required|url',
                'level'=>'required',
            ],$message_fr);

            $helpupdatedata->update([
                'title' => $title,
                'level' => $level,
                'description' => $description,
                'link' => $link,
                'status' => $status

            ]);
            return redirect(route('editprojectdata',$id));

        }else{
            return redirect(route('listprojectdata'));
            echo 'On ne fait rien';
        }



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @param  \App\Project $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Project $project)
    {
        //dd('del',$request->id,$project->id);
        Project::destroy($request->id);
        return redirect()->route('listprojectdata');
    }



    //recuperon et supression total les elementys
    public function sofderestore()
    {
        //afficher les elements suprimers
        $data = Project::onlyTrashed()->get();;
        return view('admin/projects/del', compact('data'));
    }

    //restauration des element suprimer par son ID
    public function restoredestroy(Request $request)
    {
        //dd($request->id);
        Project::onlyTrashed()
            ->where('id', $request->id)
            ->restore();
        return redirect()->route('listprojectdata');
    }


    //supression definitivement de la table
    public function destoredefinitely(Request $request)
    {
        //dd($request->id);
        Project::onlyTrashed()
            ->where('id', $request->id)
            ->forceDelete();
        return redirect()->route('listprojectdata');
    }





    public function newdata(){
        //dd('new data');
        $user = '1';
        $today = now();

        $data = Project::insert([

            [
                'title'=>'Anual Company Growth',
                'backimg' =>'default/project-banner.jpg',
                'description'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                                    tempor incididunt ut labore et dolore magna aliqua. Ut enim aquis nostrud
                                                    exercitatio ullamco laboris nisi ut aliquip ex ea commodo consequat.',

                'link'=>NULL,
                'level' => '1',
                'status' => '1',
                'langues' => '1',
                'iduser' => $user,
                'created_at'=>$today,
            ],
            [
                'title'=>'Estelle Solution',
                'backimg' =>'default/project-banner.jpg',
                'description'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                                    tempor incididunt ut labore et dolore magna aliqua. Ut enim aquis nostrud
                                                    exercitatio ullamco laboris nisi ut aliquip ex ea commodo consequat.',

                'link'=>NULL,
                'level' => '2',
                'status' => '1',
                'langues' => '1',
                'iduser' => $user,
                'created_at'=>$today,
            ],
            [
                'title'=>'Insurance',
                'backimg' =>'default/project-banner.jpg',
                'description'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                                    tempor incididunt ut labore et dolore magna aliqua. Ut enim aquis nostrud
                                                    exercitatio ullamco laboris nisi ut aliquip ex ea commodo consequat.',

                'link'=>NULL,
                'level' => '3',
                'status' => '1',
                'langues' => '1',
                'iduser' => $user,
                'created_at'=>$today,
            ],
            [
                'title'=>'Estelle Solution',
                'backimg' =>'default/project-banner.jpg',
                'description'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                                    tempor incididunt ut labore et dolore magna aliqua. Ut enim aquis nostrud
                                                    exercitatio ullamco laboris nisi ut aliquip ex ea commodo consequat.',

                'link'=>NULL,
                'level' => '4',
                'status' => '1',
                'langues' => '1',
                'iduser' => $user,
                'created_at'=>$today,
            ]
        ]);

        if($data == true){
            return redirect()->route('listprojectdata');
        }else{
            return 'erreur';
        }

    }













}
