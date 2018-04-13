@extends("layouts.headerfooter")
@section("title")
    Internal Server Error
@endsection
@section("link")
    <link rel="stylesheet" type="text/css" href="{{url('/css/error.css')}}">
@endsection
@section("content")
        <!-- Error Page -->
        <div class="c404">
            <div class="error">
                <div class="container-floud">
                    <div class="col-xs-12 ground-color text-center">
                        <div class="container-error-404">
                            <div class="clip"><div class="shadow"><span class="digit thirdDigit"></span></div></div>
                            <div class="clip"><div class="shadow"><span class="digit secondDigit"></span></div></div>
                            <div class="clip"><div class="shadow"><span class="digit firstDigit"></span></div></div>
                            <!-- <div class="msg">OH!<span class="triangle"></span></div> -->
                        </div>
                        <h2 class="h1">Internal Server Error</h2>
                    </div>
                </div>
            </div>
        </div>
        <!-- Error Page -->
@endsection
@section("script")
    <script type="text/javascript">
    function randomNum()
    {
        "use strict";
        return Math.floor(Math.random() * 9)+1;
    }
        var loop1,loop2,loop3,time=30, i=0, number, selector3 = document.querySelector('.thirdDigit'), selector2 = document.querySelector('.secondDigit'),
            selector1 = document.querySelector('.firstDigit');
        loop3 = setInterval(function()
        {
          "use strict";
            if(i > 40)
            {
                clearInterval(loop3);
                selector3.textContent = 5;
            }else
            {
                selector3.textContent = randomNum();
                i++;
            }
        }, time);
        loop2 = setInterval(function()
        {
          "use strict";
            if(i > 80)
            {
                clearInterval(loop2);
                selector2.textContent = 0;
            }else
            {
                selector2.textContent = randomNum();
                i++;
            }
        }, time);
        loop1 = setInterval(function()
        {
          "use strict";
            if(i > 100)
            {
                clearInterval(loop1);
                selector1.textContent = 0;
            }else
            {
                selector1.textContent = randomNum();
                i++;
            }
        }, time);
    </script>
@endsection
