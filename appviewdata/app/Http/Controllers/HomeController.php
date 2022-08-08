<?php

namespace App\Http\Controllers;
use App\Account;
use App\Messaging;
use App\Newsletter;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{




    public function slideheader(){
        return  DB::table('slideheaders')->Where('deleted_at',NULL)->where('status','1')->orderBy('level', 'ASC')->get();
    }


    public function index(){


        //AVant on veriri isi les tables exite

        $slideview  = DB::table('homesliders')->Where('deleted_at',NULL)->where('status','1')->orderBy('level', 'ASC')->get();

        $serviv  = DB::table('serviceofferts')->Where('deleted_at',NULL)->where('status','1')->orderBy('level', 'ASC')->limit(4)->get();

        $bringing  = DB::table('bringings')->Where('deleted_at',NULL)->where('status','1')->limit(1)->get();

        $howareu  = DB::table('howareyous')->Where('deleted_at',NULL)->where('status','1')->limit(1)->get();

        $helpingview  = DB::table('helpingviews')->Where('deleted_at',NULL)->where('status','1')->orderBy('level', 'ASC')->limit(3)->get();

        $skill = DB::table('skills')->Where('deleted_at',NULL)->where('status','1')->orderBy('level', 'ASC')->limit(4)->get();

        $partner = DB::table('partners')->Where('deleted_at',NULL)->where('status','1')->orderBy('level', 'ASC')->limit(8)->get();

        return view('home/home',compact('partner','skill','helpingview','howareu','bringing','serviv','slideview'));


    }

    public function parnerliste(){
        $partner = DB::table('partners')->Where('deleted_at',NULL)->where('status','1')->orderBy('level', 'ASC')->Paginate(8);
        $slide = $this->slideheader();
        return view('home/partnerlist',compact('partner','slide'));
    }

    public function serviceofferthome(){
        $serviceoffert = DB::table('serviceofferts')->Where('deleted_at',NULL)->where('status','1')->orderBy('level', 'ASC')->paginate(8);
        $slide = $this->slideheader();
        return  view('home/services',compact('serviceoffert','slide'));
    }

    public function servicedetailshome(Request $request){

            $service = DB::table('serviceofferts')->Where('deleted_at',NULL)->where('codeservice',$request->code)->first();

            //dd($service);
            if($service!=NULL){
                return view('home/service_detail',compact('service'));
            }else{
                //abort('404');
                return redirect()->route('services');
            }

    }

    public function aboutpage(){
        $advisor = DB::table('advisors')->Where('deleted_at',NULL)->where('status','1')->limit(4)->get();

        $ourcomapgnie = DB::table('ourcompagnies')->Where('deleted_at',NULL)->where('status','1')->limit(1)->get();

        $founder  = DB::table('founders')->Where('deleted_at',NULL)->where('status','1')->limit(1)->get();

        $slide = $this->slideheader();
        //dd($ourcomapgnie);
        return view('home/about',compact('ourcomapgnie','founder','advisor','slide'));
    }

    public function projetpage(){
        $slide = $this->slideheader();
        $projetdata  = DB::table('projects')->Where('deleted_at',NULL)->where('status','1')->get();
        //dd($ourcomapgnie);
        return view('home/projects',compact('projetdata','slide'));
    }


    public function blogpage($id=null){
        $slide = $this->slideheader();
        if($id ==NULL){
            $data = DB::table('blogues')->Where('deleted_at',NULL)->orderby('level','DESC')->first();
            $dataall = DB::table('blogues')->Where('deleted_at',NULL)->where('status','1')->get();
            return view('home/blog',compact('data','dataall','slide'));
        }else{
            // Will return a ModelNotFoundException if no user with that id
            try
            {
                $data = DB::table('blogues')->Where('deleted_at',NULL)->where('id',$id)->first();
            }
            // catch(Exception $e) catch any exception
            catch(ModelNotFoundException $e)
            {
                //dd(get_class_methods($e)); // lists all available methods for exception object
                //dd($e);
                return view('404');
            }

            $dataall = DB::table('blogues')->Where('deleted_at',NULL)->where('status','1')->get();
            return view('home/blog',compact('data','dataall','slide'));
        }




        /*
        $projetdata  = Project::where('status','1')->get();
        //dd($ourcomapgnie);
        return view('home/projects',compact('projetdata'));*/
    }


    public function contactview(){
        $slide = $this->slideheader();
        return view('home/contact',compact('slide'));
    }


    public function contactpage(Request $request){
        $message_fr = [
            'namesms.required'=> 'Le champ Nom ne doit pas etre vide',
            'namesms.max'=> 'Le champ Nom ne doit pas depasser les :max caractères',
            'namesms.min'=> 'Le champ Nom ne doit pas inferieur les :min caractères',

            'subjet.required'=> 'Le champ Sujet ne doit pas etre vide',
            'subjet.max'=> 'Le champ Sujet ne doit pas depasser les :max caractères',
            'subjet.min'=> 'Le champ Sujet ne doit pas inferieur les :min caractères',

            'email.required'=> 'Le champ Sujet ne doit pas etre vide',
            'email.email'=> 'ceci n\'est pas un email',

            'description.required'=> 'Le champ Message ne doit pas etre vide',
            'description.max'=> 'Le champ Message ne doit pas depasser les :max caractères',
            'description.min'=> 'Le champ Message ne doit pas inferieur les :min caractères',
        ];

        $request->validate([
            'namesms'=>'required|min:5|max:250',
            'subjet'=>'required|min:5|max:250',
            'email'=>'required|email',
            'description'=>'required|min:10|max:1000',
        ],$message_fr);
        //dd($request->All());
        $namesms = $request->namesms;
        $subjet = $request->subjet;
        $email = $request->email;
        $description = $request->description;

        if(securemessagepublic() == true){

        $data= new Messaging();
        $data->namesms = $namesms;
        $data->subjet = $subjet;
        $data->email = $email;
        $data->description = $description;
        $saving = $data->save();

        $destinataire = 'infocontact@itcgroup.biz';
        // Plusieurs destinataires
        $to  = $destinataire; // notez la virgule

        // Sujet
        //$subject = 'Calendrier des anniversaires pour Août';
        $subject = $subjet;

        // message
        $message = '
     <html>
      <head>
       <title>Contact information</title>
      </head>
      <body>
       <p style="font-weight: bold">Vous avez recu</p>
       <table>
      
        <tr>
         <td>Nom</td>
         <td><span style="font-weight: bold">'.$namesms.'</span></td>
         </tr>
         
         <tr>
         <td>Subject</td>
         <td><span style="font-weight: bold">'.$subjet.'</span> </td>
         </tr>
         
         <tr>
         <td>Email</td>
         <td><span style="font-weight: bold">'.$email.'</span></td>
         </tr>
         
         <tr>
         <td>Date</td>
         <td><span style="font-weight: bold">'.date("F j, Y, g:i a").'</span></td>
         </tr>
         
         <tr>
         <td>Message</td>
         <td><span style="font-weight: bold">'.$description.'</span></td>
        </tr>  

        
       
       </table>
      </body>
     </html>
     ';

        // Pour envoyer un mail HTML, l'en-tête Content-type doit être défini
        $headers[] = 'MIME-Version: 1.0';
        $headers[] = 'Content-type: text/html; charset=iso-8859-1';

        // En-têtes additionnels
        //$headers[] = 'To: Contact <'.$destinataire.'>';
        $headers[] = 'From:'.$namesms.' <'.$email.'>';
//        $headers[] = 'Cc: anniversaire_archive@example.com';
//        $headers[] = 'Bcc: anniversaire_verif@example.com';

        // Envoi
        mail($to, $subject, $message, implode("\r\n", $headers));

        //redirection vers la page liste
        return redirect()->route('successms');
        }else{
            return redirect()->route('home');
        }


    }


    public function successmessage(){
        return view('home/successms');
    }


    public function loginview(){
        $slidelogin = DB::table('slidelogins')->Where('deleted_at',NULL)->where('status','1')->orderBy('level', 'ASC')->get();
        return view('home/login',compact('slidelogin'));

    }

    public function loginperso(){
        $val = Session::get('paneladmin');
        if($val == NULL){
            return view('home/loginperso');
        }else{
            return redirect()->route('adminpage');

        }
    }

    public function logsubmit(Request $request){

        $indice = $request->indice;
        $email = $request->email;
        $pwd = $request->password;
        $rember = $request->rmb;


        $compte = Account::Where('email',$email);


        //on verifie est-ce que le keypass est vide
        if($compte->where('keypass',NULL)->first() == true){

        if($indice == 3){
            //admin page
            //dd('login padmin', $request->All());



            //on verifie si l'email existe dans notre systeme
            if($compte->first() == NULL){
                //compte non trouver
                return redirect()->route('logpersoform')->with('alert','Erreur Email de connection');
            }else{
                //compte trouver
                //on verifie son mot de pass
                $compteall = $compte->Where('pwdpass',hashcmd($pwd,'e'));
                if($compteall->first() == NULL){
                    return redirect()->route('logpersoform')->with('pass','Erreur Password de connection');
                }else{
                    //on verifie si le compte est aciver
                    if($compte->Where('pwdpass',hashcmd($pwd,'e'))->Where('status',1)->first()==NULL){
                        return redirect()->route('logpersoform')->with('activateview','Votre compte est temporaiment desactiver....Pour activer votre compte il faut contacter l\'Administration du systeme Merci');
                    }else{
                        //on peut travailler sur la connection
                        //on recupere l'id pour la session
                        $id = $compte->first()->id;
                        //on crypte l'id pour les currieux
                        $newid = hashcmd($id,'e');
                        //creation de la session
                        Session::put('paneladmin', $newid);

                        return redirect()->route('adminpage')->with('success','Bienvenue sur votre compte');


                        //dd('compte login et mod de pass et activa', $id, $newid);
                    }

                }

            }









        }elseif ($indice == 1){
            //login User
        }else{
            return response()->view('404');
        }
        }else{
            //le clef passe n est pas vide
            $mykey = Account::Where('email',$email)->first();

            //dd($email,$mykey->keypass,hashcmd($mykey->keypass,'d'));

            return redirect()->route('passrecovery',hashcmd($mykey->keypass,'d').'-'.hashcmd('itcgroup','e').'-'.$email);
            //route('passrecovery',$keypass.'-'.hashcmd('itcgroup','e').'-'.$email)
            //passrecovery
            //dd('comamnde a retournee');

        }




    }

    public function loginforgetpassview(){
        $slidelogin = DB::table('slidelogins')->Where('deleted_at',NULL)->where('status','1')->orderBy('level', 'ASC')->get();

        $val = Session::get('paneladmin');
        if($val == NULL){
            return view('home/passforget',compact('slidelogin'));
        }else{
            return redirect()->route('adminpage');
        }


    }


    public function newsletter(Request $request){


        $urlcompare=securemessagepublic();


        //dd($urlcompare);

        if($urlcompare == true){
            ///echo "Yeah. Exist itcgroup";
            ///dd('code');

            //on insert le mail
            $newsletter= htmlspecialchars($request->newsletter);

            $email = $newsletter;
            $ipaddresse = $_SERVER['REMOTE_ADDR'];;

            $link = $actual_link;

            $today = now();



            // Valider l'email
            if(filter_var($email, FILTER_VALIDATE_EMAIL)){

                $data= new Newsletter();
                $data->email = $email;
                $data->ipaddresse = $ipaddresse;
                $data->link = $link;
                $data->langues = '1';
                $datasave = $data->save();

                if($datasave == true){
                    return redirect()->route('successms');
                }else{
                    return response()->view('404');
                }
            }else{
                return redirect()->route('home');
            }

        }else{

            //echo "Oh, Don't Exist itcgroup!!!";
            return redirect()->route('home');
        }






    }


    public function logaction(Request $request){
        //dd('login');
        return response()->view('404');
    }

    public function logactionerror(Request $request)
    {

        $email = $request->email;

        if (securemessagepublic() == true) {

            //on commence
            $compte = Account::Where('email', $email);

            //on verifie si l'email existe dans notre systeme
            if ($compte->first() == NULL) {
                //compte non trouver
                return redirect()->route('forgetpass')->with('alert', 'Email non trouve');
            } else {
                //compte trouver
                if ($compte->Where('status', 1)->first() == NULL) {
                    return redirect()->route('forgetpass')->with('activateview', 'Votre compte est temporaiment desactiver....Pour activer votre compte il faut contacter l\'Administration du systeme Merci');
                } else {

                    $newpass = randtext(5).rand(2,150).rand(2,150).randtext(3);

                    $keypass = randtext(5).rand(2,150).rand(2,150).randtext(3);

                    $keypassdb = hashcmd($keypass,'e');

                    $updkey= $compte->update([
                        'pwdpass'=>$newpass,
                        'keypass'=>$keypassdb,
                    ]);
                    if($updkey = true){

                        $namesms = 'Mot de Passe Reinitialisation';

                        $destinataire = $email;

                        //dd('compte trouver et peux creer un key pass',$destinataire,$keypass);

                        // Plusieurs destinataires
                        $to = $destinataire; // notez la virgule

                        // Sujet
                        //$subject = 'Calendrier des anniversaires pour Août';
                        $subject = 'Reinitialisation Mot de Passe';

                        // message
                        $message = smspublicpwderror($destinataire,$keypass);

                        // Pour envoyer un mail HTML, l'en-tête Content-type doit être défini
                        $headers[] = 'MIME-Version: 1.0';
                        $headers[] = 'Content-type: text/html; charset=iso-8859-1';

                        // En-têtes additionnels
                        //$headers[] = 'To: Contact <'.$destinataire.'>';
                        $headers[] = 'From:' . $namesms . ' <' . $email . '>';
                        // Envoi
                        mail($to, $subject, $message, implode("\r\n", $headers));

                        return redirect()->route('successms');
                    }else{

                        return redirect()->route('home');
                    }

            }


        }


    }else{
            return redirect()->route('home');
    }
}


    public function logoutaction(){
        Session::forget('paneladmin');
        return redirect()->route('home');
    }


    public function passrecovery(Request $request){

        //on recupere les info depuis l'url
        $getkey = $request->key;

        //on traite les information
        $desc = explode('-',$getkey);
        $getkeyview = $desc['0'];
        $getcrypeview = $desc['1'];
        $getcrypeview_2 = hashcmd($desc['1'],'d');
        $getmailview = $desc['2'];
        $keycode = hashcmd($getkeyview,'e');
        $key_2 = hashcmd($keycode,'d');



        //on verifie le cryptage
        if($getcrypeview_2=='itcgroup'){
            //on verie le code depuis la base de donne
            $data = Account::where('email',$getmailview)->where('keypass',$keycode)->first();

            if($data == true){
                //on continue
                //on retourn la vue pour que l'utilisateur ajoute le nouveau mot de pass

                return view('admin/accounts/editpasspublic',compact('data'));

            }else{
                return redirect()->route('home');
            }



        }



    }



}
