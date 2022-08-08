<!DOCTYPE html>
    <html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="icon" href="{{ URL::asset('assets/img/logo/favicon.png') }}" type="image/x-icon"/>
        <title>Admin | @yield('title')</title>
        <style>
            /*ce style est pour les LI de TinyCME */
            .persoimage ul, .persoimage li{
                list-style-type: none;
                {{--list-style-image: url('{{asset('')}}assets/img/logo/small-logo.png');--}}
                margin: 0;
                padding-left: 15px;
                /*padding: 36px 0 36px 84px;*/
                background-image: url('{{asset('assets/img/logo/small-logo.png')}}');
                background-repeat: no-repeat;
                background-position: left center;
                background-size: 10px;
            }
            .monpa {
                margin: 0px 0px 0px 0px;
                padding: 0px 0px 0px 0px;
            }



        </style>




        <!-- BOOTSTRAP STYLES-->
        <link href="{{asset('assets/assetsadm/css/bootstrap.css')}}" rel="stylesheet" />
        <link href="{{asset('assets/assetsadm/css/')}}" rel="stylesheet" />
        <!-- FONTAWESOME STYLES-->
        <link href="{{asset('assets/assetsadm/css/font-awesome.css')}}" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
        <link href="{{asset('assets/assetsadm/css/custom.css')}}" rel="stylesheet" />
        <!-- GOOGLE FONTS-->
        <script src="{{asset('assets/js/tinymce/tinymce.min.js')}}"></script>

        <style>
            .imgslideshowadmin{
                width:100px;
            }
            .imgslideshowadmin{
                width:50px;
            }
        </style>
    </head>
<body>



<div id="wrapper">

    @include('template.menuadm')

    <div id="page-wrapper" >
        <div id="page-inner">
            <div class="row">

                <script>
                    tinymce.init({
                        mode : "txtdesc",
                        selector : "textarea:not(.myTextEditor)",// choisi tou sauf ce la class nom est myTextEditor
                        plugins: [
                            "textcolor",
                            "advlist autolink lists link charmap",
                            "searchreplace code",
                            "insertdatetime  table contextmenu paste"
                        ],
                        toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | forecolor link charmap ",
                        removed_menuitems: "newdocument",

                        color_picker_callback: function(callback, value) {
                            callback('#FF00FF');
                        },

                        extended_valid_elements:"ul[class=persoimage],h1[id=presoh1],h2[id=presoh2],h3[id=presoh3],p[class=monpa]",
                        //extended_valid_elements:"ul[class=persoimage]",


                    });
                </script>

            @yield('admincontenent')



            </div>
            <!-- /. ROW  -->
            <hr />

        </div>
        <!-- /. PAGE INNER  -->
    </div>
    <!-- /. PAGE WRAPPER  -->
</div>
<!-- /. WRAPPER  -->
<!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
<!-- JQUERY SCRIPTS -->

<script src="{{asset('assets/assetsadm/js/jquery-1.10.2.js')}}"></script>
<!-- BOOTSTRAP SCRIPTS -->
<script src="{{asset('assets/assetsadm/js/bootstrap.min.js')}}"></script>
<!-- METISMENU SCRIPTS -->
<script src="{{asset('assets/assetsadm/js/jquery.metisMenu.js')}}"></script>
<!-- CUSTOM SCRIPTS -->
<script src="{{asset('assets/assetsadm/js/custom.js')}}"></script>


</body>
</html>
