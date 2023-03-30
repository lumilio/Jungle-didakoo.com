<template>
    <div class="allineatore2">


        <!----------------- MODALS UTILITY ------------------->
        <div id="myModalkoo2" class="modal align-items-center">
            <!-- Modal content -->
            <div style='background-color:black; margin-bottom:17rem; ' class="modal-content d-flex flex-column align-items-center">
                <img style=" width:60px;" src=" images/extra_objects/backend.png"  alt="">
                <div class="d-flex my-2 align-items-center">
                    <img style='width:30px; position: ; top:15px; left:15px;' src='images/extra_objects/ff.png' alt="">
                    <p style='margin:0; margin-left:5px; color:white' > 5 / 5</p>
                </div>
                <p style='color:red'> start in 00:15</p>
                <button style='background-image: linear-gradient(90deg, #00C0FF 0%, #FFCF00 49%, #FC4F4F 80%, #00C0FF 100%);'> <p class="m-0" >OPEN ROOM</p><div><img style='width:20px; margin:2px' src='images/extra_objects/ff.png' alt=""></div></button> 
                <button style='background-image: linear-gradient(90deg, #00C0FF 0%, #FFCF00 49%, #FC4F4F 80%, #00C0FF 100%);'> <p class="m-0" >PRIVATE ROOM</p><div><img style='width:20px; margin:2px' src='images/extra_objects/ff.png' alt=""></div></button> 
                <button class="closekoo2" > <p class="m-0">RESUME</p><div><img style='width:30px; margin:2px' src='images/extra_objects/icon-33.png' alt=""></div></button>
                <button style='background-color:purple;'> SEND INVITATION  </button>
                <button id='btnkoo_3_1' > QUIT  </button>
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

        <div class="d-flex banner-board-helper align-items-center" style=' background-color:black; height:80px;    color: black; '>    
            <div class="d-flex align-items-center position:absolute; top:0;">
                <img style="width: 100px; margin-left: 5px; margin-bottom: 3px" src="images/extra_objects/ddd.jpg" alt="" />
                <i id='btnkoo2' style='display:inline; margin-bottom:25px;position:relative; margin-right:0px' class="fa-solid fa-bars"></i>
                <!-- <p class='avatar_helper_' style='color:white;    border: 1px solid white; padding: 5px; margin:0;margin-left: 15px; '>v 2.1</p> -->
            </div>
        </div>
        <!----------------------------------------->


        <div class="allineatore d-flex flex-column justify-content-center align-items-center" style="padding-top: 0px; margin-top: -30px;height:90%;">
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
            <div class="container-sm board d-flex justify-content-center bg-transparent align-items-center">
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



