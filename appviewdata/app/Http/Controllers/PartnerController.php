<?php

namespace App\Http\Controllers;

use App\Partner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PartnerController extends Controller
{
    public function messageerreur(){

        //Les messages
        $message_fr = [
            'backimgpartner.required'=> 'Vous devez mettre une image pour le background',
            'backimgpartner.max'    => 'The :attribute ne doit pas depasser cette valeur  :max Bite. ',
            'backimgpartner.mimes' => 'Le type format de l\'image n\'est pas prise en charge',

            'imgpartner.required'=> 'Vous devez mettre une image comme logo',
            'imgpartner.max'    => 'The :attribute ne doit pas depasser cette valeur  :max Bite. ',
            'imgpartner.mimes' => 'Le type format de l\'image n\'est pas prise en charge',

            'titlepartner.required'=> 'Le champ titre ne doit pas etre vide',
            'titlepartner.max'=> 'Le champ titre ne doit pas depasser les :max caractères',
            'titlepartner.min'=> 'Le champ titre ne doit pas inferieur les :min caractères',

            'titleservices.required'=> 'Le champ titre ne doit pas etre vide',
            'titleservices.max'=> 'Le champ titre ne doit pas depasser les :max caractères',
            'titleservices.min'=> 'Le champ titre ne doit pas inferieur les :min caractères',

            'linkpartner.required'=> 'Le champ Url ne doit pas etre vide',
            'linkpartner.url'=> 'Ce n\'est pas un adresse et doit ecrire de cette facon "http://www.mondomaine.com"',
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
        $partner = DB::table('partners')->Where('deleted_at',NULL)->orderBy('updated_at', 'desc')->paginate(5);
        //dd($partner);
        return view('admin/partners/liste',compact('partner'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/partners/new');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        //dd('insertion');

        $this->messageerreur();

        $titlepartner = $request->titlepartner;
        $titleservices = $request->titleservices;
        $servicepartner = $request->servicepartner;
        $linkpartner = $request->linkpartner;
        $status = '0';
        $langues = '1';
        $level = $request->level;
        $iduser = '1';

        //verification et envoie des message
        $request->validate([
            'titlepartner'=>'required|min:5|max:250',
            'titleservices'=>'required|min:5|max:250',
            'linkpartner'=>'required|url'
        ],$this->messageerreur());

        //insertion de nouvelle de donnee
        $data= new Partner();
        $data->titlepartner = $titlepartner;
        $data->titleservices = $titleservices;
        $data->servicepartner = $servicepartner;
        $data->linkpartner = $linkpartner;
        $data->status = $status;
        $data->langues = $langues;
        $data->level = $level;
        $data->iduser = $iduser;
        $data->save();
        //redirection vers la page liste
        return redirect()->route('editpartner',$data->id);











    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function show(Partner $partner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function edit(Partner $partner)
    {
        $data=$partner;
        return view('admin/partners/edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Partner $partner)
    {
        $id = $partner->id;
        $titlepartner = $request->titlepartner;
        $titleservices = $request->titleservices;
        $servicepartner = $request->servicepartner;
        $linkpartner = $request->linkpartner;
        $status = $request->status;
        $langues = $request->langues;
        $level = $request->level;
        $iduser = $request->iduser;


        $message_fr= $this->messageerreur();


        //validator
//        $request->validate([
//            'backimgpartner'=>'required|mimes:PNG,JPG,JPEG,png,jpg,jpeg|max:2524',
//            'logo'=>'required|mimes:PNG,JPG,png,jpg|max:900',
//            'titlev'=>'required',
//            'descdetail'=>'required|max:50',
//            'linkv'=>'required|url'
//        ],$message_fr);


        $partner= Partner::where('id', $id);//fixer l'id pour la mise a jour
        $nbr = time().'-'.date("Y").date("m").date("d"); //recupere l'annee le mois le jour
        //dd($request->indice);
        //Mise a jour que le Background ssi indice ==1
        if($request->indice==1){

            //on verifie que si c'est un images
            $request->validate([
                'backimgpartner'=>'required|mimes:PNG,JPG,JPEG,png,jpg,jpeg|max:1024'
            ],$message_fr);

            $exte_file = $request->file(['backimgpartner'])->extension();
            $newNameImage_file = $nbr.'-backpartner';

            $filename_file = md5_file($request->file('backimgpartner')->getRealPath()).$newNameImage_file.'.'.$exte_file;

            $data = $partner->update([
                'backimgpartner'=>$filename_file,
            ]);

            if($data==true) {
                //sauvegarde du fichier dans un repertoire
                $request->file('backimgpartner')->storeAs('public/assets/img/partners/', $filename_file, 'public_perso');
            }
            return redirect(route('editpartner',$id));
        }

        //Mise a jour du logo ssi indice ==2
        if ($request->indice==2){
            //on verifie que si c'est un images
            $request->validate([
                'imgpartner'=>'required|mimes:PNG,JPG,JPEG,png,jpg,jpeg|max:1024'
            ],$message_fr);

            $exte_file = $request->file(['imgpartner'])->extension();
            $newNameImage_file = $nbr.'-logo';

            $filename_file = md5_file($request->file('imgpartner')->getRealPath()).$newNameImage_file.'.'.$exte_file;

            $data = $partner->update([
                'imgpartner'=>$filename_file,
            ]);

            if($data==true) {
                //sauvegarde du fichier dans un repertoire
                $request->file('imgpartner')->storeAs('public/assets/img/partners/', $filename_file, 'public_perso');
            }
            return redirect(route('editpartner',$id));




        }
        //Mise a jour des texte ssi indice ==3
        elseif ($request->indice==3){

            $request->validate([
                'titlepartner'=>'required|min:5|max:250',
                'titleservices'=>'required|min:5|max:250',
                'linkpartner'=>'required|url'
            ],$message_fr);

            $partner->update([
                'titlepartner' => $titlepartner,
                'titleservices' => $titleservices,
                'servicepartner' => $servicepartner,
                'linkpartner' => $linkpartner,
                'status' => $status,
                'level' => $level
            ]);
            return redirect(route('editpartner',$id));

        }else{
            echo 'On ne fait rien';
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Partner $partner)
    {
        Partner::destroy($partner->id);
        return redirect()->route('listhelping');
    }

    //recuperon et supression total les elementys
    public function sofderestore()
    {
        //afficher les elements suprimers
        $partner = Partner::onlyTrashed()->paginate(5);;
        return view('admin/partners/del', compact('partner'));
    }

    //restauration des element suprimer par son ID
    public function restoredestroy(Request $request)
    {
        //dd($request->id);
        Partner::onlyTrashed()
            ->where('id', $request->id)
            ->restore();
        return redirect()->route('listpartner');
    }


    //supression definitivement de la table
    public function destoredefinitely(Request $request)
    {
        //dd($request->id);
        Partner::onlyTrashed()
            ->where('id', $request->id)
            ->forceDelete();
        return redirect()->route('listpartner');
    }




}
