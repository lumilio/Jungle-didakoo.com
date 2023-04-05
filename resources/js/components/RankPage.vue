<template>
    <div id='page2' >  
        
        <!----------------------- UTILITY MODAL usless now ----------------------->
        <div id='myModalkoo' class="modal">
            <div class="modal-content d-flex flex-column align-items-center">
                <span class="closekoo_rank">&times;</span>
                <button id='btnkoo_2_1' class="rainbow-button" > H𐍈ME </button>
                <button id='btnkoo_2_2' > Y𐍈U  </button>
                <button id='btnkoo_2_3' > LOG𐍈UT </button>
            </div>
        </div> 
        <!------------------------------------------------------------->

        <!----------------------- NAV ----------------------->
        <div class="d-flex banner-board-helper justify-content-center align-items-center" style='margin-bottom: 18px; background-color:black; height:80px;    color: black; '>    
            <div class="d-flex align-items-center ">
                <img style="width: 100px; margin-left: 5px; margin-bottom: 3px" src="images/extra_objects/ddd.jpg" alt="" />
                <i id='modalkoo' style='display:inline; margin-bottom:25px;position:relative; margin-right:0px' class="fa-solid fa-bars"></i>
                <button id='ready_player_1.2' style='disaply:none;border:1px solid black;       padding:15px; padding-right:5px; color:white; background-color:black; border-radius:20px;  '><p ></p>  <img style='display:inline; width:30px; margin-left:0px; margin-bottom:3px;'   src='images/extra_objects/iconaplay1.png' alt=""></button> 
                <button onclick="web3Login();" id='ready_player_3.1' style='display:;border:1px solid black;       padding: 20px 0px 15px 15px; padding-right:0px; color:white; background-color:black; border-radius:20px;  '>
                    <img style='display:inline; width:30px; margin-left:0px; margin-bottom:3px;'   src='images/extra_objects/iconaplay1.png' alt="">
                    <!-- <p style='display:inline; background:white; border-radius:10px; background-color:black; color:white; border:1px solid white; padding:10px;' >Login </p> -->
                </button> 
            </div>
        </div>

        <!---------------------------------------------------->

        <!----------------------- LOGO ----------------------->
        <div id="_box1_" class="container-sm d-flex justify-content-center align-items-center flex-column">

            <!-- BANNER EVENT IMPORTANT  -->
            <!-- <p class='text-white' style='font-family: "VT323", monospace;   margin-bottom:35px; '>Sun Dec 17 1995 03:24:00 UTC+1 ROME </p> -->
            <!-- <p class='text-white' style='font-family: "VT323", monospace;   margin-bottom:35px; '>Next token recharge 23h 59m 59s</p> -->


            <div class="d-flex container-sm justify-content-center align-items-center ">
                <img style=" height:60px;  display: inline; transform: scaleX(-1);" src="images/extra_objects/icon-06.png" alt=""/>
                <button id="modalx" class="no-wrap align-items-center text-big d-flex p-4 call_button"> <span>Jungle Game</span> <!-- <img style='width:130px; margin-left:10px; margin-bottom:15px; ' src='images/extra_objects/ddd.jpg' alt=""> --> </button> 
                <img style=" height:60px;  display: inline" src="images/extra_objects/icon-05.png" alt="" /> 
            </div>

            <!-- BANNER EVENT IMPORTANT  -->
            <!-- <p class='text-white' style='font-family: "VT323", monospace;   margin-top:15px; '>Sun Dec 17 1995 03:24:00 UTC+1 ROME</p> -->


            <img id='scarabeo'  style='display:;' src='images/extra_objects/1.svg' alt="">         
        </div>
        <div class="d-flex container-sm  mt-3 flex-column"></div>
        <!---------------------------------------------------->

        <!--------------------------------------- RANK LIST ------------------------------------------>
        <div style='max-width:800px' class="rank d-flex container-sm  flex-column align-items-center text-white"> 

            <button class='refresh-button' style='background-color:black;'>
                <p class='d-flex justify-content-between align-items-center' style='color:white; padding: 10px; margin: 0;'>  
                    <span>Click to refresh</span>  
                    <i style='color:white; font-size:20px;' class="fa-solid fa-rotate"></i>
                </p> 
            </button>
            
            <!---------------------------- User record examaples ---------------------------->
            <div style="background-color:#EDEB52;"  class="record">
                <p  style='color:black; font-size:x-smal; padding: 10px; margin: 0; text-overflow: ellipsis; white-space: nowrap;  overflow:hidden;'>1°
                    <img style='width:20px; margin-left:5px; margin-right:5px;  margin-bottom:3px;'   src='images/extra_objects/iconaplayB.png'> 0xF83611F45e11b590eBB9FdABa9ee12e7Dc9E9393
                </p> 
                <div class='d-flex align-items-center flex-row flex-nowrap'>
                    <img style='width:30px; ' src='images/extra_objects/icon-59.png' alt="">
                    <i style='font-size:20px; color:black;'  class="fa-solid fa-battery-full"></i>
                </div>
                <span class='align-items-center' style='color:black; margin-right: 10px;     white-space: nowrap;     background-color: ;  padding:0 10px;  border-radius: 20px; display:flex;'> 100  <i class="fa-solid fa-bolt ml-1"></i></span>
            </div>
            <!------------------------------------------------------------------------------>
            <div style="background-color:#EE5E81;"  class="record ">
                <p  style='color:black; font-size:x-smal; padding: 10px; margin: 0; text-overflow: ellipsis; white-space: nowrap;  overflow:hidden;'>2°
                    <img style='width:20px; margin-left:5px; margin-right:5px;  margin-bottom:3px;' src='images/extra_objects/iconaplayB.png'> 0xF83611F45e11b590eBB9FdABa9ee12e7Dc9E9393
                </p> 
                <span class='align-items-center' style='color:black; margin-right: 10px; white-space: nowrap; padding:0 10px; border-radius: 20px; display:flex;'> 6  <i class="fa-solid fa-bolt ml-1"></i></span>
            </div>
            <!------------------------------------------------------------------------------>

    
            <!-- Looping through players --------------------------------------------------->
                  <!-- <div v-for="players in playersArray" v-bind:key="players.id" style="background-color:#EDEB52;"  class="record ">
                  
                    <p  style='color:black; font-size:x-smal; padding: 10px; margin: 0; text-overflow: ellipsis; white-space: nowrap;  overflow:hidden;'>1°
                        <img style='width:20px; margin-left:5px; margin-right:5px;  margin-bottom:3px;'   src='img/images/images3/iconaplayB.png'>  {{players.wallet_address}}
                    </p> 
                    <div class='d-flex align-items-center flex-row flex-nowrap'>
                        <p>𓆃</p>
                        <img style='width:30px; ' src='img/images/images3/icon-59.png' alt="">
                        <i style='font-size:20px; color:black;'  class="fa-solid fa-battery-full"></i>
                    </div>
                    <span class='align-items-center' style='color:black; margin-right: 10px;     white-space: nowrap;     background-color: ;  padding:0 10px;  border-radius: 20px; display:flex;'> 100  <i class="fa-solid fa-bolt ml-1"></i></span>
                </div> -->
            <!------------------------------------------------------------------------------>


            <!-------------------------------- RANK LIST EXAMPLE ---------------------------------------------- -->
                <!-- <div>
                <div style="background-color:#EDEB52;"  class="record ">
                    <p  style='color:black; font-size:x-smal; padding: 10px; margin: 0; text-overflow: ellipsis; white-space: nowrap;  overflow:hidden;'>2°
                        <img style='width:20px; margin-left:5px; margin-right:5px;  margin-bottom:3px;'   src='images/extra_objects/iconaplayB.png'> 0xF83611F45e11b590eBB9FdABa9ee12e7Dc9E9393
                    </p> 
                    <span class='align-items-center' style='color:black; margin-right: 10px;     white-space: nowrap;     background-color: ;  padding:0 10px;  border-radius: 20px; display:flex;'> 6  <i class="fa-solid fa-bolt ml-1"></i></span>
                </div>
                <div style="background-color:#EE3634;"  class="record  shake">
                    <p  style='color:; font-size:x-smal; padding: 10px; margin: 0; text-overflow: ellipsis; white-space: nowrap;  overflow:hidden;'>2°
                        <img id='shake' style='width:20px; margin-left:5px; margin-right:5px;  margin-bottom:3px;'   src='images/extra_objects/iconaplayW.png'> 0xF83611F45e11b590eBB9FdABa9ee12e7Dc9E9393
                    </p> 
                    <span class='align-items-center' style='color:; margin-right: 10px;     white-space: nowrap;     background-color: ;  padding:0 10px;  border-radius: 20px; display:flex;'> 1  <i class="fa-solid fa-bolt ml-1"></i></span>
                </div>
                <div style="background-color:#3C5FA1;"  class="record ">
                    <p  style='color:; font-size:x-smal; padding: 10px; margin: 0; text-overflow: ellipsis; white-space: nowrap;  overflow:hidden;'>2°
                        <img style='width:20px; margin-left:5px; margin-right:5px;  margin-bottom:3px;'   src='images/extra_objects/iconaplayW.png'> 0xF83611F45e11b590eBB9FdABa9ee12e7Dc9E9393
                    </p> 
                    <span class='align-items-center' style='color:; margin-right: 10px;     white-space: nowrap;     background-color: ;  padding:0 10px;  border-radius: 20px; display:flex;'> 1  <i class="fa-solid fa-bolt ml-1"></i></span>
                </div>

                <div style="background-color:#EE3634;"  class="record  shake">
                    <p  style='color:; font-size:x-smal; padding: 10px; margin: 0; text-overflow: ellipsis; white-space: nowrap;  overflow:hidden;'>2°
                        <img id='shake' style='width:20px; margin-left:5px; margin-right:5px;  margin-bottom:3px;'   src='images/extra_objects/iconaplayW.png'> 0xF83611F45e11b590eBB9FdABa9ee12e7Dc9E9393
                    </p> 
                    <span class='align-items-center' style='color:; margin-right: 10px;     white-space: nowrap;     background-color: ;  padding:0 10px;  border-radius: 20px; display:flex;'> 1  <i class="fa-solid fa-bolt ml-1"></i></span>
                </div>
                <div style="background-color:#3C5FA1;"  class="record ">
                    <p  style='color:; font-size:x-smal; padding: 10px; margin: 0; text-overflow: ellipsis; white-space: nowrap;  overflow:hidden;'>2°
                        <img style='width:20px; margin-left:5px; margin-right:5px;  margin-bottom:3px;'   src='images/extra_objects/iconaplayW.png'> 0xF83611F45e11b590eBB9FdABa9ee12e7Dc9E9393
                    </p> 
                    <span class='align-items-center' style='color:; margin-right: 10px;     white-space: nowrap;     background-color: ;  padding:0 10px;  border-radius: 20px; display:flex;'> 1  <i class="fa-solid fa-bolt ml-1"></i></span>
                </div>
                <div style="background-color:#EDEB52;"  class="record ">
                    <p  style='color:black; font-size:x-smal; padding: 10px; margin: 0; text-overflow: ellipsis; white-space: nowrap;  overflow:hidden;'>2°
                        <img style='width:20px; margin-left:5px; margin-right:5px;  margin-bottom:3px;'   src='images/extra_objects/iconaplayB.png'> 0xF83611F45e11b590eBB9FdABa9ee12e7Dc9E9393
                    </p> 
                    <span class='align-items-center' style='color:black; margin-right: 10px;     white-space: nowrap;     background-color: ;  padding:0 10px;  border-radius: 20px; display:flex;'> 6  <i class="fa-solid fa-bolt ml-1"></i></span>
                </div>
                <div style="background-color:#EE3634;"  class="record  shake">
                    <p  style='color:; font-size:x-smal; padding: 10px; margin: 0; text-overflow: ellipsis; white-space: nowrap;  overflow:hidden;'>2°
                        <img id='shake' style='width:20px; margin-left:5px; margin-right:5px;  margin-bottom:3px;'   src='images/extra_objects/iconaplayW.png'> 0xF83611F45e11b590eBB9FdABa9ee12e7Dc9E9393
                    </p> 
                    <span class='align-items-center' style='color:; margin-right: 10px;     white-space: nowrap;     background-color: ;  padding:0 10px;  border-radius: 20px; display:flex;'> 1  <i class="fa-solid fa-bolt ml-1"></i></span>
                </div>
                <div style="background-color:#3C5FA1;"  class="record ">
                    <p  style='color:; font-size:x-smal; padding: 10px; margin: 0; text-overflow: ellipsis; white-space: nowrap;  overflow:hidden;'>2°
                        <img style='width:20px; margin-left:5px; margin-right:5px;  margin-bottom:3px;'   src='images/extra_objects/iconaplayW.png'> 0xF83611F45e11b590eBB9FdABa9ee12e7Dc9E9393
                    </p> 
                    <span class='align-items-center' style='color:; margin-right: 10px;     white-space: nowrap;     background-color: ;  padding:0 10px;  border-radius: 20px; display:flex;'> 1  <i class="fa-solid fa-bolt ml-1"></i></span>
                </div>
                <div style="background-color:#EDEB52;"  class="record ">
                    <p  style='color:black; font-size:x-smal; padding: 10px; margin: 0; text-overflow: ellipsis; white-space: nowrap;  overflow:hidden;'>2°
                        <img style='width:20px; margin-left:5px; margin-right:5px;  margin-bottom:3px;'   src='images/extra_objects/iconaplayB.png'> 0xF83611F45e11b590eBB9FdABa9ee12e7Dc9E9393
                    </p> 
                    <span class='align-items-center' style='color:black; margin-right: 10px;     white-space: nowrap;     background-color: ;  padding:0 10px;  border-radius: 20px; display:flex;'> 6  <i class="fa-solid fa-bolt ml-1"></i></span>
                </div>
                <div style="background-color:#EE3634;"  class="record  shake">
                    <p  style='color:; font-size:x-smal; padding: 10px; margin: 0; text-overflow: ellipsis; white-space: nowrap;  overflow:hidden;'>2°
                        <img id='shake' style='width:20px; margin-left:5px; margin-right:5px;  margin-bottom:3px;'   src='images/extra_objects/iconaplayW.png'> 0xF83611F45e11b590eBB9FdABa9ee12e7Dc9E9393
                    </p> 
                    <span class='align-items-center' style='color:; margin-right: 10px;     white-space: nowrap;     background-color: ;  padding:0 10px;  border-radius: 20px; display:flex;'> 1  <i class="fa-solid fa-bolt ml-1"></i></span>
                </div>
                <div style="background-color:#3C5FA1;"  class="record ">
                    <p  style='color:; font-size:x-smal; padding: 10px; margin: 0; text-overflow: ellipsis; white-space: nowrap;  overflow:hidden;'>2°
                        <img style='width:20px; margin-left:5px; margin-right:5px;  margin-bottom:3px;'   src='images/extra_objects/iconaplayW.png'> 0xF83611F45e11b590eBB9FdABa9ee12e7Dc9E9393
                    </p> 
                    <span class='align-items-center' style='color:; margin-right: 10px;     white-space: nowrap;     background-color: ;  padding:0 10px;  border-radius: 20px; display:flex;'> 1  <i class="fa-solid fa-bolt ml-1"></i></span>
                </div>
                <div style="background-color:#EDEB52;"  class="record ">
                    <p  style='color:black; font-size:x-smal; padding: 10px; margin: 0; text-overflow: ellipsis; white-space: nowrap;  overflow:hidden;'>2°
                        <img style='width:20px; margin-left:5px; margin-right:5px;  margin-bottom:3px;'   src='images/extra_objects/iconaplayB.png'> 0xF83611F45e11b590eBB9FdABa9ee12e7Dc9E9393
                    </p> 
                    <span class='align-items-center' style='color:black; margin-right: 10px;     white-space: nowrap;     background-color: ;  padding:0 10px;  border-radius: 20px; display:flex;'> 6  <i class="fa-solid fa-bolt ml-1"></i></span>
                </div>
                <div style="background-color:#EE3634;"  class="record  shake">
                    <p  style='color:; font-size:x-smal; padding: 10px; margin: 0; text-overflow: ellipsis; white-space: nowrap;  overflow:hidden;'>2°
                        <img id='shake' style='width:20px; margin-left:5px; margin-right:5px;  margin-bottom:3px;'   src='images/extra_objects/iconaplayW.png'> 0xF83611F45e11b590eBB9FdABa9ee12e7Dc9E9393
                    </p> 
                    <span class='align-items-center' style='color:; margin-right: 10px;     white-space: nowrap;     background-color: ;  padding:0 10px;  border-radius: 20px; display:flex;'> 1  <i class="fa-solid fa-bolt ml-1"></i></span>
                </div>
                <div style="background-color:#3C5FA1;"  class="record ">
                    <p  style='color:; font-size:x-smal; padding: 10px; margin: 0; text-overflow: ellipsis; white-space: nowrap;  overflow:hidden;'>2°
                        <img style='width:20px; margin-left:5px; margin-right:5px;  margin-bottom:3px;'   src='images/extra_objects/iconaplayW.png'> 0xF83611F45e11b590eBB9FdABa9ee12e7Dc9E9393
                    </p> 
                    <span class='align-items-center' style='color:; margin-right: 10px;     white-space: nowrap;     background-color: ;  padding:0 10px;  border-radius: 20px; display:flex;'> 1  <i class="fa-solid fa-bolt ml-1"></i></span>
                </div>
                <div style="background-color:#EE5E81;"  class="record ">
                    <p  style='color:black; font-size:x-smal; padding: 10px; margin: 0; text-overflow: ellipsis; white-space: nowrap;  overflow:hidden;'>2°
                        <img style='width:20px; margin-left:5px; margin-right:5px;  margin-bottom:3px;'   src='images/extra_objects/iconaplayB.png'> 0xF83611F45e11b590eBB9FdABa9ee12e7Dc9E9393
                    </p> 
                    <span class='align-items-center' style='color:black; margin-right: 10px;     white-space: nowrap;     background-color: ;  padding:0 10px;  border-radius: 20px; display:flex;'> 6  <i class="fa-solid fa-bolt ml-1"></i></span>
                </div>
                <div style="background-color:#EE3634;"  class="record  shake">
                    <p  style='color:; font-size:x-smal; padding: 10px; margin: 0; text-overflow: ellipsis; white-space: nowrap;  overflow:hidden;'>2°
                        <img id='shake' style='width:20px; margin-left:5px; margin-right:5px;  margin-bottom:3px;'   src='images/extra_objects/iconaplayW.png'> 0xF83611F45e11b590eBB9FdABa9ee12e7Dc9E9393
                    </p> 
                    <span class='align-items-center' style='color:; margin-right: 10px;     white-space: nowrap;     background-color: ;  padding:0 10px;  border-radius: 20px; display:flex;'> 1  <i class="fa-solid fa-bolt ml-1"></i></span>
                </div>
                <div style="background-color:#3C5FA1;"  class="record ">
                    <p  style='color:; font-size:x-smal; padding: 10px; margin: 0; text-overflow: ellipsis; white-space: nowrap;  overflow:hidden;'>2°
                        <img style='width:20px; margin-left:5px; margin-right:5px;  margin-bottom:3px;'   src='images/extra_objects/iconaplayW.png'> 0xF83611F45e11b590eBB9FdABa9ee12e7Dc9E9393
                    </p> 
                    <span class='align-items-center' style='color:; margin-right: 10px;     white-space: nowrap;     background-color: ;  padding:0 10px;  border-radius: 20px; display:flex;'> 1  <i class="fa-solid fa-bolt ml-1"></i></span>
                </div>
                <div style="background-color:#EE5E81;"  class="record ">
                    <p  style='color:black; font-size:x-smal; padding: 10px; margin: 0; text-overflow: ellipsis; white-space: nowrap;  overflow:hidden;'>2°
                        <img style='width:20px; margin-left:5px; margin-right:5px;  margin-bottom:3px;'   src='images/extra_objects/iconaplayB.png'> 0xF83611F45e11b590eBB9FdABa9ee12e7Dc9E9393
                    </p> 
                    <span class='align-items-center' style='color:black; margin-right: 10px;     white-space: nowrap;     background-color: ;  padding:0 10px;  border-radius: 20px; display:flex;'> 6  <i class="fa-solid fa-bolt ml-1"></i></span>
                </div>
                <div style="background-color:#EE3634;"  class="record  shake">
                    <p  style='color:; font-size:x-smal; padding: 10px; margin: 0; text-overflow: ellipsis; white-space: nowrap;  overflow:hidden;'>2°
                        <img id='shake' style='width:20px; margin-left:5px; margin-right:5px;  margin-bottom:3px;'   src='images/extra_objects/iconaplayW.png'> 0xF83611F45e11b590eBB9FdABa9ee12e7Dc9E9393
                    </p> 
                    <span class='align-items-center' style='color:; margin-right: 10px;     white-space: nowrap;     background-color: ;  padding:0 10px;  border-radius: 20px; display:flex;'> 1  <i class="fa-solid fa-bolt ml-1"></i></span>
                </div>
                <div style="background-color:#3C5FA1;"  class="record ">
                    <p  style='color:; font-size:x-smal; padding: 10px; margin: 0; text-overflow: ellipsis; white-space: nowrap;  overflow:hidden;'>2°
                        <img style='width:20px; margin-left:5px; margin-right:5px;  margin-bottom:3px;'   src='images/extra_objects/iconaplayW.png'> 0xF83611F45e11b590eBB9FdABa9ee12e7Dc9E9393
                    </p> 
                    <span class='align-items-center' style='color:; margin-right: 10px;     white-space: nowrap;     background-color: ;  padding:0 10px;  border-radius: 20px; display:flex;'> 1  <i class="fa-solid fa-bolt ml-1"></i></span>
                </div>
                </div> -->
            
            
        <!--  ---------------------------------------------------------------------------------------------->
        </div>

    </div>
</template>







<script>
import axios from 'axios';
 export default {
    data(){
        return{
            playersArray: [],
            url: '',
        }
    },
    methods:{
            async getAllUsers()
            {
                this.url = window.location.host;
                const response = await axios.get('http://'+this.url+'/api/getUsers');
                this.playersArray = response.data.playersData;
            }
    },
    async mounted() 
    {
            await this.getAllUsers();
    },

 }
</script>
