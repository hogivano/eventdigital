<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>@yield("title")</title>
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="responsive web">
    <link href="https://fonts.googleapis.com/css?family=Crimson+Text|Padauk" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/headerfooter.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    @yield("link")
</head>
<!-- <header>
    <nav class="navbar navbar-inverse navbar-static-top" style="background-color:#00000f; padding-top: 20px; padding-bottom: 20px">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="/">
                        <img alt="Brand" width="200px" src="http://192.168.0.29:8000/logo.png">
                </a>
            </div>
        </div>
    </nav>
</header> -->

<body>
    @yield("content")

    <!--Footer-->

    <!-- <footer class="" style="background-color:#000000; color:ghostwhite"> -->

        <!--Footer Links-->
        
        <!-- <div class="container text-center text-md-left">
            <div class="row">
                <div class="col-md-4">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="text-center sosmed">
                                <ul class="list-unstyled list-inline">
                                    <li class="list-inline-item">
                                        <a class="btn-floating btn-sm btn-fb mx-1 white" href="https://www.facebook.com/EventJogjakarta/" target="_blank">
                                            <i class="fa fa-facebook"> </i>
                                        </a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a class="btn-floating btn-sm btn-tw mx-1 white" href="https://twitter.com/eventyogyakarta" target="_blank">
                                            <i class="fa fa-twitter"> </i>
                                        </a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a class="btn-floating btn-sm btn-li mx-1 white" href="https://www.instagram.com/eventyogyakartaid/" target="_blank">
                                            <i class="fa fa-instagram"> </i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-md-12" class="center-block" style="text-align:center; margin-top: 30px">
                                <a href="#" style="margin-left: 70px">
                                    <img src="http://192.168.0.29:8000/sosmed/playstore.png" width="200px" alt="">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <hr class="clearfix w-100 d-md-none">

                <div class="col-md-2 mx-auto">
                    <h5 class="text-uppercase mb-4 mt-3 font-weight-bold">About</h5>
                    <ul class="list-unstyled">
                        <li>
                            <a href="/tentang" class="text-15" style="color: ghostwhite">Tentang Kami</a>
                        </li>
                        <li>
                            <a href="/kontak" class="text-15" style="color: ghostwhite">Kontak Kami</a>
                        </li>
                    </ul>
                </div>

                <hr class="clearfix w-100 d-md-none">
            </div>
        </div>

        <div class="footer-copyright py-3 text-center text-12" style="background-color:black; padding-left: 20px;">
            Copyright © 2018
        </div>
    </footer> -->
    <!--/.Footer-->
</body>
@yield("script")

</html>
