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


        <!---------------------------------------------------->

        <!----------------------- LOGO ----------------------->
        <div id="_box1_" class="container-sm d-flex justify-content-center align-items-center flex-column">

            <!-- BANNER EVENT IMPORTANT  -->
            <!-- <p class='text-white' style='font-family: "VT323", monospace;   margin-bottom:35px; '>Sun Dec 17 1995 03:24:00 UTC+1 ROME </p> -->
            <!-- <p class='text-white' style='font-family: "VT323", monospace;   margin-bottom:35px; '>Next token recharge 23h 59m 59s</p> -->
            <div class="d-flex flex-column justify-content-center  alingn-items-center">
                <!-- <img style=' width:30px; ' src='images/board/tree.png' alt="">  -->

                <div class="d-flex justify-content-center  alingn-items-center">
                    <img style="width: 60px; margin-bottom: 20px; display: inline; transform: scaleX(-1);" src="images/extra_objects/icon-06.png" alt=""/>
                    <router-link :to="{ path: 'game' }" style="display: contents">
                        <button id="modalx" class="no-wrap align-items-center text-big d-flex px-4 call_button">
                            <span>
                                Jungle chess
                            </span>
                        </button>
                    </router-link>
                    <img style="width: 60px; margin-bottom: 20px; display: inline" src="images/extra_objects/icon-05.png" alt="" />
                </div>

                <!-- <div class="d-flex justify-content-center  alingn-items-center mt-3">
                    <img style="width: 60px; margin-bottom: 20px; display: inline; transform: scaleX(-1);" src="images/board/animals/icon-38.png" alt=""/>
                    <router-link :to="{ path: 'game' }" style="display: contents">
                        <button id="modalx" style='background:black;' class="no-wrap align-items-center text-big d-flex px-4 call_button">
                            <span>
                                Classic chess
                            </span>
                        </button>
                    </router-link>
                    <img style="width: 60px; margin-bottom: 20px; display: inline" src="images/board/animals/icon-38.png" alt="" />
                </div> -->

                <!-- <div class="d-flex justify-content-center  alingn-items-center mt-3">
                    <img style="width: 60px; margin-bottom: 20px; display: inline; transform: scaleX(-1);" src="images/board/animals/icon-38.png" alt=""/>
                    <router-link :to="{ path: 'game' }" style="display: contents">
                        <button id="modalx" style='background:black;' class="no-wrap align-items-center text-big d-flex px-4 call_button">
                            <span>
                                Onitama ches
                            </span>
                        </button>
                    </router-link>
                    <img style="width: 60px; margin-bottom: 20px; display: inline" src="images/board/animals/icon-38.png" alt="" />
                </div> -->

            </div>

            <!-- BANNER EVENT IMPORTANT  -->
            <!-- <p class='text-white' style='font-family: "VT323", monospace;   margin-top:25px; '>Sun Dec 17 2034 03:24:00 UTC+1 ROME</p> -->
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



            <!-- 1 May BIG TASK : 
            - display a record class div model for any user in database ordered by power 
            - if user field written in comment is true (or more then 0) show image 
             -->
            <!---------------------------- User record examaples ---------------------------->
            <div style="background-color:#EDEB52;"  class="record">
                <p  style='color:black; font-size:x-smal; padding: 10px; margin: 0; text-overflow: ellipsis; white-space: nowrap;  overflow:hidden;'>1°
                    <img style='width:20px; margin-left:5px; margin-right:5px;  margin-bottom:3px;'   src='images/extra_objects/iconaplayB.png'>
                    <!-- <img style='width:20px; margin-left:5px; margin-right:5px;  margin-bottom:3px; filter: invert(1);'   src='images/extra_objects/punk.png'> --> 

                    0xF83611F45e11b590eBB9FdABa9ee12e7Dc9E9393 <!-- wallet_address -->
                </p>
                <div class='d-flex align-items-center flex-row flex-nowrap'>
                    <img style='width:35px; ' src='images/board/animals/icon-59.png' alt=""> <!-- nft_9_cat  -->
                    <img style='width:35px; ' src='images/board/animals/icon-36.png' alt=""> <!-- nft_10_monkey -->
                    <img style='width:35px; ' src='images/board/animals/icon-39.png' alt=""> <!-- nft_22_leo_3 -->
                    <img style='width:35px; ' src='images/board/animals/icon-38.png' alt="">   <!-- nft_22_leo_2 -->
                    <img style='width:35px; ' src='images/board/animals/icon-37.png' alt=""> <!-- nft_22_leo_1 -->
                    <img style='width:20px; margin:0px 5px; filter: invert(1);' src='images/extra_objects/8.png' alt=""> <!-- nft_13_doodle -->
                    <img style='width:20px; margin:0px 5px; filter: invert(1);' src='images/extra_objects/mario.png' alt=""> <!-- nft_14_sandbox -->
                    <img style='width:18px; margin:0px 5px; filter: invert(1);' src='images/extra_objects/palm.png' alt=""> <!-- nft_20_land -->
                    <img style='width:20px; margin:0px 5px; filter: invert(1);' src='images/extra_objects/ghost.png' alt=""> <!-- nft_15_totem -->
                    <i style='font-size:20px; color:black; margin:0px 5px;'  class="fa-solid fa-hand-fist"></i> <!-- nft_11_punks -->
                    <i style='font-size:20px; color:black; margin:0px 5px;' class="fa-solid fa-egg"></i> <!-- nft_12_monster -->
                    <img style='width:25px; margin-left:5px; height:13px; filter: invert(1);' src='images/extra_objects/nike.png' alt=""> <!-- nft_16_nike  -->
                    <img style='width:25px; margin:0px 5px; ' src='images/extra_objects/adidas.png' alt=""> <!-- nft_17_adidas  -->
                    <img style='width:30px; margin:0px 5px; ' src='images/extra_objects/coco.png' alt=""> <!-- nft_19_lacoste -->
                    <img style='width:20px; margin:0px 5px; filter: invert(1);' src='images/extra_objects/wb.png' alt=""> <!--  -->
                    <img style='width:20px; margin:0px 5px; filter: invert(1);' src='images/extra_objects/pepsi.png' alt=""> <!-- nft_18_pepsi -->
                    <img style='width:22px; margin:0px 5px; filter: invert(1);' src='images/extra_objects/bot.png' alt=""> <!-- nft_8_bot -->
                    <img style='width:23px; margin:0px 5px; filter: invert(1);' src='images/extra_objects/raygun.png' alt=""> <!-- nft_21_raygun -->
                    <i style='font-size:20px; color:black; margin:0px 5px;'  class="fa-solid fa-battery-full"></i> <!-- nft_3_battery -->
                </div>
                <span class='align-items-center' style='color:black; margin-right: 10px;     white-space: nowrap;     background-color: ;  padding:0 10px;  border-radius: 20px; display:flex;'> 100 <!-- power --> <i class="fa-solid fa-bolt ml-1"></i></span>
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
