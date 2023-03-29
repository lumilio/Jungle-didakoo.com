<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
    <title>didakoo.jg 1.0 </title>
</head>

<body>
    <div id="app">
        <?php //print_r(session()->get('userSession'));
        ?>
        <!--------------- PAGE 1 --------------------------->
        <menu-page></menu-page>
        <!-- ----------------------------------------------->


        <!--------------- PAGE 2 --------------------------->
        <rank-page></rank-page>
        <!-- ----------------------------------------------->


        <!--------------- PAGE 3  ------------------------->
        <div id='page3'>
            <board-game></board-game>
        </div>
        <!------------------------------------------------->


        <!--------------- PAGE 4 -------------------------->
        <avatar-page></avatar-page>
        <!-- ---------------------------------------------->


        <!--------------- PAGE 5--------------------------->
        <info-page></info-page>
        <!-- ---------------------------------------------->

    </div>
    <script>
        window.onload = async function() {
            var led_tag = document.getElementById('led');
            var current_status = localStorage.getItem('user_status', 'LoggedIn');
            if(current_status)
                            {
                                document.getElementById('img_xxx').style.display = 'block';
                                document.getElementById('ready_player_1.2').style.display = 'block';
                                document.getElementById('btnkoo22').style.display = 'block';
                                document.getElementById('btninfoLogin').style.display = 'none';
                                document.getElementById('img_xxxxy').style.display = 'none';
                                document.getElementById('ready_player_3.1').style.display = 'none';
                                led_tag.style.color = "#46e546";
                            } 
                            else 
                            {
                                led_tag.style.color = "red";
                                document.getElementById('img_xxx').style.display = 'none';
                                document.getElementById('ready_player_1.2').style.display = 'none';
                                document.getElementById('btnkoo22').style.display = 'none';
                                document.getElementById('btninfoLogin').style.display = 'block';
                                document.getElementById('img_xxxxy').style.display = 'block';
                                document.getElementById('ready_player_3.1').style.display = 'block';
                            }     
        }

        async function web3Login() {
            var led_tag = document.getElementById('led');
            var current_status = localStorage.getItem('user_status', 'LoggedIn');
            if(current_status)
            {
                localStorage.removeItem('user_status', 'LoggedIn');
                led_tag.style.color = "red";
                                document.getElementById('img_xxx').style.display = 'none';
                                document.getElementById('ready_player_1.2').style.display = 'none';
                                document.getElementById('btnkoo22').style.display = 'none';
                                document.getElementById('btninfoLogin').style.display = 'block';
                                document.getElementById('img_xxxxy').style.display = 'block';
                                document.getElementById('ready_player_3.1').style.display = 'block';
                toastr.success('Logged out successfully');
            }
            else{
             
            var led_tag = document.getElementById('led');
            if (!window.ethereum) {
                toastr.error('MetaMask not detected. Please install MetaMask first.');
                return;
            }
                    const provider = new ethers.providers.Web3Provider(window.ethereum);

                    let response = await fetch('api/web3-login-message');
                    const message = await response.text();

                    await provider.send("eth_requestAccounts", []);
                    const address = await provider.getSigner().getAddress();
                    
                    const amount = await provider.getSigner().getBalance();
                    const signature = await provider.getSigner().signMessage(message);

                    response = await fetch('api/web3-login-verify', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json'
                        },
                        body: JSON.stringify({
                            'message': message,
                            'address': address,
                            'signature': signature,
                            '_token': '{{ csrf_token() }}'
                        })
                    });
                    const data = await response.text();


                    const date = new Date();
                    let day = date.getDate();
                    let year = date.getFullYear();
                    let month = date.getMonth() + 1;
                    let hour = date.getHours();
                    let min = date.getMinutes();
                    let sec = date.getSeconds();

                    var alias = "player_" + year + "" + month + "" + day + "" + hour + "" + min + "" + sec + "";

                    if (data == "OK") {

                        var led_tag = document.getElementById('led');
                        var userStatus = localStorage.setItem('user_status', 'LoggedIn');
                        led_tag.style.color = "rgb(0, 255, 0)";
                        page1.style.display = "none";
                        page3.style.display = "none";
                        page4.style.display = "none";
                        page5.style.display = "none";
                        document.getElementById('img_xxx').style.display = 'block';
                                        document.getElementById('ready_player_1.2').style.display = 'block';
                                        document.getElementById('btnkoo22').style.display = 'block';
                                        document.getElementById('btninfoLogin').style.display = 'none';
                                        document.getElementById('img_xxxxy').style.display = 'none';
                                        document.getElementById('ready_player_3.1').style.display = 'none';

                        page2.style.display = "block";
                            
                        toastr.success('Log in succeesfully!');

                        response = await fetch('api/web3-register-ethwallet', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json'
                            },
                            body: JSON.stringify({
                                'ethwalletaddr': address,
                                'balance': amount['_hex'],
                                'alias': alias,
                                '_token': '{{ csrf_token() }}'
                            })
                        });

                        response.text().then((data) => {
                            if (data != "SUCCESS") {
                                response = fetch('api/web3-update-ethwallet', {
                                    method: 'POST',
                                    headers: {
                                        'Content-Type': 'application/json'
                                    },
                                    body: JSON.stringify({
                                        'ethwalletaddr': address,
                                        'balance': amount['_hex'],
                                        '_token': '{{ csrf_token() }}'
                                    })
                                });
                                
                                console.log("Update successfully!");
                            } else {
                            
                                console.log("Register successfully!");
                            }
                        });
                    }
                    else{
                        led_tag.style.color = "red";
                        console.log('access denied');
                    }
            } 
        }

    </script>
</body>

</html>