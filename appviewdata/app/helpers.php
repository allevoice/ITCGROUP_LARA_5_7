<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

//On peut ecrire tous les fonction necessaire pour notre projet

//affichages des images depuis une models



/*
if(!function_exists('photovoiturehelp')){
    function photovoiturehelp($id, $limite=NULL){
        return  App\Models\Photo::Photovoiture($id, $limite);
    }
}
*/


if(!function_exists('dataviewhead')){
    function dataviewhead($pagename,$Level){
           $headdata = App\Headerpage::Where('page',$pagename)->Where('level',$Level)->Where('status',1)->get();
        return $headdata;
    }
}





if(!function_exists('projetlisteswitch')){
    function projetlisteswitch($id=NULL){

        if($id == NULL){
            $stliste = [
                '0' => 'All',
                '1' => 'Installation',
                '2' => 'Web development',
                '3' => 'Security',
                '4' => 'Data Management',
            ];
            return $stliste;
        }else{
            switch ($id) {
                case 0: return "All";break;
                case 1: return "Installation";break;
                case 2: return "Web development";break;
                case 3: return "Security";break;
                case 4: return "Data Management";break;
            }
        }


    }
}




if(!function_exists('languesviewdatafixepage')){
    function languesviewdatafixepage($name=NULL,$lng=NULL){

        if($lng == NULL){
            switch ($name) {
                /*===================MENU=======================*/
                case 'home': return "Home";break;
                case 'about': return "About";break;
                case 'service': return "Services";break;
                case 'project': return "Project";break;
                case 'blog': return "Blog";break;
                case 'contact': return "Contact";break;
                /*===================MENU=======================*/

                /*===================FOOTHER PAGE=======================*/
                case 'newsletter': return "Newsletter";break;
                case 'enter_your_email': return "Enter Your Email";break;
                case 'go': return "Go";break;
                case 'partnership': return "Partnership";break;
                case 'feedsfacebook': return "Facebook Feeds";break;
                case 'createdby': return "Created by";break;
                /*===================FOOTHER PAGE=======================*/

                /*===================BLogues PAGE=======================*/
                case 'other_post': return "Other Post";break;
                case 'experience': return "Experience";break;
                /*===================BLogues PAGE=======================*/

            }
        }
        elseif($lng == 'fr'){
                switch ($name) {
                    case 'home': return "Accueil";break;
                    case 'about': return "A propos de";break;
                    case 'service': return "Services";break;
                    case 'project': return "Projet";break;
                    case 'blog': return "Blog";break;
                    case 'contact': return "Contact";break;

            }
        }


    }
}




if(!function_exists('detpageinfo')){
    function detpageinfo($pagename=NULL,$Level=NULL){
        if($pagename!=NULL){
            switch ($pagename) {
                case 1: return "Home";break;
                case 2: return "About";break;
                case 3: return "Service";break;
                case 4: return "Procjet";break;
                case 5: return "Blog";break;
                case 6: return "Contact";break;
                case 7: return "Patner";break;
            }
        }elseif ($Level!=NULL){
            switch ($Level) {
                case 'a': return "Premier";break;
                case 'b': return "Deuxieme";break;
                case 'c': return "Troisieme";break;
            }
        }else{
            return 'Non definie';
        }


    }
}

if(!function_exists('levelback')){
    function levelback($id=NULL){
        if($id == NULL){
            $stliste = [
                '0' => 'Non definis',
                '1' => 'First',
                '20' => 'Default',
            ];
            return $stliste;
        }else{
            return $id == 1 ? 'First' : 'Default';
        }
    }
}


if(!function_exists('statuscmdswitch')){
    function statuscmdswitch($id=NULL){

        if($id == NULL){
            $stliste = [
                    '0' => 'Non',
                    '1' => 'Yes',
                ];
            return $stliste;
        }else{
            switch ($id) {
                case 1:
                    return "Yes";break;
                case 0:
                    return "Non";break;
            }
        }


    }
}




if(!function_exists('statuscmd')){
    function statuscmd($id=NULL){

        if($id == NULL){
            $stliste = [
                    '0' => 'Non definis',
                    '1' => 'Active',
                    '2' => 'Desactiver',
                ];
            return $stliste;
        }else{
            switch ($id) {
                case 0:
                    return "Non definis";break;
                case 1:
                    return "Active";break;
                case 2:
                    return "Desactiver";break;
            }
        }


    }
}


if(!function_exists('limitemtxt')){
    function limitemtxt($content,$limit=false){
        return substr($content, 0, $limit);
    }
}




if(!function_exists('levelcmd')){
    function levelcmd($id=NULL){
        if($id==NULL){
            $liste = [
                    '0' => 'Non definis',
                    '1' => 'Premier',
                    '2' => 'Second',
                    '3' => 'Troisieme',
                    '4' => 'Quatrieme',
                    '5' => 'Cinquieme',
                    '6' => 'Sisieme',
                ];
            return $liste;
        }else{
            switch ($id) {
                case 0: return "Non definis";break;
                case 1: return "Premier";break;
                case 2: return "Second";break;
                case 3: return "Troisieme";break;
                case 4: return "Quatrieme";break;
                case 5: return "Cinquieme";break;
                case 6: return "Sisieme";break;
            }
        }
    }
}




