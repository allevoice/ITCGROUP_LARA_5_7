<?php

namespace App\Http\Controllers;

use App\Account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AccountController extends Controller
{


    public function messageerreur(){

        //Les messages
        $message_fr = [
            //'avatar.required'=> 'Vous devez mettre une image pour le background',
            'avatar.max'    => 'The :attribute ne doit pas depasser cette valeur  :max Bite. ',
            'avatar.mimes' => 'Le type format de l\'image n\'est pas prise en charge',

            'email.required'=> 'Le champ email ne doit pas etre vide',
            'email.email'=> 'Ce n\'est pas un mail',

            'pwdpass.required'=> 'Le champ Mot de Passe ne doit pas etre vide',
            'pwdpass.confirmed'=> 'Le champ ne sont pas identiquee',
            'pwdpass.min'=> 'Le champ Mot de Passe ne doit pas inferieur les :min caractères',

            'pwdpass_confirmation.required'=> 'Le champ Mot de Passe ne doit pas etre vide',
            'pwdpass_confirmation.min'=> 'Le champ Mot de Passe ne doit pas inferieur les :min caractères',



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
        $data = Account::Orderby('created_at', 'ASC')->get();
        //dd($data);
        return view('admin/accounts/liste', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/accounts/new');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $email =$request->email ;
        $firstname = $request->firstname;
        $lastname = $request->lastname;
        $pwdpass = hashcmd($request->pwdpass,'e');
        $level = $request->level;
        $status = '0';
        $langues = '1';


        $request->validate([
            'email' => 'required|email',
            'pwdpass' => 'required|min:8',
        ],$this->messageerreur());



        //insertion de nouvelle de donnee
        $data= new Account();
        $data->email = $email;
        $data->firstname = $firstname;
        $data->lastname = $lastname;
        $data->pwdpass = $pwdpass;
        $data->level = $level;

        $data->status = $status;
        $data->langues = $langues;
        $data->save();
        //redirection vers la page liste
        return redirect()->route('lstaccount');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function show(Account $account)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function edit(Account $account)
    {
        $data=$account;
        $idss = loginacccesdata()->id;
        if($idss == $data->id){
            return  redirect(route('persoedit',$idss));
        }else{
            return view('admin/accounts/edit',compact('data'));
        }




    }

   public function persoview(Request $request)
    {
        //dd($request->id);
        $data=Account::where('id',$request->id)->first();
        //dd($data);
        return view('admin/accounts/editperso',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Account $account)
    {


        $id =$request->id ;
        $email =$request->email ;
        $firstname = $request->firstname;
        $lastname = $request->lastname;
        $level = $request->level;
        $status = $request->status;
        $avatar = $request->avatar;

        $indice = $request->indice;//3 text / 2 image

        $helpupdatedata = Account::where('id', $id);//fixer l'id pour la mise a jour
        $nbr = time().'-'.date("Y").date("m").date("d"); //recupere l'annee le mois le jour


        if($indice == 3){
            //dd('text');

            $request->validate([
                'email' => 'required|email',
            ],$this->messageerreur());

            $helpupdatedata->update([
                'firstname'=>$firstname,
                'lastname'=>$lastname,
                'email'=>$email,
                'level'=>$level,
                'status'=>$status,
            ]);

            return redirect(route('lstaccount'));


        }elseif ($indice == 2){
            //dd('Image');

            $request->validate([
                'avatar'=>'mimes:PNG,JPG,JPEG,png,jpg,jpeg|max:800'
            ],$this->messageerreur());

            $exte_file = $request->file(['avatar'])->extension();

            $newNameImage_file = $nbr.'-avatar';

            $filename_file = md5_file($request->file('avatar')->getRealPath()).$newNameImage_file.'.'.$exte_file;

            $data = $helpupdatedata->update([
                'avatar'=>$filename_file,
            ]);

            if($data==true) {
                //sauvegarde du fichier dans un repertoire
                $request->file('avatar')->storeAs('public/assets/assetsadm/img/avatar/', $filename_file, 'public_perso');
            }
            return redirect(route('lstaccount'));



        }else{
            return response()->view('404');
        }







    }


    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function uppass(Request $request){
        $data=Account::Where('id',$request->id)->first();

        //dd($data);
        return view('admin/accounts/editpass',compact('data'));
    }

    public function updatepass(Request $request){
        $id =$request->id ;
        $pwdpass = hashcmd($request->pwdpass,'e');

        $request->validate([
            'pwdpass' => 'required|min:8',
        ],$this->messageerreur());

        //dd('up pass',$pwdpass);

        Account::where('id', $id)->update([
            'pwdpass'=>$pwdpass,
        ]);

        return redirect(route('lstaccount'));


    }

    public function updatepasspublic(Request $request){
        //$data=$request->all() ;

        $pwdpass = hashcmd($request->pwdpass,'e');


        $request->validate([
            'pwdpass' => 'required|min:8|confirmed',
            'pwdpass_confirmation' => 'min:8|required'
        ],$this->messageerreur());

        //dd('on peut update');

        $upvpass = Account::where('email', $request->email)->update([
            'pwdpass'=>$pwdpass,
        ]);

        if($upvpass ==true){
            Account::where('email', $request->email)->update([
                'keypass'=>NULL,
            ]);
        }



        return redirect(route('lstaccount'));


    }


    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @param  \App\Account $account
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,Account $account)
    {
        Account::destroy($request->id);
        return redirect()->route('lstaccount');
    }





    //recuperon et supression total les elementys
    public function sofderestore()
    {
        //afficher les elements suprimers
        $data = Account::onlyTrashed()->paginate(5);
        //dd($data);
        return view('admin/accounts/del', compact('data'));
    }

    //restauration des element suprimer par son ID
    public function restoredestroy(Request $request)
    {
        //dd($request->id);
        Account::onlyTrashed()
            ->where('id', $request->id)
            ->restore();
        return redirect()->route('lstaccount');
    }


    //supression definitivement de la table
    public function destoredefinitely(Request $request)
    {
        //dd($request->id);
        Account::onlyTrashed()
            ->where('id', $request->id)
            ->forceDelete();
        return redirect()->route('lstaccount');
    }













}
