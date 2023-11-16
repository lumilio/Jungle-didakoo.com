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
                                START GAME
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
            <!-- <p class='text-white' style='font-family: "VT323", monospace;   margin-bottom:35px; '>Next token recharge 23h 59m 59s</p> -->
            <img id='scarabeo'  style='margin-top:20px;' src='images/extra_objects/17.svg' alt="">
        </div>
        <div class="d-flex container-sm  mt-3 flex-column"></div>
        <!---------------------------------------------------->

        <!--------------------------------------- RANK LIST ------------------------------------------>
        <div style='max-width:800px' class="rank d-flex container-sm  flex-column align-items-center text-white">

            <button class='refresh-button' style='background-color:black;'>
                <div class='d-flex justify-content-center align-items-center' style='color:white; padding: 10px; margin: 0;'>
                    <!-- <span class="mr-2 " style="font-size:; white-space:nowrap;">Last list update <span style="font-size:30px;"></span>  </span> -->
                    <p class='text-white' style='font-family: "VT323", monospace;'>Next update list in 15 sec </p>
                    <div class="d-flex">
                        <!-- <div class="container" style="width:100%; background-color:;">100%</div> -->
                        <!-- <i style='color:white; font-size:20px;' class="fa-solid fa-rotate ml-2"></i> -->
                        <img style='width:30px;' src="images/extra_objects/sandtime.png" alt="">
                    </div>
                </div>
            </button>



            <!-- 24 JULY TASK - 1 :

                Keep the same css rule of the thiv .refresh-button on RECORD colored div

             -->


            <!-- Looping through players --------------------------------------------------->
                <router-link
                    v-for="(players, playerListIndex) in playersArray"
                    v-bind:key="players.id"
                    class="record"
                    :style="{backgroundColor : backgroundBord ? backgroundBord : '#EDEB52', textDecoration: 'none'}"
                    :to="{ path: 'avatar', query: { wallet_address: players.wallet_address, player_list_index: playerListIndex + 1 } }"
                >
                    <div :style="{
                        color: colorAddress ?? 'black',
                        textOverflow: 'ellipsis',
                        whiteSpace: 'nowrap',
                        overflow: 'hidden'
                    }">
                        <p :style="{
                            color: colorAddress ?? 'black',
                            fontSize: '14.5px',
                            padding: '10px',
                            margin: '0',
                            textOverflow: 'ellipsis',
                            whiteSpace: 'nowrap',
                            overflow: 'hidden',
                            textDecoration: textDecorationAddress ? textDecorationAddress : 'black'}"
                        >
                            {{ playerListIndex + 1 }}°
                            <img
                                :src="avatarSrc ? avatarSrc : '../../../images/extra_objects/iconaplayB.png'" alt="User Avatar"
                                style="width: 20px; margin-left: 5px; margin-right: 5px; margin-bottom: 3px;" />
                            {{ players.wallet_address }}
                        </p>
                    </div>
                    <div class='d-flex align-items-center flex-row flex-nowrap'>
                        <template v-for="(item, key) in NFT_LINKS" v-if="players[key] > 0 && item">
                            <img style='width:35px;' :src="item" alt=""/>
                        </template>
                    </div>

                    <!--                      <div class='d-flex align-items-center flex-row flex-nowrap'>-->
                    <!--                          <img style='width:35px;' src='../../../images/board/animals/icon-59.png' alt=""> &lt;!&ndash; nft_9_cat  &ndash;&gt;-->
                    <!--                          <img style='width:35px;' src='../../../images/board/animals/icon-36.png' alt=""> &lt;!&ndash; nft_10_monkey &ndash;&gt;-->
                    <!--                          <img style='width:35px;' src='../../../images/board/animals/icon-39.png' alt=""> &lt;!&ndash; nft_22_leo_3 &ndash;&gt;-->
                    <!--                          <img style='width:35px;' src='../../../images/board/animals/icon-38.png' alt="">   &lt;!&ndash; nft_22_leo_2 &ndash;&gt;-->
                    <!--                          <img style='width:35px;' src='../../../images/board/animals/icon-37.png' alt=""> &lt;!&ndash; nft_22_leo_1 &ndash;&gt;-->
                    <!--                          <img style='width:20px; margin:0 5px; filter: invert(1);' src='../../../images/extra_objects/8.png' alt=""> &lt;!&ndash; nft_13_doodle &ndash;&gt;-->
                    <!--                          <img style='width:20px; margin:0 5px; filter: invert(1);' src='../../../images/extra_objects/mario.png' alt=""> &lt;!&ndash; nft_14_sandbox &ndash;&gt;-->
                    <!--                          <img style='width:18px; margin:0 5px; filter: invert(1);' src='../../../images/extra_objects/palm.png' alt=""> &lt;!&ndash; nft_20_land &ndash;&gt;-->
                    <!--                          <img style='width:20px; margin:0 5px; filter: invert(1);' src='../../../images/extra_objects/ghost.png' alt=""> &lt;!&ndash; nft_15_totem &ndash;&gt;-->
                    <!--                          <i style='font-size:20px; color:black; margin:0 5px;'  class="fa-solid fa-hand-fist"></i> &lt;!&ndash; nft_11_punks &ndash;&gt;-->
                    <!--                          <i style='font-size:20px; color:black; margin:0 5px;' class="fa-solid fa-egg"></i> &lt;!&ndash; nft_12_monster &ndash;&gt;-->
                    <!--                          <img style='width:25px; margin-left:5px; height:13px; filter: invert(1);' src='../../../images/extra_objects/nike.png' alt=""> &lt;!&ndash; nft_16_nike  &ndash;&gt;-->
                    <!--                          <img style='width:25px; margin:0 5px;' src='../../../images/extra_objects/adidas.png' alt=""> &lt;!&ndash; nft_17_adidas  &ndash;&gt;-->
                    <!--                          <img style='width:30px; margin:0 5px;' src='../../../images/extra_objects/coco.png' alt=""> &lt;!&ndash; nft_19_lacoste &ndash;&gt;-->
                    <!--                          <img style='width:20px; margin:0 5px; filter: invert(1);' src='../../../images/extra_objects/wb.png' alt=""> &lt;!&ndash;  &ndash;&gt;-->
                    <!--                          <img style='width:20px; margin:0 5px; filter: invert(1);' src='../../../images/extra_objects/pepsi.png' alt=""> &lt;!&ndash; nft_18_pepsi &ndash;&gt;-->
                    <!--                          <img style='width:22px; margin:0 5px; filter: invert(1);' src='../../../images/extra_objects/bot.png' alt=""> &lt;!&ndash; nft_8_bot &ndash;&gt;-->
                    <!--                          <img style='width:23px; margin:0 5px; filter: invert(1);' src='../../../images/extra_objects/raygun.png' alt=""> &lt;!&ndash; nft_21_raygun &ndash;&gt;-->
                    <!--                          <i style='font-size:20px; color:black; margin:0 5px;'  class="fa-solid fa-battery-full"></i> &lt;!&ndash; nft_3_battery &ndash;&gt;-->
                    <!--                      </div>-->
                    <span class='align-items-center' :style="{color:colorPower ? colorPower : 'black', marginRight: '10px',whiteSpace: 'nowrap',  backgroundColor: '',  padding:'0 10px',  borderRadius: '20px', display:'flex'}">
                        {{ formatPower(players.power) }} <i class="fa-solid fa-bolt ml-1"></i>
                    </span>
                </router-link>

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
import store from "../../store";
import NFT_LINKS from "../../constants/nftLinks";
import { getColorStyles } from '../../utilites/getColorByUserColorId';
 export default {
    data(){
        return{
            playersArray: [],
            url: '',
            backgroundBord: '',
            colorAddress:'',
            colorPower: '',
            avatarSrc: '',
            textDecorationAddress: '',
        }
    },
     created() {
         this.getColorByUserColorId();
     },
     computed: {
         NFT_LINKS() {
             return NFT_LINKS
         },
         user() {
             return store.state.user
         },
         address() {
             return store.state.address
         },
         userData(){
             return store.state.userData
         }
     },
    methods:{
        async getAllUsers()
        {
            this.url = window.location.host;
            const response = await axios.get('http://'+this.url+'/api/get-users');
            this.playersArray = response.data.users;
        },
        getColorByUserColorId() {
            try {
                const colorStyles = getColorStyles(this.userData.color_id);
                this.backgroundBord = colorStyles.backgroundBord;
                this.colorAddress = colorStyles.colorAddress;
                this.colorPower = colorStyles.colorPower;
                this.avatarSrc = colorStyles.avatarSrc;
                this.textDecorationAddress = colorStyles.textDecorationAddress;
            } catch (error) {
                console.error(error);
                this.user = null;
            }
        },
        formatPower(power) {
            return power >= 1000000 ? `${Math.floor(power / 1000000)}M+` : ( power >= 1000 ? `${Math.floor(power / 1000)}k+` : `${power}` )
        }
    },
     watch:{
         userData() {
                 this.getColorByUserColorId();
         }
     },
    async mounted()
    {
        await this.getAllUsers();
    },

 }
</script>
