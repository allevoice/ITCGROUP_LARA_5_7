<?php

namespace App\Http\Controllers;

use App\Homeslider;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class HomesliderController extends Controller
{

    public function messageerreur(){

        //Les messages
        $message_fr = [
            //Pour tous les autres images pour les galleries
            'backimgview.required'=> 'Vous devez mettre une image pour le background',
            'backimgview.max'    => 'L\'image d\'arriere plan ne doit pas depasser cette valeur  :max Bite. ',
            'backimgview.mimes' => 'Le type format de l\'image n\'est pas prise en charge',

            //POur tous les logos images pour la galleries
            'logoview.required'=> 'Vous devez mettre une image pour le Logo',
            'logoview.max'    => 'Le Logo ne doit pas depasser cette valeur  :max Bite. ',
            'logoview.mimes' => 'Le type format de l\'image n\'est pas prise en charge',


            'title.required'=> 'Le champ titre ne doit pas etre vide',
            'title.max'=> 'Le champ titre ne doit pas depasser les :max caractères',
            'title.min'=> 'Le champ titre ne doit pas inferieur les :min caractères',


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
        $data = DB::table('homesliders')->Where('deleted_at',NULL)->orderBy('updated_at', 'desc')->orderby('level', 'ASC')->paginate(5);
        //dd($partner);
        return view('admin/homesliders/liste',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/homesliders/new');
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
        $level = '20';
        $iduser= '1';


        //verification et envoie des message
        $request->validate([
            'title'=>'required|min:5|max:250',
            'link'=>'url',
        ],$this->messageerreur());

        //-----------dd('Votre insertion');

        $data= new Homeslider();
        $data->title = $title;
        $data->link = $link;
        $data->description = $description;

        $data->status = $status;
        $data->langues = $langues;
        $data->level = $level;
        $data->iduser = $iduser;
        $data->save();
        //redirection vers la page liste
        return redirect()->route('editslide',$data->id);






    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Homeslider  $homeslider
     * @return \Illuminate\Http\Response
     */
    public function show(Homeslider $homeslider)
    {
        return redirect()->route('listslide');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Request $request
     * @param  \App\Homeslider $homeslider
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Homeslider $homeslider)
    {
       $id=$request->slideadmin;

        $show = Homeslider::where('id',$id)->first();
        //dd($show);
        if($show !=NULL){
            return view('admin/homesliders/edit',compact('show'));
        }else{
            //abort('404');
            return redirect()->route('listslide');
        }
    }

    public function updimages(Request $request){
        //dd($request->slug);
        //diviser les elements  slug on a 2 elements {id / nom images}
		

        $sub = explode("-", $request->slug);
		
        $id = $sub['0'];
        $nameimg = $sub['1'];
        if($nameimg == 2 || $nameimg==3 || $nameimg==4) {
            $show = Homeslider::where('id',$id)->first();
            return view('admin/homesliders/editimg',compact('show','nameimg'));
        }else{
            return redirect()->route('listslide');
        }





    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Homeslider  $homeslider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Homeslider $homeslider)
    {

        $id = $request->id;
        $title = $request->title;
        $link = $request->link;
        $description = $request->description;
        $status = $request->status;
        $level = $request->level;
        $indice = $request->indice;
        $nbr = time().'-'.date("Y").date("m").date("d"); //recupere l'annee le mois le jour


        //dd($request->all());
        $data= Homeslider::where('id', $id);//fixer l'id pour la mise a jour


        //Mise a jour que des parties texte
        if($indice == 1){

            //avant de faire cette modification on doit verifier 2 chose
            //1- Est ce qu'on modifier le FIRST en DEFAULT si oui on change on restrint/ou annuler cette modification
            //2- Est-ce qu'on modifier un DEFAULT en FIRST si oui on change l'ancien FIRST en DEFAULT
            $info = Homeslider::where('level', '1')->find($id);


            //Modification des elements de FIRST
            if(isset($info->level)){
                if($level != $info->level || $status != $info->status){
                    return redirect()->route('editslide',$id)->with('sms_error', 'Vous ne pouvez pas modifier Le Champ Level et le champ status...pour ce faire il suffit de modifier un DEFAULT en FIRST et le Systeme va le rendre Automatiquement en mode DEFAULT...MERCI!');
                }
                else{
                    //MOdification des element dans FIRST
                    $request->validate([
                        'title'=>'required|min:5|max:250',
                        'link'=>'url',
                    ],$this->messageerreur());

                    $data->update([
                        'title' => $title,
                        'link' => $link,
                        'description' => $description
                    ]);
                    return redirect(route('editslide',$id));
                }
            }
            //modifcation des element de DEFULT
            else{

                //On doit trouver le FIRST existant pour le passer en DEFAULT et appliquer cette modifcation demander
                if($level == 1){
                    //on rechercher l'ancien first pour le passer en default et en suite en ajoute la modification a la base

                    //on recherche l'id de l'ancien first
                    $oldfirst = Homeslider::Where('level','1')->first();

                    //dans le cas ou il n y pas d'ancien
                    if($oldfirst == NULL){
                        $request->validate([
                            'title'=>'required|min:5|max:250',
                            'link'=>'url',
                        ],$this->messageerreur());

                        $data->update([
                            'title' => $title,
                            'link' => $link,
                            'status' => '1',
                            'level' => '1',
                            'description' => $description
                        ]);
                        return redirect(route('editslide',$id));
                    }else{
                        //ON peut allors changer l'ancient level
                        $micro = Homeslider::where('id', $oldfirst->id)->update(['level' => '20']);
                        if($micro == true){
                            $request->validate([
                                'title'=>'required|min:5|max:250',
                                'link'=>'url',
                            ],$this->messageerreur());

                            $data->update([
                                'title' => $title,
                                'link' => $link,
                                'status' => '1',
                                'level' => '1',
                                'description' => $description
                            ]);
                            return redirect(route('editslide',$id));
                        }
                    }





                }
                else{
                    //on fait que lancer la modification demander
                    $request->validate([
                        'title'=>'required|min:5|max:250',
                        'link'=>'url',
                    ],$this->messageerreur());

                    $data->update([
                        'title' => $title,
                        'link' => $link,
                        'status' => $status,
                        'description' => $description
                    ]);
                    return redirect(route('editslide',$id));
                }
            }
        }
        //On modifie l'image ou l'indice est == 2 logoview
        elseif ($indice=='2'){
                //id / nom images
            $request->validate([
                'logoview'=>'required|mimes:PNG,JPG,JPEG,png,jpg,jpeg|max:1024'
            ],$this->messageerreur());

            $exte_file = $request->file(['logoview'])->extension();
            $newNameImage_file = $nbr.'-logoview';

            $filename_file = md5_file($request->file('logoview')->getRealPath()).$newNameImage_file.'.'.$exte_file;

            $data->update([
                'logoview'=>$filename_file,
            ]);

            if($data==true) {
                //sauvegarde du fichier dans un repertoire
                $request->file('logoview')->storeAs('public/assets/img/slideshow/', $filename_file, 'public_perso');
            }
            return redirect(route('editslide',$id));

        }
        //On modifie l'image ou l'indice est == 3 backimgview
        elseif ($indice=='3'){
            //id / nom images
            $request->validate([
                'backimgview'=>'required|mimes:PNG,JPG,JPEG,png,jpg,jpeg|max:1024'
            ],$this->messageerreur());

            $exte_file = $request->file(['backimgview'])->extension();
            $newNameImage_file = $nbr.'-backimgview';

            $filename_file = md5_file($request->file('backimgview')->getRealPath()).$newNameImage_file.'.'.$exte_file;

            $data->update([
                'backimgview'=>$filename_file,
            ]);

            if($data==true) {
                //sauvegarde du fichier dans un repertoire
                $request->file('backimgview')->storeAs('public/assets/img/slideshow/', $filename_file, 'public_perso');
            }
            return redirect(route('editslide',$id));
        }







    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @param  \App\Homeslider $homeslider
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Homeslider $homeslider)
    {
        //avant de suprimer il faut verifier si ce dernier n'est pas de level=1
        $id = $request->id;
        $img = Homeslider::where('level', '1')->where('id', $id)->get();
        if(count($img) == NULL){
            Homeslider::destroy($id);
            return redirect()->route('listslide');
        }else{
            return redirect()->route('listslide')->with('sms_error', 'Ne peut etre supprimer vue qu\'elle est l\'image central pour ce faire il faut remplacer son Level FIRST par DEFAULT!');
        }

    }



    //recuperon et supression total les elementys
    public function sofderestore()
    {
        //afficher les elements suprimers
        $data = Homeslider::onlyTrashed()->paginate(5);
        //dd($data);
        return view('admin/homesliders/del', compact('data'));
    }

    //restauration des element suprimer par son ID
    public function restoredestroy(Request $request)
    {
        //dd($request->id);
        Homeslider::onlyTrashed()
            ->where('id', $request->id)
            ->restore();
        return redirect()->route('listslide');
    }


    //supression definitivement de la table
    public function destoredefinitely(Request $request)
    {
        //dd($request->id);
        Homeslider::onlyTrashed()
            ->where('id', $request->id)
            ->forceDelete();
        return redirect()->route('listslide');
    }




}