if(!function_exists('levelrolecmd')){
    function levelrolecmd($id=NULL){
        if($id==NULL){
            $liste = [
                    '0' => 'Non definis',
                    '1' => 'Admin',
                    '2' => 'User',
                ];
            return $liste;
        }else{
            switch ($id) {
                case 0: return "Non definis";break;
                case 1: return "Admin";break;
                case 2: return "User";break;
            }
        }
    }
}







if(!function_exists('footerlistpartner')){
    function footerlistpartner(){
        $footerpagelist = App\Partner::Where('status',1)->limit('5')->orderby('level','ASC')->get();
        return $footerpagelist;
    }
}


if(!function_exists('datetoday')){
    function datetoday($date){
        $nowdate = date("Y-m-d H:i:s");
        $datetime1 = \Carbon\Carbon::createFromFormat('Y-m-d H:s:i', $nowdate);
        $interval = $datetime1->diffInDays($date);


        return $date;


    }
}




if(!function_exists('linkmedia')){
    function linkmedia(){
        return DB::table('footerpages')->where('status',1)->first();
    }
}



if(!function_exists('hashcmd')){
    /**
     * @param $data
     * @param $action | encryp value e| decrypter value d
     * @return bool|string
     */
    function hashcmd($data, $action){
        //return (hash('sha224', $data));

        //$action = 'd';
        //$data = 'codeview';
        //$data = 'Z25jMzBwNFFSSjZmdm44VWM1dXYwdz09';
        $secret_key = 'my_simple_secret_key';
        $secret_iv = 'my_simple_secret_iv';

        $output = false;
        $encrypt_method = "AES-256-CBC";
        $key = hash( 'sha256', $secret_key );
        $iv = substr( hash( 'sha256', $secret_iv ), 0, 16 );

        if( $action == 'e' ) {
            $output = base64_encode( openssl_encrypt( $data, $encrypt_method, $key, 0, $iv ) );
        }
        else if( $action == 'd' ){
            $output = openssl_decrypt( base64_decode( $data ), $encrypt_method, $key, 0, $iv );
        }

        return $output;


    }
}






if(!function_exists('loginacccesdata')){
    function loginacccesdata($id=NULL){
        $idsession = Session::get('paneladmin');
        $idsess = hashcmd($idsession,'d');

        //on recupere les information de l id de la session
        $session = \App\Account::where('id',$idsess)->first();
        return $session;


    }
}




/**
 * @return bool
 * cette function permet de verifier est-ce que le message vient du serveur
 */
if(!function_exists('securemessagepublic')){
    /**
     * @return bool
     * cette function permet de verifier est-ce que le message vient du serveur
     */
    function securemessagepublic(){
        //$actual_link = $_SERVER['HTTP_HOST'];//"www.itcgroup.biz"
        $actual_link = "www.itcgroup.biz";// en enlever quan c'est en online
        $compare_url = 'itcgroup.biz';
        $linkperso = 'itcgroup';
        $array = explode('.',$actual_link);
        $key = array_search($linkperso, $array);

        $urlcompare = in_array($linkperso, $array);
        return  $urlcompare;

    }
}



if(!function_exists('smspublicpwderror')){
    /**
     * @param $email
     * @param $keypass | Crypter
     * @return string
     */
    function smspublicpwderror($email, $keypass){
       return '
     <html>
      <head>
       <title>Probleme Mot de Passe</title>
      </head>
      <body>
       <p style="font-weight: bold">Lien pour la reinitialisation de votre mot de passe</p>
       <table>
      
         <tr>
         <td>Email</td>
         <td><span style="font-weight: bold">' . $email . '</span></td>
         </tr>
          
         <tr>
         <td>Link</td>
         <td>Pour Reinitialise le mot de passe <a href="'.route('passrecovery',$keypass.'-'.hashcmd('itcgroup','e').'-'.$email).'">Click ici </a></td>
         </tr>
         
         <tr>
         <td>Date</td>
         <td><span style="font-weight: bold">' . date("F j, Y, g:i a") . '</span></td>
         </tr>
         

        
       
       </table>
      </body>
     </html>
     ';
    }
}




if(!function_exists('randtext')){
    function randtext($length=NULL){
        $chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz";
        $clen   = strlen( $chars )-1;
        $id  = '';

        for ($i = 0; $i < $length; $i++) {
            $id .= $chars[mt_rand(0,$clen)];
        }
        return ($id);
    }
}


if(!function_exists('testhelping')){
    function testhelping($id=NULL){
        if($id==NULL){
            return 'Monteste helping';
        }else{
           return 'Mon test Helping with id '.$id;
        }
    }
}





?>
