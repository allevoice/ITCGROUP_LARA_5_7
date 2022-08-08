<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::fallback(function (){
    return view('404');
});


//abort(404,'What code view');

//Route::get('/', 'HomeController@index')->name('home');

Route::get('/', 'HomeController@index')->name('home');
Route::get('/partner', 'HomeController@parnerliste')->name('parnerliste');
Route::get('/services', 'HomeController@serviceofferthome')->name('services');
Route::get('/service_detail/{code}', 'HomeController@servicedetailshome')->name('service_details');
Route::get('/about', 'HomeController@aboutpage')->name('about');
Route::get('/projet', 'HomeController@projetpage')->name('projects');
Route::get('/blog/', 'HomeController@blogpage')->name('blog');
Route::get('/blog/{id}', 'HomeController@blogpage')->name('blogid');

Route::post('contact', 'HomeController@contactpage')->name('smssend');
Route::get('contact', 'HomeController@contactview')->name('contact');
Route::get('contactsusscess', 'HomeController@successmessage')->name('successms');


/*========================Les routes de NEWSLETTER Page Information Start===============================*/
Route::post('/addnewsletter','HomeController@newsletter')->name('addnewsletter');
/*========================Les routes de NEWSLETTER Page Information Start===============================*/



Route::post('lang', function () {
    return 'Change langues';
})->name('langchange');


/*========================LOGIN PANEL START===============================*/
Route::get('logpanel','HomeController@loginperso')->name('logpersoform');
Route::post('accessscommande','HomeController@logsubmit')->name('logpersocmd');
Route::get('logout','HomeController@logoutaction')->name('logoutpast');
/*========================LOGIN PANEL END===============================*/

/*========================LOGIN USER START===============================*/
Route::get('login', 'HomeController@loginview')->name('loginpage');
Route::post('access', 'HomeController@logaction')->name('logaccess');
/*========================LOGIN USER END===============================*/


/*========================FORGET LOGIN PANEL START===============================*/
Route::get('forgetpass', 'HomeController@loginforgetpassview')->name('forgetpass');
Route::post('passerror', 'HomeController@logactionerror')->name('logpasserror');
Route::get('forgetpassword/{key}', 'HomeController@passrecovery')->name('passrecovery');
Route::put('Resetpass/{data}','AccountController@updatepasspublic')->name('uppasscmdpublic');
/*========================FORGET LOGIN PANEL END===============================*/






//ADMIN PAGES

//Route::get('/panel','DashpageController@index')->name('adminpage')->middleware('persolog');

