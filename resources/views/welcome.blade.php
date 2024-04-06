<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <meta property="og:title" content="didakoo games" />
    <meta property="og:type" content="website" />
    <meta property="og:image" content=" https://i.imgur.com/NerES9J.jpeg" />
    <meta property="og:url" content="https://didakoo.com" />
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lottie-web/5.9.4/lottie.js"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/abf919e747.js" crossorigin="anonymous"></script>
    <script src="https://cdn.ethers.io/lib/ethers-5.2.umd.min.js"></script>
    <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet" />
    <title>didakoo games</title>
    <link rel="shortcut icon" href="{{asset('images/metamask_login_avatar.png')}}" />
    <script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
{{--    <link rel="shortcut icon" href="https://cdn.iconscout.com/icon/free/png-256/free-avatar-370-456322.png?f=webp&w=256" />--}}

    <style>
        #loader {
            z-index: 999;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .loading-container {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
        }

        .load-container{
            display: flex;
            flex-direction: column-reverse;
            gap: 20px;
        }

        .image-container{
            display: flex;
        }

        .image-elephant{
            width: 110px;
            height: 110px;
            @media (max-width: 720px){
            width: 95px;
            height: 95px;
        };
        }

        #container{
            width: 104px;
            height: 176px;
        }

        #hourglass{
            width: 104px;
            margin: 0 auto;
        }

        #sand{
            margin: 0 auto;
            width: 56px;
            height: 120px;
            position: relative;
            top: -144px;
        }

        .grain {
            background-color: black;
            height: 8px;
            width: 8px;
            position: absolute;
        }

        .a, .b, .c, .d, .e, .f{
            background-color: #FFFFFF;
            height: 8px;
            margin: 0 auto;
        }

        .a, .b, .c, .d, .e, .f{
            border-right: 14px solid black;
            border-left: 14px solid black;
        }

        .a{
            width: 92px;
            height: 20px;
            border-top: 7px solid black;
            border-bottom: 7px solid black;
        }

        .b{
            width: 78px;
            height: 32px;
            border-right: 8px solid black;
            border-left: 8px solid black;
        }

        .c{width: 78px;}
        .d{width: 64px;}
        .e{width: 50px;}
        .f{width: 36px;}

        .g1{top: 0;left: 0;}
        .g2{top: 0;left: 16px;}
        .g3{top: 0;left: 32px;}
        .g4{top: 0;left: 48px;}
        .g5{top: 8px;left: 8px;}
        .g6{top: 8px;left: 24px;}
        .g7{top: 8px;left: 40px;}
        .g8{top: 16px;left: 16px;}
        .g9{top: 16px;left: 32px;}
        .g10{top: 24px;left: 24px;}
        .g11{top: 40px;left: 24px;}
        .g12{top: 64px;left: 24px;}
        .g13{top: 72px;left: 24px;}

        .hide{
            display: none;
        }

        .moveg1{
            left: 16px;
            top: 112px;
        }

        .moveg2{
            left: 48px;
            top: 112px;
        }

        .moveg3{
            top: 112px;
        }

        .moveg4{
            left: 24px;
            top: 104px;
        }

        .moveg5{
            top: 112px;
            left: 0;
        }

        .moveg6{
            left: 8px;
            top: 104px;
        }

        .moveg7{
            top: 104px;
        }

        .moveg8{
            top: 96px;
        }

        .moveg9{
            top: 96px;
        }

        .moveg10{
            top: 88px;
        }

    </style>

</head>

<body>

<div id="loader" class="loading-container">
    <div class="load-container">
        <div id="container" class="center">
            <div id="hourglass">
                <div class="a"></div>
                <div class="b"></div>
                <div class="c"></div>
                <div class="d"></div>
                <div class="e"></div>
                <div class="f"></div>
                <div class="f"></div>
                <div class="e"></div>
                <div class="d"></div>
                <div class="c"></div>
                <div class="b"></div>
                <div class="a"></div>
            </div>
            <div id="sand">
                <div class="grain g1"></div>
                <div class="grain g2"></div>
                <div class="grain g3"></div>
                <div class="grain g4"></div>
                <div class="grain g5"></div>
                <div class="grain g6"></div>
                <div class="grain g7"></div>
                <div class="grain g8"></div>
                <div class="grain g9"></div>
                <div class="grain g10"></div>
                <div class="grain g11"></div>
                <div class="grain g12 hide"></div>
                <div class="grain g13"></div>
            </div>
        </div>
        <div class="image-container">
            <img class="image-elephant" src="../images/board/animals/elephant_4.png">
        </div>
    </div>
</div>


