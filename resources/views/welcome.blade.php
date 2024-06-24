<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <meta property="og:title" content="Jungle - didakoo games" />
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
    <title>Jungle - didakoo games</title>
    <link rel="shortcut icon" href="{{asset('images/metamask_login_avatar.png')}}" />
    <script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
{{--    <link rel="shortcut icon" href="https://cdn.iconscout.com/icon/free/png-256/free-avatar-370-456322.png?f=webp&w=256" />--}}

    <style>

        :root {
            --bg: #ccc;
            --fill: rgb(238, 94, 129);
        }

        .hourglass {
            display: block;
            margin: 3em auto;
            width: 2em;
            height: 4em;
            animation: hourglass 1s linear infinite;
        }

        .outer {
            fill: var(--fill);
        }


        @keyframes hourglass {
            0% {
                transform: rotate(0deg);
                box-shadow:
                    inset var(--fill) 0 -0em 0 0,
                    inset var(--bg) 0 -2em 0 0,
                    inset var(--fill) 0 -4em 0 0;
            }
            80% {
                transform: rotate(0deg);
                box-shadow:
                    inset var(--fill) 0 -2em 0 0,
                    inset var(--bg) 0 -2em 0 0,
                    inset var(--fill) 0 -2em 0 0;
            }
            100% {
                transform: rotate(180deg);
                box-shadow:
                    inset var(--fill) 0 -2em 0 0,
                    inset var(--bg) 0 -2em 0 0,
                    inset var(--fill) 0 -2em 0 0;
            }
        }
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
            align-items: center;
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

    </style>

</head>

<body>

<div id="loader" class="loading-container">
    <div class="load-container">
        <div class="wrapper">
            <svg class="hourglass" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 120 206" preserveAspectRatio="none">
                <path class="middle" d="M120 0H0v206h120V0zM77.1 133.2C87.5 140.9 92 145 92 152.6V178H28v-25.4c0-7.6 4.5-11.7 14.9-19.4 6-4.5 13-9.6 17.1-17 4.1 7.4 11.1 12.6 17.1 17zM60 89.7c-4.1-7.3-11.1-12.5-17.1-17C32.5 65.1 28 61 28 53.4V28h64v25.4c0 7.6-4.5 11.7-14.9 19.4-6 4.4-13 9.6-17.1 16.9z"/>
                <path class="outer" d="M93.7 95.3c10.5-7.7 26.3-19.4 26.3-41.9V0H0v53.4c0 22.5 15.8 34.2 26.3 41.9 3 2.2 7.9 5.8 9 7.7-1.1 1.9-6 5.5-9 7.7C15.8 118.4 0 130.1 0 152.6V206h120v-53.4c0-22.5-15.8-34.2-26.3-41.9-3-2.2-7.9-5.8-9-7.7 1.1-2 6-5.5 9-7.7zM70.6 103c0 18 35.4 21.8 35.4 49.6V192H14v-39.4c0-27.9 35.4-31.6 35.4-49.6S14 81.2 14 53.4V14h92v39.4C106 81.2 70.6 85 70.6 103z"/>
            </svg>
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
                }, 175);

                setTimeout(function () {
                    $('.g3').toggleClass('moveg3');
                }, 350);

                setTimeout(function () {
                    $('.g4').toggleClass('moveg4');
                }, 525);

                setTimeout(function () {
                    $('.g2').toggleClass('moveg2');
                }, 700);

                setTimeout(function () {
                    $('.g6').toggleClass('moveg6');
                }, 875);

                setTimeout(function () {
                    $('.g5').toggleClass('moveg5');
                }, 1050);

                setTimeout(function () {
                    $('.g7').toggleClass('moveg7');
                }, 1225);

                setTimeout(function () {
                    $('.g9').toggleClass('moveg9');
                }, 1400);

                setTimeout(function () {
                    $('.g8').toggleClass('moveg8');
                }, 1575);

                setTimeout(function () {
                    $('.g10').toggleClass('moveg10');
                }, 1750);

                setTimeout(function () {
                    rotation += 45;
                    $('#container').rotate(rotation);
                }, 1925);

                setTimeout(function () {
                    rotation += 45;
                    $('#container').rotate(rotation);
                }, 2100);

                setTimeout(function () {
                    rotation += 45;
                    $('#container').rotate(rotation);
                }, 2275);

                setTimeout(function () {
                    rotation += 45;
                    $('#container').rotate(rotation);
                }, 2450);

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
                }, 2625);
            }, 2625);
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
        }, 175);

        //Order - 1,3,4,2,6,5,7,9,8,10

        setTimeout(function () {
            $('.g1').toggleClass('moveg1');
        }, 175);

        setTimeout(function () {
            $('.g3').toggleClass('moveg3');
        }, 350);

        setTimeout(function () {
            $('.g4').toggleClass('moveg4');
        }, 525);

        setTimeout(function () {
            $('.g2').toggleClass('moveg2');
        }, 700);

        setTimeout(function () {
            $('.g6').toggleClass('moveg6');
        }, 875);

        setTimeout(function () {
            $('.g5').toggleClass('moveg5');
        }, 1050);

        setTimeout(function () {
            $('.g7').toggleClass('moveg7');
        }, 1225);

        setTimeout(function () {
            $('.g9').toggleClass('moveg9');
        }, 1400);

        setTimeout(function () {
            $('.g8').toggleClass('moveg8');
        }, 1575);

        setTimeout(function () {
            $('.g10').toggleClass('moveg10');
        }, 1750);

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
        }, 1925);

        setTimeout(function () {
            rotation += 45;
            $('#container').rotate(rotation);
        }, 2100);

        setTimeout(function () {
            rotation += 45;
            $('#container').rotate(rotation);
        }, 2275);

        setTimeout(function () {
            rotation += 45;
            $('#container').rotate(rotation);
        }, 2450);

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
        }, 2625);

    });

</script>

    <div id="app">

    </div>
</body>
<script>
    window.laravel_echo_port='{{env("LARAVEL_ECHO_PORT")}}';
</script>
</html>