Route::middleware('persolog')->group(function () {
    /*========================MIDDLEWARE START===============================*/

    Route::get('/panel','DashpageController@index')->name('adminpage');


    /*========================Les routes de NEWSLETTER Page Information Start===============================*/
    Route::resource('account','AccountController')->names([
        'index'=> 'lstaccount',
        'show',
        'create'=> 'newaccount',
        'store'=>'insertnewaccount',
        'edit'=>'editaccount',
        'update'=>'updateaccount',
        'destroy'=>'delaccount'
    ]);

    Route::get('actuppass/{id}','AccountController@uppass')->name('uppassview');
    Route::get('editccountperso/{id}','AccountController@persoview')->name('persoedit');
    Route::put('accountuppass/{data}','AccountController@updatepass')->name('uppasscmd');


    Route::get('/accountviewdel','AccountController@sofderestore')->name('sldaccountlstdel');
    Route::get('/restoresldaccount/{id}','AccountController@restoredestroy')->name('restdelsldaccount');
    Route::delete('/destoresldaccount/{id}','AccountController@destoredefinitely')->name('sldaccountdelete');

    /*========================Les routes de NEWSLETTER Page Information Start===============================*/



    /*========================Les routes de NEWSLETTER Page Information Start===============================*/

    Route::get('/newsletter','NewsletterController@index')->name('lstnewsletter');
    Route::delete('/newsletter/{id}','NewsletterController@destroy')->name('delnewsletter');

    /*========================Les routes de NEWSLETTER Page Information Start===============================*/





    /*========================Les routes de MESSAGES Page Information Start===============================*/
    Route::get('/message','MessagingController@index')->name('smsliste');
    Route::delete('/messagedel/{id}','MessagingController@destroy')->name('delsmslistedel');
    Route::delete('/messagedelperment/{id}','MessagingController@destoredefinitely')->name('delsmsedel');
    Route::get('/messagerestore/{id}','MessagingController@restoredestroy')->name('restoredelsmsedel');
    Route::get('/messagedelliste','MessagingController@sofderestore')->name('smslistedel');
    /*========================Les routes de MESSAGES Page Information Start===============================*/


    /*========================Les routes de footer Page Information Start===============================*/
    Route::resource('footerdata','FooterpageController')->names([
        'index'=> 'listfooterdata',
        'show',
        'create',
        'store',
        'edit'=>'editfooterdata',
        'update' =>'footerupdatedata',
        'destroy'
    ]);
    Route::get('/newdatafooterdata','FooterpageController@newdata')->name('addstfooterdata');
    /*========================Les routes de footer Page Information END===============================*/




    /*========================Les routes de Slide Login Start===============================*/
    Route::resource('slidelogindata','SlideloginController')->names([
        'index'=> 'listsldlogin',
        'show',
        'create'=> 'newsldlogin',
        'store'=>'insertsldlogin',
        'edit'=>'editsldlogin',
        'update' =>'addupdsldlogin',
        'destroy'=>'delsldlogin'
    ]);
    Route::get('/newdatasldlogin','SlideloginController@newdata')->name('addstsldlogin');
    Route::get('/sldloginviewdel','SlideloginController@sofderestore')->name('sldloginlstdel');
    Route::get('/restoresldlogin/{id}','SlideloginController@restoredestroy')->name('restdelsldlogin');
    Route::delete('/destoresldlogin/{id}','SlideloginController@destoredefinitely')->name('sldlogindelete');
    /*========================Les routes de Slide Login END===============================*/



    /*========================Les routes de Slide header Start===============================*/
    Route::resource('slideheaderdata','SlideheaderController')->names([
        'index'=> 'listsldheader',
        'show',
        'create'=> 'newsldheader',
        'store'=>'insertsldheader',
        'edit'=>'editsldheader',
        'update' =>'addupdsldheader',
        'destroy'=>'delsldheaderg'
    ]);
    Route::get('/newdatasldheader','SlideheaderController@newdata')->name('addstsldheader');
    Route::get('/sldheaderviewdel','SlideheaderController@sofderestore')->name('sldheaderlstdel');
    Route::get('/restoresldheader/{id}','SlideheaderController@restoredestroy')->name('restdelsldheader');
    Route::delete('/destoresldheader/{id}','SlideheaderController@destoredefinitely')->name('sldheaderdelete');
    /*========================Les routes de Slide header END===============================*/



    /*========================Les routes de blogue Start===============================*/
    Route::resource('bloguedata','BlogueController')->names([
        'index'=> 'listblog',
        'show',
        'create'=> 'newblog',
        'store'=>'insertblog',
        'edit'=>'editblog',
        'update' =>'addupdblog',
        'destroy'=>'delblog'
    ]);
    Route::get('/newdatablogdata','BlogueController@newdata')->name('addstblog');
    Route::get('/blogimg/{slug}','BlogueController@updimages')->name('editimgdatablog');
    Route::get('/blogviewdel','BlogueController@sofderestore')->name('bloglstdel');
    Route::get('/restoreblog/{id}','BlogueController@restoredestroy')->name('restdelblog');
    Route::delete('/destoreblog/{id}','BlogueController@destoredefinitely')->name('blogdelete');
    /*========================Les routes de blogue END===============================*/



    /*========================Les routes de Projet Start===============================*/
    Route::resource('projectdata','ProjectController')->names([
        'index'=> 'listprojectdata',
        'show',
        'create'=> 'newprojectdata',
        'store'=>'insertprojectdata',
        'edit'=>'editprojectdata',
        'update' =>'addupdprojectdata',
        'destroy'=>'delprojectdata'
    ]);
    Route::get('/newdataprojectdata','ProjectController@newdata')->name('addstprojectdata');
    Route::get('/projectdataimg/{slug}','ProjectController@updimages')->name('editimgdataprojectdata');
    Route::get('/projectdataviewdel','ProjectController@sofderestore')->name('projectdatalstdel');
    Route::get('/restoreprojectdata/{id}','ProjectController@restoredestroy')->name('restdelprojectdata');
    Route::delete('/destoreprojectdata/{id}','ProjectController@destoredefinitely')->name('projectdatadelete');
    /*========================Les routes de Projet END===============================*/


    /*========================Les routes de advisor Start===============================*/
    Route::resource('advisor','AdvisorController')->names([
        'index'=> 'listadvisor',
        'show',
        'create'=> 'newadvisor',
        'store'=>'insertadvisor',
        'edit'=>'editadvisor',
        'update' =>'addupdadvisor',
        'destroy'=>'deladvisor'
    ]);
    Route::get('/newdataadvisor','AdvisorController@newdata')->name('addstadvisor');
    Route::get('/advisorimg/{slug}','AdvisorController@updimages')->name('editimgdataadvisor');
    Route::get('/advisorviewdel','AdvisorController@sofderestore')->name('advisorlstdel');
    Route::get('/restoreadvisor/{id}','AdvisorController@restoredestroy')->name('restdeladvisor');
    Route::delete('/destoreadvisor/{id}','AdvisorController@destoredefinitely')->name('advisordelete');
    /*========================Les routes de advisor END===============================*/



    /*========================Les routes de Founder Start===============================*/
    Route::resource('founder','FounderController')->names([
        'index'=> 'listfounder',
        'show',
        'create'=> 'newfounder',
        'store'=>'insertfounder',
        'edit'=>'editfounder',
        'update' =>'addupdfounder',
        'destroy'=>'delfounder'
    ]);
    Route::get('/newdatafounder','FounderController@newdata')->name('addstfounder');
    Route::get('/founderimg/{slug}','FounderController@updimages')->name('editimgdatafounder');
    Route::get('/founderviewdel','FounderController@sofderestore')->name('founderlstdel');
    Route::get('/restorefounder/{id}','FounderController@restoredestroy')->name('restdelfounder');
    Route::delete('/destorefounder/{id}','FounderController@destoredefinitely')->name('founderdelete');
    /*========================Les routes de Founder END===============================*/



    /*========================Les routes de Our Compagnie Start===============================*/
    Route::resource('ourcompagnie','OurcompagnieController')->names([
        'index'=> 'listourcmg',
        'show',
        'create'=> 'newourcmg',
        'store'=>'insertourcmg',
        'edit'=>'editourcmg',
        'update' =>'addupdourcmg',
        'destroy'=>'delourcmg'
    ]);
    Route::get('/newdataaddcompagnie','OurcompagnieController@newdata')->name('addstourcmg');
    Route::get('/ourcompagnieimg/{slug}','OurcompagnieController@updimages')->name('editimgdataourcmg');
    Route::get('/ourcompagniedel','OurcompagnieController@sofderestore')->name('ourcmglstdel');
    Route::get('/restoreourcompagnie/{id}','OurcompagnieController@restoredestroy')->name('restdelourcmg');
    Route::delete('/destoreourcompagnie/{id}','OurcompagnieController@destoredefinitely')->name('ourcmgdelete');
    /*========================Les routes de Our Compagnie END===============================*/



    /*========================Les routes de Header Page information   Start===============================*/
    Route::resource('headerpage','HeaderpageController')->names([
        'index'=> 'listheaderpage',
        'show',
        'create',
        'store',
        'edit'=>'editheaderpage',
        'update' =>'addupdheaderpage',
        'destroy'
    ]);
    Route::get('/newtataheaderpage','HeaderpageController@newdata')->name('newinsertemptyheaderpage');

    /*========================Les routes de Header Page information   END===============================*/



    /*========================Les routes de Slide show Start===============================*/
    Route::resource('slideadmin','HomesliderController')->names([
        'index'=> 'listslide',
        'show',
        'create'=> 'newslide',
        'store'=>'insertslide',
        'edit'=>'editslide',
        'update' =>'addupdslide',
        'destroy'=>'delslide'
    ]);
    Route::get('/imgupdateslide/{slug}','HomesliderController@updimages')->name('editimgdataslide');
    Route::get('/slidesadmindel','HomesliderController@sofderestore')->name('slidelstdel');
    Route::get('/restoreslideadmin/{id}','HomesliderController@restoredestroy')->name('restdelslide');
    Route::delete('/destoreslidesadmin/{id}','HomesliderController@destoredefinitely')->name('slidedelete');
    /*========================Les routes de Slide show END===============================*/



    /*========================Les routes de services Start===============================*/
    Route::resource('servicesadmin','ServiceoffertController')->names([
        'index'=> 'listserve',
        'show',
        'create'=> 'newserve',
        'store'=>'insertserve',
        'edit'=>'editserve',
        'update' =>'addupdserve',
        'destroy'=>'delserve'
    ]);
    Route::get('/imgupdate/{slug}','ServiceoffertController@updimages')->name('editimgdata');
    Route::get('/servicesadmindel','ServiceoffertController@sofderestore')->name('servelstdel');
    Route::get('/restoreservicesadmin/{id}','ServiceoffertController@restoredestroy')->name('restdelserve');
    Route::delete('/destoreservicesadmin/{id}','ServiceoffertController@destoredefinitely')->name('servedelete');
    /*========================Les routes de services END===============================*/



    /*========================Les routes de Bringing Start===============================*/
    Route::resource('bringing','BringingController')->names([
        'index'=> 'listbringing',
        'show',
        'create'=> 'newbringing',
        'store'=>'insertbringing',
        'edit'=>'editbringing',
        'update' =>'addupdbringing',
        'destroy'=>'delbringing'
    ]);
    Route::get('/bringdel','BringingController@sofderestore')->name('bringlstdel');
    Route::get('/restorebring/{id}','BringingController@restoredestroy')->name('restdelbringing');
    Route::delete('/destoredbring/{id}','BringingController@destoredefinitely')->name('bringingdelete');
    /*========================Les routes de Bringing END===============================*/



    /*========================Les routes de How are you Start===============================*/
    Route::resource('howareyou','HowareyouController')->names([
        'index'=> 'listhowareyou',
        'show',
        'create'=> 'newhowareyou',
        'store'=>'inserthowareyou',
        'edit'=>'edithowareyou',
        'update' =>'addupdhowareyou',
        'destroy'=>'delhowareyou'
    ]);
    Route::get('/del','HowareyouController@sofderestore')->name('listedelhowareyou');
    Route::get('/restoreshu/{id}','HowareyouController@restoredestroy')->name('restdelhowaru');
    Route::delete('/destoredhowareu/{id}','HowareyouController@destoredefinitely')->name('hoeudelete');
    /*========================Les routes de How are you END===============================*/




    /*========================Les routes de Helpingview Start===============================*/
    Route::resource('helpingview','HelpingviewController')->names([
        'index'=> 'listhelping',
        'show',
        'create'=> 'newhelping',
        'store'=>'inserthelping',
        'edit'=>'edithelping',
        'update' =>'addupdhelping',
        'destroy'=>'delhelping'
    ]);
    Route::get('/delhelping','HelpingviewController@sofderestore')->name('listedelhelping');
    Route::get('/restores/{id}','HelpingviewController@restoredestroy')->name('helpingrestoredele');
    Route::delete('/destoreds/{id}','HelpingviewController@destoredefinitely')->name('helpingdeletecomplete');
    /*========================Les routes de Helpingview END===============================*/




    /*========================Les routes de SKill Start===============================*/
    Route::resource('skill','SkillController')->names([
        'index'=> 'listskill',
        'show',
        'create'=> 'newskill',
        'store'=>'insertskill',
        'edit'=>'editskill',
        'update' =>'addupdskill',
        'destroy'=>'delskill'
    ]);
    Route::get('/delskill','SkillController@sofderestore')->name('listedelskill');
    Route::get('/restoreskill/{id}','SkillController@restoredestroy')->name('skillrestoredele');
    Route::delete('/destoredskill/{id}','SkillController@destoredefinitely')->name('skilldeletecomplete');
    /*========================Les routes de SKill END===============================*/





    /*========================Les routes de Partners Start===============================*/
    Route::resource('partners', 'PartnerController')->names([
        'index'=> 'listpartner',
        'show',
        'create'=> 'newpartner',
        'store'=>'insertpartner',
        'edit'=>'editpartner',
        'update' =>'addupdpartner',
        'destroy'=>'delpartner'
    ]);
    Route::get('/delpartener','PartnerController@sofderestore')->name('listedelpartener');
    Route::get('/restoredestroy/{id}','PartnerController@restoredestroy')->name('restoredelepartener');
    Route::delete('/destoredefinitely/{id}','PartnerController@destoredefinitely')->name('deletecompletepartener');
    /*========================Les routes de Partners END===============================*/



    /*========================MIDDLEWARE END===============================*/
});












