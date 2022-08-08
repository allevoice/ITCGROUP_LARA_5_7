<?php

namespace App\Http\Controllers;

use App\Serviceoffert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ServiceoffertController extends Controller
{
    public function messageerreur(){

        //Les messages
        $message_fr = [
            'blueicone.required'=> 'Vous devez mettre une image pour le background',
            'blueicone.max'    => 'The :attribute ne doit pas depasser cette valeur  :max Bite. ',
            'blueicone.mimes' => 'Le type format de l\'image n\'est pas prise en charge',

            'whiteicone.required'=> 'Vous devez mettre une image comme logo',
            'whiteicone.max'    => 'The :attribute ne doit pas depasser cette valeur  :max Bite. ',
            'whiteicone.mimes' => 'Le type format de l\'image n\'est pas prise en charge',

            //POur tous les autres images pour la galleries
            'img1.required'=> 'Vous devez mettre une image pour le background',
            'img1.max'    => 'The :attribute ne doit pas depasser cette valeur  :max Bite. ',
            'img1.mimes' => 'Le type format de l\'image n\'est pas prise en charge',


            'title.required'=> 'Le champ titre ne doit pas etre vide',
            'title.max'=> 'Le champ titre ne doit pas depasser les :max caractères',
            'title.min'=> 'Le champ titre ne doit pas inferieur les :min caractères',

            'titleinfo.required'=> 'Le champ titre info ne doit pas etre vide',
            'titleinfo.max'=> 'Le champ titre info  ne doit pas depasser les :max caractères',
            'titleinfo.min'=> 'Le champ titre info  ne doit pas inferieur les :min caractères',
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
            $data = DB::table('serviceofferts')->Where('deleted_at',NULL)->orderBy('updated_at', 'desc')->paginate(10);
            //dd($data);
            return view('admin/services/liste',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/services/new');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $codeservice= rand(100,9999).date("m").rand(5,15).date("d");
        $title = $request->title;
        $titleinfo = $request->titleinfo;
        $description = $request->description;
        $status = '0';
        $langues = '1';
        $level = $request->level;
        $iduser = '1';

        //verification et envoie des message
        $request->validate([
            'title'=>'required|min:5|max:250',
            'titleinfo'=>'required|min:5|max:250'
        ],$this->messageerreur());

        //dd('nos code affichage',$codeservice,$title,$titleinfo,$description);
        //insertion de nouvelle de donnee
        $data= new Serviceoffert();
        $data->codeservice = $codeservice;
        $data->title = $title;
        $data->titleinfo = $titleinfo;
        $data->description = $description;

        $data->status = $status;
        $data->langues = $langues;
        $data->level = $level;
        $data->iduser = $iduser;
        $data->save();
        //redirection vers la page liste
        return redirect()->route('editserve',$data->id);



    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Serviceoffert  $serviceoffert
     * @return \Illuminate\Http\Response
     */
    public function show(Serviceoffert $serviceoffert)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Request $request
     * @param  \App\Serviceoffert $serviceoffert
     * @return void
     */
    public function edit(Request $request, Serviceoffert $serviceoffert)
    {
        $id = $request->servicesadmin;
        $show = Serviceoffert::where('id',$id)->first();
        //dd($service);
        if($show !=NULL){
            return view('admin/services/edit',compact('show'));
        }else{
            //abort('404');
            return redirect()->route('listserve');
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Serviceoffert  $serviceoffert
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Serviceoffert $serviceoffert)
    {

        //les variables pour la mise a jours
        $id = $request->id;
        $title = $request->title;
        $titleinfo = $request->titleinfo;
        $description = $request->description;
        $status = $request->status;
        $level = $request->level;

        //dd($request->all());
        $data= Serviceoffert::where('id', $id);//fixer l'id pour la mise a jour
        $nbr = time().'-'.date("Y").date("m").date("d"); //recupere l'annee le mois le jour

        if($request->indice == 1){

            $request->validate([
                'title'=>'required|min:5|max:250',
                'titleinfo'=>'required|min:5|max:500'
            ],$this->messageerreur());

            $data->update([
                'title' => $title,
                'titleinfo' => $titleinfo,
                'description' => $description,
                'status' => $status,
                'level' => $level
            ]);
            return redirect(route('editserve',$id));
        }
        elseif ($request->indice == 2){
            //id / nom images
            $request->validate([
                'blueicone'=>'required|mimes:PNG,JPG,JPEG,png,jpg,jpeg|max:1024'
            ],$this->messageerreur());

            $exte_file = $request->file(['blueicone'])->extension();
            $newNameImage_file = $nbr.'-blueicone';

            $filename_file = md5_file($request->file('blueicone')->getRealPath()).$newNameImage_file.'.'.$exte_file;

            $data->update([
                'blueicone'=>$filename_file,
            ]);

            if($data==true) {
                //sauvegarde du fichier dans un repertoire
                $request->file('blueicone')->storeAs('public/assets/img/services/', $filename_file, 'public_perso');
            }
            return redirect(route('editserve',$id));

        }
        elseif ($request->indice == 3){
            //id / nom images
            $request->validate([
                'whiteicone'=>'required|mimes:PNG,JPG,JPEG,png,jpg,jpeg|max:1024'
            ],$this->messageerreur());

            $exte_file = $request->file(['whiteicone'])->extension();
            $newNameImage_file = $nbr.'-whiteicone';

            $filename_file = md5_file($request->file('whiteicone')->getRealPath()).$newNameImage_file.'.'.$exte_file;

            $data->update([
                'whiteicone'=>$filename_file,
            ]);

            if($data==true) {
                //sauvegarde du fichier dans un repertoire
                $request->file('whiteicone')->storeAs('public/assets/img/services/', $filename_file, 'public_perso');
            }
            return redirect(route('editserve',$id));

        }
        elseif ($request->indice == 4){
            //id / nom images
            $request->validate([
                'img1'=>'required|mimes:PNG,JPG,JPEG,png,jpg,jpeg|max:1024'
            ],$this->messageerreur());

            $exte_file = $request->file(['img1'])->extension();
            $newNameImage_file = $nbr.'-img1';

            $filename_file = md5_file($request->file('img1')->getRealPath()).$newNameImage_file.'.'.$exte_file;

            $data->update([
                'img1'=>$filename_file,
            ]);

            if($data==true) {
                //sauvegarde du fichier dans un repertoire
                $request->file('img1')->storeAs('public/assets/img/services/', $filename_file, 'public_perso');
            }
            return redirect(route('editserve',$id));

        }
        else{
            return redirect()->route('listserve');
        }





    }

    public function updimages(Request $request){
        //dd($request->slug);
        //diviser les elements  slug on a 2 elements {id / nom images}
        $sub = explode('-',$request->slug);
        $id = $sub['0'];
        $nameimg = $sub['1'];
        if($nameimg == 2 || $nameimg==3 || $nameimg==4) {
            $show = Serviceoffert::where('id',$id)->first();
            return view('admin/services/editimg',compact('show','nameimg'));
        }else{
            return redirect()->route('listserve');
        }





    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @param  \App\Serviceoffert $serviceoffert
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Serviceoffert $serviceoffert)
    {
        Serviceoffert::destroy($request->id);
        return redirect()->route('listserve');
    }


    //recuperon et supression total les elementys
    public function sofderestore()
    {
        //afficher les elements suprimers
        $data = Serviceoffert::onlyTrashed()->paginate(5);
        //dd($data);
        return view('admin/services/del', compact('data'));
    }

    //restauration des element suprimer par son ID
    public function restoredestroy(Request $request)
    {
        //dd($request->id);
        Serviceoffert::onlyTrashed()
            ->where('id', $request->id)
            ->restore();
        return redirect()->route('listserve');
    }


    //supression definitivement de la table
    public function destoredefinitely(Request $request)
    {
        //dd($request->id);
        Serviceoffert::onlyTrashed()
            ->where('id', $request->id)
            ->forceDelete();
        return redirect()->route('listserve');
    }




}