<script>

    $(document).ready(function () {
            for (let i = 0; i < 1; i++) {
                setInterval(function () {
                    setTimeout(function () {
                        $('.g1').toggleClass('moveg1');
                    }, 350);

                    setTimeout(function () {
                        $('.g3').toggleClass('moveg3');
                    }, 700);

                    setTimeout(function () {
                        $('.g4').toggleClass('moveg4');
                    }, 1050);

                    setTimeout(function () {
                        $('.g2').toggleClass('moveg2');
                    }, 1400);

                    setTimeout(function () {
                        $('.g6').toggleClass('moveg6');
                    }, 1750);

                    setTimeout(function () {
                        $('.g5').toggleClass('moveg5');
                    }, 2100);

                    setTimeout(function () {
                        $('.g7').toggleClass('moveg7');
                    }, 2450);

                    setTimeout(function () {
                        $('.g9').toggleClass('moveg9');
                    }, 2800);

                    setTimeout(function () {
                        $('.g8').toggleClass('moveg8');
                    }, 3150);

                    setTimeout(function () {
                        $('.g10').toggleClass('moveg10');
                    }, 3500);

                    setTimeout(function () {
                        rotation += 45;
                        $('#container').rotate(rotation);
                    }, 3850);

                    setTimeout(function () {
                        rotation += 45;
                        $('#container').rotate(rotation);
                    }, 4200);

                    setTimeout(function () {
                        rotation += 45;
                        $('#container').rotate(rotation);
                    }, 4550);

                    setTimeout(function () {
                        rotation += 45;
                        $('#container').rotate(rotation);
                    }, 4900);

                    setTimeout(function () {
                        rotation += 180;
                        $('#container').rotate(rotation);
                        $('.g1').toggleClass('moveg1');
                        $('.g2').toggleClass('moveg2');
                        $('.g3').toggleClass('moveg3');
                        $('.g4').toggleClass('moveg4');
                        $('.g5').toggleClass('moveg5');
                        $('.g6').toggleClass('moveg6');
                        $('.g7').toggleClass('moveg7');
                        $('.g8').toggleClass('moveg8');
                        $('.g9').toggleClass('moveg9');
                        $('.g10').toggleClass('moveg10');
                    }, 5250);
                }, 5250);
            }

            setInterval(function () {
                $('.g12').toggleClass('hide');

                if ($('.g12').hasClass('hide')) {
                    $('.g11').removeClass('hide');
                    $('.g13').removeClass('hide');
                } else {
                    $('.g11').addClass('hide');
                    $('.g13').addClass('hide');
                }
            }, 350);

            //Order - 1,3,4,2,6,5,7,9,8,10

            setTimeout(function () {
                $('.g1').toggleClass('moveg1');
            }, 350);

            setTimeout(function () {
                $('.g3').toggleClass('moveg3');
            }, 700);

            setTimeout(function () {
                $('.g4').toggleClass('moveg4');
            }, 1050);

            setTimeout(function () {
                $('.g2').toggleClass('moveg2');
            }, 1400);

            setTimeout(function () {
                $('.g6').toggleClass('moveg6');
            }, 1750);

            setTimeout(function () {
                $('.g5').toggleClass('moveg5');
            }, 2100);

            setTimeout(function () {
                $('.g7').toggleClass('moveg7');
            }, 2450);

            setTimeout(function () {
                $('.g9').toggleClass('moveg9');
            }, 2800);

            setTimeout(function () {
                $('.g8').toggleClass('moveg8');
            }, 3150);

            setTimeout(function () {
                $('.g10').toggleClass('moveg10');
            }, 3500);

            var rotation = 0;
            jQuery.fn.rotate = function (degrees) {
                $(this).css({
                    '-webkit-transform': 'rotate(' + degrees + 'deg)',
                    '-moz-transform': 'rotate(' + degrees + 'deg)',
                    '-ms-transform': 'rotate(' + degrees + 'deg)',
                    'transform': 'rotate(' + degrees + 'deg)'
                });
            };

            setTimeout(function () {
                rotation += 45;
                $('#container').rotate(rotation);
            }, 3850);

            setTimeout(function () {
                rotation += 45;
                $('#container').rotate(rotation);
            }, 4200);

            setTimeout(function () {
                rotation += 45;
                $('#container').rotate(rotation);
            }, 4550);

            setTimeout(function () {
                rotation += 45;
                $('#container').rotate(rotation);
            }, 4900);

            setTimeout(function () {
                rotation += 180;
                $('#container').rotate(rotation);
                $('.g1').toggleClass('moveg1');
                $('.g2').toggleClass('moveg2');
                $('.g3').toggleClass('moveg3');
                $('.g4').toggleClass('moveg4');
                $('.g5').toggleClass('moveg5');
                $('.g6').toggleClass('moveg6');
                $('.g7').toggleClass('moveg7');
                $('.g8').toggleClass('moveg8');
                $('.g9').toggleClass('moveg9');
                $('.g10').toggleClass('moveg10');
            }, 5250);

    });

</script>

    <div id="app">

    </div>
</body>
<script>
    window.laravel_echo_port='{{env("LARAVEL_ECHO_PORT")}}';
</script>
</html>
