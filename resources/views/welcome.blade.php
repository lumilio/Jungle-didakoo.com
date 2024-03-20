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
            display: block;
        }

        .loading-container {
            position: fixed;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            z-index: 999;
        }

        .load-container {
            width: 100%;
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        canvas {
            border: 3px solid white;
            border-radius: 5px;
            margin-bottom: 20px;
        }

        .ready-text {
            color: white;
            font-size: 16px;
            font-family: VT323, monospace;
        }
    </style>

</head>

<body>

<div id="loader" class="loading-container">
    <div class="load-container">
        <div class="load-container">
            <canvas id="batteryCanvas" width="120" height="32"></canvas>
            <p class="ready-text">Ready in a few seconds ...</p>
        </div>
    </div>
</div>



<script>
    const canvas = document.getElementById('batteryCanvas');
    const ctx = canvas.getContext('2d');
    let batteryLevel = 0;

    function drawBattery() {
        ctx.clearRect(0, 0, canvas.width, canvas.height);

        ctx.strokeStyle = 'white';
        ctx.stroke();

        ctx.fillStyle = 'green';
        for (let i = 0; i < 10; i++) {
            if (isActive(i)) {
                ctx.fillRect(9 * i + 5 + 2 * i, 4, 7, 24);
            }
        }
    }

    function isActive(i) {
        return i === 9 ? batteryLevel >= (i + 1) * 10 : batteryLevel >= (i + 1) * 10 - 5;
    }

    function chargeBattery() {
        let interval = setInterval(() => {
            batteryLevel += 5;
            if (batteryLevel >= 100) {
                clearInterval(interval);
                setTimeout(() => {
                    batteryLevel = 0;
                    chargeBattery();
                }, 1000);
            }
            drawBattery();
        }, 180);
    }

    chargeBattery();
</script>

    <div id="app">

    </div>
</body>
<script>
    window.laravel_echo_port='{{env("LARAVEL_ECHO_PORT")}}';
</script>
</html>
