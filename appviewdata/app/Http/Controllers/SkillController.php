<?php

namespace App\Http\Controllers;

use App\Skill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SkillController extends Controller
{
    public function messageerreur(){

        //Les messages
        $message_fr = [

            'numberskill.numeric' => 'Ce champ doit etre une nombre ou chiffre',

            'title.required'=> 'Le champ titre ne doit pas etre vide',
            'title.max'=> 'Le champ titre ne doit pas depasser les :max caractères',
            'title.min'=> 'Le champ titre ne doit pas inferieur les :min caractères',

            'linkskill.required'=> 'Le champ Url ne doit pas etre vide',
            'linkskill.url'=> 'Ce n\'est pas un adresse et doit ecrire de cette facon "http://www.mondomaine.com"',
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
        $data = DB::table('skills')->Where('deleted_at',NULL)->orderBy('updated_at', 'desc')->paginate(5);
        //dd($partner);
        return view('admin/skill/liste',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/skill/new');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->messageerreur();

        $title= $request->title;
        $number = $request->numberskill;
        $link = $request->linkskill;
        $status = '0';
        $langues = '1';
        $level = $request->level;
        $iduser = '1';

        //verification et envoie des message
        $request->validate([
            'title'=>'required|min:5|max:250',
            'numberskill'=>'numeric',
            'linkskill'=>'required|url'
        ],$this->messageerreur());

        //insertion de nouvelle de donnee
        $data= new skill();
        $data->title = $title;
        $data->numberskill = $number;
        $data->linkskill = $link;
        $data->status = $status;
        $data->langues = $langues;
        $data->level = $level;
        $data->iduser = $iduser;
        $data->save();
        //redirection vers la page liste
        return redirect()->route('listskill');







    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Skill  $skill
     * @return \Illuminate\Http\Response
     */
    public function show(Skill $skill)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Skill  $skill
     * @return \Illuminate\Http\Response
     */
    public function edit(Skill $skill)
    {
        $data=$skill;
        return view('admin/skill/edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Skill  $skill
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Skill $skill)
    {


        $id = $skill->id;

        $title= $request->title;
        $number = $request->numberskill;
        $link = $request->linkskill;
        $status = $request->status;
        $level = $request->level;

        //dd($id);


        //verification et envoie des message
        $request->validate([
            'title'=>'required|min:5|max:250',
            'numberskill'=>'numeric',
            'linkskill'=>'required|url'
        ],$this->messageerreur());

        $data= Skill::where('id', $id);//fixer l'id pour la mise a jour

        $data->update([
                'title' => $title,
                'numberskill' => $number,
                'linkskill' => $link,
                'status' => $status,
                'level' => $level
            ]);
            return redirect(route('editskill',$id));




    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Skill  $skill
     * @return \Illuminate\Http\Response
     */
    public function destroy(Skill $skill)
    {
        Skill::destroy($skill->id);
        return redirect()->route('listskill');
    }


    //recuperon et supression total les elementys
    public function sofderestore()
    {
        //afficher les elements suprimers
        $data = Skill::onlyTrashed()->paginate(5);;
        return view('admin/skill/del', compact('data'));
    }

    //restauration des element suprimer par son ID
    public function restoredestroy(Request $request)
    {
        //dd($request->id);
        Skill::onlyTrashed()
            ->where('id', $request->id)
            ->restore();
        return redirect()->route('listskill');
    }


    //supression definitivement de la table
    public function destoredefinitely(Request $request)
    {
        //dd($request->id);
        Skill::onlyTrashed()
            ->where('id', $request->id)
            ->forceDelete();
        return redirect()->route('listskill');
    }











}
