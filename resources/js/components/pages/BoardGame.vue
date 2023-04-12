<template>
    <div class="allineatore2">
                <!----------------- MODALS UTILITY ------------------->
        <div id="myModalkoo2" class="modal d-flex modal-ingame align-items-center">
            <!-- Modal content -->
            <div style='' class="modal-content container-sm d-flex flex-column align-items-center">
                <div class="d-flex container-sm align-items-center justify-content-between flex-row">
                    <img style="width:80px" src=" images/extra_objects/ddd.jpg"  alt="">
                    <span style="color:white; margin:0; margin-top:5px; margin-left:8px;"> v 1.0.0</span>
                    <!-- <p class='avatar_helper_' style='color:white;  padding: 5px; margin:0;margin-left: 5px; '>v 1</p> -->
                </div>
                <div class="d-flex justify-content-center align-items-center" id='console-screen' style='background-color:black; display:flex;  justify-content:center; align-items:center;'>
                    <p class="" style='color:white; font-size:17px; padding:10px;' > You win / You Lose / Other data</p>
                </div>
                <div class="d-flex flex-wrap justify-content-center">
                    <button @click="createGame()"  style='background-color:black; d-flex justify-content-center'>
                        <div class="d-flex no-wrap justify-content-center align-items-center">
                            <p class="m-0" > START</p>
                            <i style='font-size:20px; margin-left:15px;' class="fa-solid fa-bolt"></i>
                        </div>
                    </button>
                    <button  style='background-color:black' class=" d-flex justify-content-center">
                        <div class="d-flex no-wrap justify-content-center">
                            <p class="m-0" > INVITE P2</p>
                            <img style='width:30px; margin-left:8px' src='images/extra_objects/iconaplay1.png' alt="">
                        </div>
                    </button>
                </div>
                <div class="d-flex flex-wrap justify-content-center">
                    <button style='background-color:black;' class="closekoo2 jusify-content-around" > <span>REASUME</span> <img style='width:30px; margin-left:8px' src='images/board/tree.png' alt=""></button>
                    <router-link to="rank"><button id='btnkoo_3_1' class="jusify-content-around" style='background-color:black;' >  <span>QUIT</span> <img style='width:30px; margin-left:8px' src='images/board/animals/icon-17.png' alt=""></button> <!-- icon-17 rosso --> <!-- icon-41 bianco --></router-link>
                </div>
                <!-- <button style='background-color:black; colr:white; '> SEND INVITATION  <i class="fa-solid ml-2 fa-arrow-up-from-bracket"></i></button> -->
            </div>
        </div>

        <!-- modale per scegliere partita privata o pubblica -->
        <div id="myModalkoo12" class="modal align-items-center">
            <!-- Modal content -->
            <div style='background-color:black;' class="modal-content d-flex flex-column align-items-center">
                <img style=" width:60px;" src=" images/extra_objects/backend.png"  alt="">
                <button class="closekoo2" > RESUME </button>
                <button id='btnkoo_3_1' > QUIT  </button>
                <button style='background-image: linear-gradient(90deg, #00C0FF 0%, #FFCF00 49%, #FC4F4F 80%, #00C0FF 100%);'> Open room </button>
            </div>
        </div>
        <!-- modale per visualizzare miniatura profilo -->
        <div id="myModalkoo13" class="modal align-items-center">
            <!-- Modal content -->
            <div style='background-color:black;' class="modal-content d-flex flex-column align-items-center">
                <img style=" width:60px;" src=" images/extra_objects/backend.png"  alt="">
                <button class="closekoo2"> RESUME </button>
                <button id='btnkoo_3_1' > QUIT  </button>
                <button style='background-image: linear-gradient(90deg, #00C0FF 0%, #FFCF00 49%, #FC4F4F 80%, #00C0FF 100%);'> Open room </button>
            </div>
        </div>
        <!---------------------------------------------------->
    </div>
</template>

<script>
    import axios from "axios";
    export default {
        methods: {
            async createGame(){
                this.url = window.location.host;
                const response = await axios.get('http://'+this.url+'/api/make-game');
                this.$router.push(`/room/${response.data.url}`);
            }
        },
    }
</script>



