<template>
    <div id='page2' >  
        
        <!----------------------- UTILITY MODAL ----------------------->
        <div id='myModalkoo' class="modal">
            <!-- Modal content -->
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
                <button id='ready_player_1.2' style='disaply:none;border:1px solid black;       padding:15px; padding-right:5px; color:white; background-color:black; border-radius:20px;  '><p ></p>  <img style='display:inline; width:30px; margin-left:0px; margin-bottom:3px;'   src='images/extra_objects/iconaplay1.png' alt=""></button> 
                <button onclick="web3Login();" id='ready_player_3.1' style='display:none;border:1px solid black;       padding: 20px 0px 15px 15px; padding-right:0px; color:white; background-color:black; border-radius:20px;  '><p style='display:inline;' >Login</p><!-- <img style='display:inline; width:30px; margin-left:0px; margin-bottom:3px;'   src='images/extra_objects/iconaplay1.png' alt=""> --></button> 
                <i id='modalkoo' style='display:inline; margin-bottom:25px;position:relative; margin-right:0px' class="fa-solid fa-bars"></i>
                <!-- <p class='avatar_helper_' style='color:white;    border: 1px solid white; padding: 5px; margin:0;margin-left: 15px; '>v 2.1</p> -->
            </div>
        </div>
        <!---------------------------------------------------->

        <!----------------------- LOGO ----------------------->
        <div id="_box1_" class="container-sm d-flex justify-content-center align-items-center flex-column">
            <button id="modalx" class="no-wrap align-items-center d-flex call_button"> Play <img style='width:130px; margin-left:10px; margin-bottom:15px; ' src='images/extra_objects/ddd.jpg' alt=""> </button> 
            <img id='scarabeo' style=' margin-top:15px;' src='images/extra_objects/1.svg' alt="">        
        </div>
        <div class="d-flex container-sm  mt-3 flex-column"></div>
        <!---------------------------------------------------->

        <!--------------------------------------- RANK LIST ------------------------------------------>
        <div style='max-width:800px' class="rank d-flex container-sm mt-4 flex-column text-white">           
            <button class='mx-4' style='background-color:black;'>
                <p class='d-flex justify-content-between align-items-center' style='color:white; padding: 10px; margin: 0;'>  
                    <span>Click to refresh</span>  
                    <i style='color:white; font-size:20px;' class="fa-solid fa-rotate"></i>
                    <!----------------- deprecated ----------------------->                 
                    <!-- <span class='d-flex justify-content-center'>
                        <span>Click to refresh</span>  
                        <i style='color:white; font-size:20px; margin-left:12px; margin-top:2px;' class="fa-solid fa-rotate"></i>
                    </span>
                    
                    <span>
                        <img style='width:30px;' src="images/extra_objects/ff.png" alt="">
                        <span style='padding:2px 10px; margin:0 0px; border-radius:100px;'> 4 / 6</span>
                    </span>  --> 
                    <!----------------------------------------------------->
                </p> 
            </button>

            <p class='mx-5'>Next rank photo : 6g 9h 34m 59s</p>
            
            
            <!---------------------------- User record examaples ---------------------------->
            <div style="background-color:#EDEB52;"  class="record mx-4 mx-4">
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
            <div style="background-color:#EE5E81;"  class="record mx-4">
                <p  style='color:black; font-size:x-smal; padding: 10px; margin: 0; text-overflow: ellipsis; white-space: nowrap;  overflow:hidden;'>2°
                    <img style='width:20px; margin-left:5px; margin-right:5px;  margin-bottom:3px;' src='images/extra_objects/iconaplayB.png'> 0xF83611F45e11b590eBB9FdABa9ee12e7Dc9E9393
                </p> 
                <span class='align-items-center' style='color:black; margin-right: 10px; white-space: nowrap; padding:0 10px; border-radius: 20px; display:flex;'> 6  <i class="fa-solid fa-bolt ml-1"></i></span>
            </div>
            <!------------------------------------------------------------------------------>

    
            <!-- Looping through players --------------------------------------------------->
                  <!-- <div v-for="players in playersArray" v-bind:key="players.id" style="background-color:#EDEB52;"  class="record mx-4">
                  
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
            
                <div style="background-color:#EDEB52;"  class="record mx-4">
                    <p  style='color:black; font-size:x-smal; padding: 10px; margin: 0; text-overflow: ellipsis; white-space: nowrap;  overflow:hidden;'>2°
                        <img style='width:20px; margin-left:5px; margin-right:5px;  margin-bottom:3px;'   src='images/extra_objects/iconaplayB.png'> 0xF83611F45e11b590eBB9FdABa9ee12e7Dc9E9393
                    </p> 
                    <span class='align-items-center' style='color:black; margin-right: 10px;     white-space: nowrap;     background-color: ;  padding:0 10px;  border-radius: 20px; display:flex;'> 6  <i class="fa-solid fa-bolt ml-1"></i></span>
                </div>
                <div style="background-color:#EE3634;"  class="record mx-4 shake">
                    <p  style='color:; font-size:x-smal; padding: 10px; margin: 0; text-overflow: ellipsis; white-space: nowrap;  overflow:hidden;'>2°
                        <img id='shake' style='width:20px; margin-left:5px; margin-right:5px;  margin-bottom:3px;'   src='images/extra_objects/iconaplayW.png'> 0xF83611F45e11b590eBB9FdABa9ee12e7Dc9E9393
                    </p> 
                    <span class='align-items-center' style='color:; margin-right: 10px;     white-space: nowrap;     background-color: ;  padding:0 10px;  border-radius: 20px; display:flex;'> 1  <i class="fa-solid fa-bolt ml-1"></i></span>
                </div>
                <div style="background-color:#3C5FA1;"  class="record mx-4">
                    <p  style='color:; font-size:x-smal; padding: 10px; margin: 0; text-overflow: ellipsis; white-space: nowrap;  overflow:hidden;'>2°
                        <img style='width:20px; margin-left:5px; margin-right:5px;  margin-bottom:3px;'   src='images/extra_objects/iconaplayW.png'> 0xF83611F45e11b590eBB9FdABa9ee12e7Dc9E9393
                    </p> 
                    <span class='align-items-center' style='color:; margin-right: 10px;     white-space: nowrap;     background-color: ;  padding:0 10px;  border-radius: 20px; display:flex;'> 1  <i class="fa-solid fa-bolt ml-1"></i></span>
                </div>

                <div style="background-color:#EE3634;"  class="record mx-4 shake">
                    <p  style='color:; font-size:x-smal; padding: 10px; margin: 0; text-overflow: ellipsis; white-space: nowrap;  overflow:hidden;'>2°
                        <img id='shake' style='width:20px; margin-left:5px; margin-right:5px;  margin-bottom:3px;'   src='images/extra_objects/iconaplayW.png'> 0xF83611F45e11b590eBB9FdABa9ee12e7Dc9E9393
                    </p> 
                    <span class='align-items-center' style='color:; margin-right: 10px;     white-space: nowrap;     background-color: ;  padding:0 10px;  border-radius: 20px; display:flex;'> 1  <i class="fa-solid fa-bolt ml-1"></i></span>
                </div>
                <div style="background-color:#3C5FA1;"  class="record mx-4">
                    <p  style='color:; font-size:x-smal; padding: 10px; margin: 0; text-overflow: ellipsis; white-space: nowrap;  overflow:hidden;'>2°
                        <img style='width:20px; margin-left:5px; margin-right:5px;  margin-bottom:3px;'   src='images/extra_objects/iconaplayW.png'> 0xF83611F45e11b590eBB9FdABa9ee12e7Dc9E9393
                    </p> 
                    <span class='align-items-center' style='color:; margin-right: 10px;     white-space: nowrap;     background-color: ;  padding:0 10px;  border-radius: 20px; display:flex;'> 1  <i class="fa-solid fa-bolt ml-1"></i></span>
                </div>
                <div style="background-color:#EDEB52;"  class="record mx-4">
                    <p  style='color:black; font-size:x-smal; padding: 10px; margin: 0; text-overflow: ellipsis; white-space: nowrap;  overflow:hidden;'>2°
                        <img style='width:20px; margin-left:5px; margin-right:5px;  margin-bottom:3px;'   src='images/extra_objects/iconaplayB.png'> 0xF83611F45e11b590eBB9FdABa9ee12e7Dc9E9393
                    </p> 
                    <span class='align-items-center' style='color:black; margin-right: 10px;     white-space: nowrap;     background-color: ;  padding:0 10px;  border-radius: 20px; display:flex;'> 6  <i class="fa-solid fa-bolt ml-1"></i></span>
                </div>
                <div style="background-color:#EE3634;"  class="record mx-4 shake">
                    <p  style='color:; font-size:x-smal; padding: 10px; margin: 0; text-overflow: ellipsis; white-space: nowrap;  overflow:hidden;'>2°
                        <img id='shake' style='width:20px; margin-left:5px; margin-right:5px;  margin-bottom:3px;'   src='images/extra_objects/iconaplayW.png'> 0xF83611F45e11b590eBB9FdABa9ee12e7Dc9E9393
                    </p> 
                    <span class='align-items-center' style='color:; margin-right: 10px;     white-space: nowrap;     background-color: ;  padding:0 10px;  border-radius: 20px; display:flex;'> 1  <i class="fa-solid fa-bolt ml-1"></i></span>
                </div>
                <div style="background-color:#3C5FA1;"  class="record mx-4">
                    <p  style='color:; font-size:x-smal; padding: 10px; margin: 0; text-overflow: ellipsis; white-space: nowrap;  overflow:hidden;'>2°
                        <img style='width:20px; margin-left:5px; margin-right:5px;  margin-bottom:3px;'   src='images/extra_objects/iconaplayW.png'> 0xF83611F45e11b590eBB9FdABa9ee12e7Dc9E9393
                    </p> 
                    <span class='align-items-center' style='color:; margin-right: 10px;     white-space: nowrap;     background-color: ;  padding:0 10px;  border-radius: 20px; display:flex;'> 1  <i class="fa-solid fa-bolt ml-1"></i></span>
                </div>
                <div style="background-color:#EDEB52;"  class="record mx-4">
                    <p  style='color:black; font-size:x-smal; padding: 10px; margin: 0; text-overflow: ellipsis; white-space: nowrap;  overflow:hidden;'>2°
                        <img style='width:20px; margin-left:5px; margin-right:5px;  margin-bottom:3px;'   src='images/extra_objects/iconaplayB.png'> 0xF83611F45e11b590eBB9FdABa9ee12e7Dc9E9393
                    </p> 
                    <span class='align-items-center' style='color:black; margin-right: 10px;     white-space: nowrap;     background-color: ;  padding:0 10px;  border-radius: 20px; display:flex;'> 6  <i class="fa-solid fa-bolt ml-1"></i></span>
                </div>
                <div style="background-color:#EE3634;"  class="record mx-4 shake">
                    <p  style='color:; font-size:x-smal; padding: 10px; margin: 0; text-overflow: ellipsis; white-space: nowrap;  overflow:hidden;'>2°
                        <img id='shake' style='width:20px; margin-left:5px; margin-right:5px;  margin-bottom:3px;'   src='images/extra_objects/iconaplayW.png'> 0xF83611F45e11b590eBB9FdABa9ee12e7Dc9E9393
                    </p> 
                    <span class='align-items-center' style='color:; margin-right: 10px;     white-space: nowrap;     background-color: ;  padding:0 10px;  border-radius: 20px; display:flex;'> 1  <i class="fa-solid fa-bolt ml-1"></i></span>
                </div>
                <div style="background-color:#3C5FA1;"  class="record mx-4">
                    <p  style='color:; font-size:x-smal; padding: 10px; margin: 0; text-overflow: ellipsis; white-space: nowrap;  overflow:hidden;'>2°
                        <img style='width:20px; margin-left:5px; margin-right:5px;  margin-bottom:3px;'   src='images/extra_objects/iconaplayW.png'> 0xF83611F45e11b590eBB9FdABa9ee12e7Dc9E9393
                    </p> 
                    <span class='align-items-center' style='color:; margin-right: 10px;     white-space: nowrap;     background-color: ;  padding:0 10px;  border-radius: 20px; display:flex;'> 1  <i class="fa-solid fa-bolt ml-1"></i></span>
                </div>
                <div style="background-color:#EDEB52;"  class="record mx-4">
                    <p  style='color:black; font-size:x-smal; padding: 10px; margin: 0; text-overflow: ellipsis; white-space: nowrap;  overflow:hidden;'>2°
                        <img style='width:20px; margin-left:5px; margin-right:5px;  margin-bottom:3px;'   src='images/extra_objects/iconaplayB.png'> 0xF83611F45e11b590eBB9FdABa9ee12e7Dc9E9393
                    </p> 
                    <span class='align-items-center' style='color:black; margin-right: 10px;     white-space: nowrap;     background-color: ;  padding:0 10px;  border-radius: 20px; display:flex;'> 6  <i class="fa-solid fa-bolt ml-1"></i></span>
                </div>
                <div style="background-color:#EE3634;"  class="record mx-4 shake">
                    <p  style='color:; font-size:x-smal; padding: 10px; margin: 0; text-overflow: ellipsis; white-space: nowrap;  overflow:hidden;'>2°
                        <img id='shake' style='width:20px; margin-left:5px; margin-right:5px;  margin-bottom:3px;'   src='images/extra_objects/iconaplayW.png'> 0xF83611F45e11b590eBB9FdABa9ee12e7Dc9E9393
                    </p> 
                    <span class='align-items-center' style='color:; margin-right: 10px;     white-space: nowrap;     background-color: ;  padding:0 10px;  border-radius: 20px; display:flex;'> 1  <i class="fa-solid fa-bolt ml-1"></i></span>
                </div>
                <div style="background-color:#3C5FA1;"  class="record mx-4">
                    <p  style='color:; font-size:x-smal; padding: 10px; margin: 0; text-overflow: ellipsis; white-space: nowrap;  overflow:hidden;'>2°
                        <img style='width:20px; margin-left:5px; margin-right:5px;  margin-bottom:3px;'   src='images/extra_objects/iconaplayW.png'> 0xF83611F45e11b590eBB9FdABa9ee12e7Dc9E9393
                    </p> 
                    <span class='align-items-center' style='color:; margin-right: 10px;     white-space: nowrap;     background-color: ;  padding:0 10px;  border-radius: 20px; display:flex;'> 1  <i class="fa-solid fa-bolt ml-1"></i></span>
                </div>
                <div style="background-color:#EE5E81;"  class="record mx-4">
                    <p  style='color:black; font-size:x-smal; padding: 10px; margin: 0; text-overflow: ellipsis; white-space: nowrap;  overflow:hidden;'>2°
                        <img style='width:20px; margin-left:5px; margin-right:5px;  margin-bottom:3px;'   src='images/extra_objects/iconaplayB.png'> 0xF83611F45e11b590eBB9FdABa9ee12e7Dc9E9393
                    </p> 
                    <span class='align-items-center' style='color:black; margin-right: 10px;     white-space: nowrap;     background-color: ;  padding:0 10px;  border-radius: 20px; display:flex;'> 6  <i class="fa-solid fa-bolt ml-1"></i></span>
                </div>
                <div style="background-color:#EE3634;"  class="record mx-4 shake">
                    <p  style='color:; font-size:x-smal; padding: 10px; margin: 0; text-overflow: ellipsis; white-space: nowrap;  overflow:hidden;'>2°
                        <img id='shake' style='width:20px; margin-left:5px; margin-right:5px;  margin-bottom:3px;'   src='images/extra_objects/iconaplayW.png'> 0xF83611F45e11b590eBB9FdABa9ee12e7Dc9E9393
                    </p> 
                    <span class='align-items-center' style='color:; margin-right: 10px;     white-space: nowrap;     background-color: ;  padding:0 10px;  border-radius: 20px; display:flex;'> 1  <i class="fa-solid fa-bolt ml-1"></i></span>
                </div>
                <div style="background-color:#3C5FA1;"  class="record mx-4">
                    <p  style='color:; font-size:x-smal; padding: 10px; margin: 0; text-overflow: ellipsis; white-space: nowrap;  overflow:hidden;'>2°
                        <img style='width:20px; margin-left:5px; margin-right:5px;  margin-bottom:3px;'   src='images/extra_objects/iconaplayW.png'> 0xF83611F45e11b590eBB9FdABa9ee12e7Dc9E9393
                    </p> 
                    <span class='align-items-center' style='color:; margin-right: 10px;     white-space: nowrap;     background-color: ;  padding:0 10px;  border-radius: 20px; display:flex;'> 1  <i class="fa-solid fa-bolt ml-1"></i></span>
                </div>
                <div style="background-color:#EE5E81;"  class="record mx-4">
                    <p  style='color:black; font-size:x-smal; padding: 10px; margin: 0; text-overflow: ellipsis; white-space: nowrap;  overflow:hidden;'>2°
                        <img style='width:20px; margin-left:5px; margin-right:5px;  margin-bottom:3px;'   src='images/extra_objects/iconaplayB.png'> 0xF83611F45e11b590eBB9FdABa9ee12e7Dc9E9393
                    </p> 
                    <span class='align-items-center' style='color:black; margin-right: 10px;     white-space: nowrap;     background-color: ;  padding:0 10px;  border-radius: 20px; display:flex;'> 6  <i class="fa-solid fa-bolt ml-1"></i></span>
                </div>
                <div style="background-color:#EE3634;"  class="record mx-4 shake">
                    <p  style='color:; font-size:x-smal; padding: 10px; margin: 0; text-overflow: ellipsis; white-space: nowrap;  overflow:hidden;'>2°
                        <img id='shake' style='width:20px; margin-left:5px; margin-right:5px;  margin-bottom:3px;'   src='images/extra_objects/iconaplayW.png'> 0xF83611F45e11b590eBB9FdABa9ee12e7Dc9E9393
                    </p> 
                    <span class='align-items-center' style='color:; margin-right: 10px;     white-space: nowrap;     background-color: ;  padding:0 10px;  border-radius: 20px; display:flex;'> 1  <i class="fa-solid fa-bolt ml-1"></i></span>
                </div>
                <div style="background-color:#3C5FA1;"  class="record mx-4">
                    <p  style='color:; font-size:x-smal; padding: 10px; margin: 0; text-overflow: ellipsis; white-space: nowrap;  overflow:hidden;'>2°
                        <img style='width:20px; margin-left:5px; margin-right:5px;  margin-bottom:3px;'   src='images/extra_objects/iconaplayW.png'> 0xF83611F45e11b590eBB9FdABa9ee12e7Dc9E9393
                    </p> 
                    <span class='align-items-center' style='color:; margin-right: 10px;     white-space: nowrap;     background-color: ;  padding:0 10px;  border-radius: 20px; display:flex;'> 1  <i class="fa-solid fa-bolt ml-1"></i></span>
                </div>
            
            
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
