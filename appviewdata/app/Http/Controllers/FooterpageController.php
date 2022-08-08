<?php

namespace App\Http\Controllers;

use App\Footerpage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FooterpageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('footerpages')->orderBy('updated_at', 'desc')->get();
        //dd($data);
        return view('admin/footerinfos/liste',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Footerpage  $footerpage
     * @return \Illuminate\Http\Response
     */
    public function show(Footerpage $footerpage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Request $request
     * @param  \App\Footerpage $footerpage
     * @return void
     */
    public function edit(Request $request, Footerpage $footerpage)
    {
        $id = $request->footerdatum;
        $level = explode("-", $id);
        $new_id = $level[0];
        $indice = $level[1];
        //dd($new_id,$indice);

        $data=Footerpage::Where('id',$new_id)->first();
        //dd($data);
        if($data !=NULL){
            return view('admin/footerinfos/edit',compact('data','indice'));
        }else{
            //abort('404');
            return redirect()->route('listfooterdata');
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Footerpage  $footerpage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Footerpage $footerpage)
    {
        //liste mise a jours des elements
        $id= $request->id;
        $indice = $request->indice;

        //mise a jour de l'indice == 1
            $email = $request->email;
            $email_2 = $request->email_2;
            $phone_1 = $request->phone_1;
            $phone_2 = $request->phone_2;
            $phone_3 = $request->phone_3;
            $adresse= $request->adresse;
            $address_2 = $request->address_2;
            $town = $request->town;
            $states = $request->states;
            $zipcode = $request->zipcode;
        //mise a jour de l'indice == 1

        //mise a jour de l'indice  == 2

            $facelink = $request->facelink;
            $facest = $request->facest;

            $instalink = $request->instalink;
            $instast = $request->instast;

            $inlink = $request->inlink;
            $inst = $request->inst;

            $goopluslink = $request->goopluslink;
            $gooplusst = $request->gooplusst;

            $tweetlink = $request->tweetlink;
            $tweetst = $request->tweetst;

        //mise a jour de l'indice  == 2


        $maplink = $request->maplink;
        $status = $request->status;



        $helpupdatedata = Footerpage::where('id', $id);//fixer l'id pour la mise a jour



        if($indice == 1){
            $helpupdatedata->update([
                'email' => $email,
                'email_2' => $email_2,
                'phone_1' => $phone_1,
                'phone_2' => $phone_2,
                'phone_3' => $phone_3,
                'adresse' => $adresse,
                'address_2' => $address_2,
                'town' => $town,
                'states' => $states,
                'zipcode' => $zipcode,
            ]);
        }
        elseif ($indice == 2){
            $helpupdatedata->update([
                'facelink' => $facelink,
                'facest' => $facest,

                'instalink' => $instalink,
                'instast' => $instast,

                'inlink' => $inlink,
                'inst' => $inst,

                'goopluslink' => $goopluslink,
                'gooplusst' => $gooplusst,

                'tweetlink' => $tweetlink,
                'tweetst' => $tweetst,
            ]);
        }
        elseif ($indice == 3){
            $helpupdatedata->update([
                'maplink' => $maplink
            ]);
        }
        elseif ($indice == 4){
            $helpupdatedata->update([
                'status' => $status
            ]);
        }
        else{
            return redirect()->route('listfooterdata');
        }
        return redirect(route('listfooterdata',$id));


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Footerpage  $footerpage
     * @return \Illuminate\Http\Response
     */
    public function destroy(Footerpage $footerpage)
    {
        //
    }



    public function newdata(){
        //dd('new data');
        $user = '1';

        $data = Footerpage::insert([

            [
                'adresse'=>'17, Plaza 41, rue Lamarre,',
                'address_2'=>'Pétion-Ville',
                'town'=>'Port-au-Prince',
                'states'=>'Haiti',
                'zipcode'=>'',
                'email'=>'info@fcgroup.com',
                'email_2'=>'support@fcgroup.com',
                'phone_1'=>'+509 3711.5990',
                'phone_2'=>'+509 3399.5990',
                'phone_3'=>'',
                'maplink'=>'<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3783.345636940014!2d-72.28983988528587!3d18.513276574229586!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8eb9e905feb7c119%3A0x49a77c14135927fb!2sPlaza%2041!5e0!3m2!1sfr!2sht!4v1596296129282!5m2!1sfr!2sht" height="350" style="border:0" allowfullscreen></iframe>',

                'facelink'=>'https://facebook.com/itcgrouphaiti',
                'facest'=>'1',

                'instalink'=>'https://www.instagram.com/itcgrouphaiti',
                'instast'=>'1',

                'inlink'=>'',
                'inst'=>'',

                'goopluslink'=>'',
                'gooplusst'=>'',

                'tweetlink'=>'https://twitter.com/itcgrouphaiti',
                'tweetst'=>'1',

                'status' => '1',
                'langues' => '1',
                'iduser'=>$user,
            ],





        ]);

        if($data == true){
            return redirect()->route('listfooterdata');
        }else{
            return 'erreur';
        }

    }









}
