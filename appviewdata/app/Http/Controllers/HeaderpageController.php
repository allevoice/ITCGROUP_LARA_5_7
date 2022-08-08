<?php

namespace App\Http\Controllers;

use App\Headerpage;
use Illuminate\Foundation\Console\EventMakeCommand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HeaderpageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('headerpages')->orderBy('page', 'ASC')->get();
        return view('admin/headerpage/liste', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Headerpage  $headerpage
     * @return \Illuminate\Http\Response
     */
    public function edit(Headerpage $headerpage)
    {
        //$id=$request->slideadmin;

        //$show = Headerpage::where('id',$id)->first();
        $show = $headerpage;
        //dd($service);
        if($show !=NULL){
            return view('admin/headerpage/edit',compact('show'));
        }else{
            return redirect()->route('listheaderpage');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Headerpage  $headerpage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Headerpage $headerpage)
    {
        $id = $headerpage->id;
        $title = $request->title;
        $description = $request->description;
        $status = $request->status;

        //dd($id);
        $message_fr = [
            'title.required'=> 'Le champ titre ne doit pas etre vide',
            'title.max'=> 'Le champ titre ne doit pas depasser les :max caractères',
            'title.min'=> 'Le champ titre ne doit pas inferieur les :min caractères',

            'description.required'=> 'Le champ titre ne doit pas etre vide',
        ];

       $upd = Headerpage::where('id', $id);
                $request->validate([
                    'title'=>'required|min:3|max:250',
                    'description'=>'required'
                ],$message_fr);

        $upd->update([
                'title' => $title,
                'description' => $description,
                'status' => $status
            ]);
            return redirect(route('listheaderpage'));

    }

    //Insertion de nouvelle donne si ce trouve les tables non pas de donnees
    public function newdata(){
        $user = '1';
        $today = now();

        $data = Headerpage::insert([
            [
                'title' => 'WE OFFER DIFFERENT SERVICES',
                'description' => 'We have the service you need, with international quality.',
                'page' => '1',
                'status' => '0',
                'langues' => '1',
                'level' => 'b',
                'iduser' => $user,
                'created_at'=>$today,
            ],
            [
                'title' => 'ABOUT US',
                'description' => 'We are 100% dedicated to customer satisfaction and relationship built on trust',
                'page' => '2',
                'status' => '0',
                'langues' => '1',
                'level' => 'a',
                'iduser' => $user,
                'created_at'=>$today,
            ],
            [
                'title' => 'MEET OUR ADVISORS',
                'description' => 'Our team is made up of people passionate about technology and business management. Indeed, a wide range of skills and expertise is needed to provide the best solution to our clients in all areas of Information Technology and consulting.',
                'page' => '2',
                'status' => '0',
                'langues' => '1',
                'level' => 'b',
                'iduser' => $user,
                'created_at'=>$today,
            ],
            [
                'title' => 'SERVICES',
                'description' => 'We offer quality service, tailored to your needs. Join us.',
                'page' => '3',
                'status' => '0',
                'langues' => '1',
                'level' => 'a',
                'iduser' => $user,
                'created_at'=>$today,
            ],
            [
                'title' => 'WE OFFER DIFFERENT SERVICES',
                'description' => 'We have a wide range of quality services at the best price',
                'page' => '3',
                'status' => '0',
                'langues' => '1',
                'level' => 'b',
                'iduser' => $user,
                'created_at'=>$today,
            ],
            [
                'title' => 'PROJECTS',
                'description' => 'They are all satisfied with our achievements. Take a look.',
                'page' => '4',
                'status' => '0',
                'langues' => '1',
                'level' => 'a',
                'iduser' => $user,
                'created_at'=>$today,
            ],
            [
                'title' => 'OUR LATEST WORK',
                'description' => 'Find our latest achievements, in all areas such as: security, data management, installation etc. Our customers are all over the country.',
                'page' => '4',
                'status' => '0',
                'langues' => '1',
                'level' => 'b',
                'iduser' => $user,
                'created_at'=>$today,
            ],
            [
                'title' => 'BLOG',
                'description' => 'Meet',
                'page' => '5',
                'status' => '0',
                'langues' => '1',
                'level' => 'a',
                'iduser' => $user,
                'created_at'=>$today,
            ],
            [
                'title' => 'CONTACT US',
                'description' => 'Contact us for any questions or suggestions',
                'page' => '6',
                'status' => '0',
                'langues' => '1',
                'level' => 'a',
                'iduser' => $user,
                'created_at'=>$today,
            ],
            [
                'title' => 'GET IN TOUCH WITH US',
                'description' => 'Join our support team, available six (6) days',
                'page' => '6',
                'status' => '0',
                'langues' => '1',
                'level' => 'b',
                'iduser' => $user,
                'created_at'=>$today,
            ],
            [
                'title' => 'LEAVE A COMMENT',
                'description' => 'Leave comments or questions about the services that interest you.',
                'page' => '6',
                'status' => '0',
                'langues' => '1',
                'level' => 'c',
                'iduser' => $user,
                'created_at'=>$today,
            ],
            [
                'title' => 'Our Business Partners',
                'description' => 'That interest you.',
                'page' => '7',
                'status' => '0',
                'langues' => '1',
                'level' => 'a',
                'iduser' => $user,
                'created_at'=>$today,
            ]
        ]);

       if($data == true){
           return redirect()->route('listheaderpage');
       }else{
           return 'erreur';
       }

    }

}
