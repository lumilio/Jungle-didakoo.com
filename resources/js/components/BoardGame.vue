<template>
    <div class="allineatore2">


        <!----------------- MODALS UTILITY ------------------->
        <div id="myModalkoo2" class="modal align-items-center">
            <!-- Modal content -->


            <div style='' class="modal-content container-sm d-flex flex-column align-items-center">
                <div class="d-flex container-sm align-items-center justify-content-between flex-row">
                    <img style="width:80px" src=" images/extra_objects/ddd.jpg"  alt=""> 
                    <span style="color:white; margin:0; margin-top:5px; margin-left:8px;"> v 1.0</span>
                    <!-- <p class='avatar_helper_' style='color:white;  padding: 5px; margin:0;margin-left: 5px; '>v 1</p> -->
                </div>
                <div class="d-flex justify-content-center align-items-center" id='console-screen' style='background-color:black; display:flex;  justify-content:center; align-items:center;'>  
                    <p class="" style='color:white; font-size:17px; padding:10px;' > Game strat in 00:10 see the board</p>
                </div> 
                <div class="d-flex flex-wrap justify-content-center">
                    <button  style='background-color:black; d-flex justify-content-center'> 
                        <div class="d-flex no-wrap justify-content-center align-items-center"> 
                            <p class="m-0" > START</p>
                            <i style='font-size:20px; margin-left:15px;' class="fa-solid fa-bolt"></i>
                        </div>
                    </button> 
                    <button  style='background-color:black; d-flex justify-content-center'> 
                        <div class="d-flex no-wrap justify-content-center"> 
                            <p class="m-0" > INVITE P2</p>
                            <img style='width:30px; margin-left:8px' src='images/extra_objects/iconaplay1.png' alt="">
                        </div>
                    </button> 
                </div>
                <div class="d-flex flex-wrap justify-content-center">
                    <button   style='background-color:black;' class="closekoo2 jusify-content-around" > <span>BOARD</span> <img style='width:30px; margin-left:8px' src='images/board/tree.png' alt=""></button>
                    <button id='btnkoo_3_1' class="jusify-content-around" style='background-color:black;' >  <span>QUIT</span> <img style='width:30px; margin-left:8px' src='images/board/animals/icon-17.png' alt=""></button> <!-- icon-17 rosso --> <!-- icon-41 bianco -->
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
                <button class="closekoo2" > RESUME </button>
                <button id='btnkoo_3_1' > QUIT  </button>
                <button style='background-image: linear-gradient(90deg, #00C0FF 0%, #FFCF00 49%, #FC4F4F 80%, #00C0FF 100%);'> Open room </button> 
            </div>
        </div>
        <!---------------------------------------------------->
        <!----------------- NAV ------------------->
        <div class="d-flex banner-board-helper align-items-center" style='  height:80px;    color: black; '>    
            <div id='btnkoo2' class="d-flex align-items-center position:absolute; top:0;">
                <p class='avatar_helper_' style='color:white;  padding: 5px; margin:0;margin-left: 5px; '>Console</p>
                <i style="font-size: 25px; margin-left: 5px; margin-bottom: 3px" class="fa-solid fa-gamepad"></i>
            </div>
        </div>
        <!----------------------------------------->
        <div class="allineatore d-flex flex-column container-sm justify-content-center align-items-center" style="padding-top: 0px; margin-top: -30px;height:90%;">
            <!-------------- PLAYER 2 DATA ---------------->
            <div class="board-player" >
                <div style="background-color:#EDEB52;  width:100%; border:0;" class="record   ">
                    <p  style='color:black; font-size:x-smal; padding: 10px; margin: 0; text-overflow: ellipsis; white-space: nowrap;  overflow:hidden;'>1°
                        <img style='width:20px; margin-left:5px; margin-right:5px;  margin-bottom:3px;'   src='images/extra_objects/iconaplayB.png'> 0xF83611F45e11b590eBB9FdABa9ee12e7Dc9E9393
                    </p> 
                    <div class='d-flex align-items-center flex-row flex-nowrap'>
                        <img style='width:30px; ' src='images/extra_objects/icon-59.png' alt="">
                        <!-- <i style='font-size:20px; color:black;'  class="fa-solid fa-battery-full"></i> -->
                    </div>
                    <span class='align-items-center' style='color:black; margin-right: 10px;     white-space: nowrap;     background-color: ;  padding:0 10px;  border-radius: 20px; display:flex;'> 100  <i class="fa-solid fa-bolt ml-1"></i></span>
                </div>
            </div>
            <!--------------------------------------------->
            <div class=" board d-flex justify-content-center bg-transparent align-items-center">
                <Game/>
                <!-- <img class='board ' src="images/concepts/blue-red.jpeg" alt=""> -->
            </div> 
            <!-------------- PLAYER 1 DATA ---------------->
            <div class="board-player" >
                <div style="background-color:#EDEB52;  width:100%; border:0;" class="record   ">
                    <p  style='color:black; font-size:x-smal; padding: 10px; margin: 0; text-overflow: ellipsis; white-space: nowrap;  overflow:hidden;'>1°
                        <img style='width:20px; margin-left:5px; margin-right:5px;  margin-bottom:3px;'   src='images/extra_objects/iconaplayB.png'> 0xF83611F45e11b590eBB9FdABa9ee12e7Dc9E9393
                    </p> 
                    <div class='d-flex align-items-center flex-row flex-nowrap'>
                        <img style='width:30px; ' src='images/extra_objects/icon-59.png' alt="">
                        <!-- <i style='font-size:20px; color:black;'  class="fa-solid fa-battery-full"></i> -->
                    </div>
                    <span class='align-items-center' style='color:black; margin-right: 10px;     white-space: nowrap;     background-color: ;  padding:0 10px;  border-radius: 20px; display:flex;'> 100  <i class="fa-solid fa-bolt ml-1"></i></span>
                </div>
            </div>
            <!--------------------------------------------->
        </div>  
    </div>
</template>

<script>
    import Game from "./Game/Game.vue";
    export default {
        components: {
            Game
        },
        mounted() {
            console.log('Board GAme Component mounted.')
        }
    }
</script>



