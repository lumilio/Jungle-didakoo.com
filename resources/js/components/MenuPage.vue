<template>
    <div id="page1" style="" class="centratore justify-content-center  align-items-center">





        <!------------------------ modal DEPRECATED --------------------->
        <!-- <div id="myModalkoo6" class="modal justify-content-center align-items-center" >
            <div class="modal-content d-flex flex-column align-items-center justify-content-center " >
                <p style="color: red">Login failed</p>
            </div>
        </div> -->
        <!------------------------------------------------------------->





        <!-------------------------- NAV  ------------------------------>
        <div style="padding-bottom: 0px; height: 80px; position: absolute; top: 0; background-color: black; " class="container-fluid bg-black" >
            <div class="justify-content-around d-flex align-items-center" style="z-index: 1000" >
                <div class="avatar_helper_1"></div>
                <div class="avatar_helper_1"></div>
                <div class="avatar_helper_1"></div>
                <div class="avatar_helper_1"></div>
                <div class="avatar_helper_1"></div>
                <div class="avatar_helper_1"></div>

                <!-- <img style="width: 60px; margin-bottom: 20px; display: inline; transform: scaleX(-1);" src="images/extra_objects/icon-06.png" alt=""/> -->
                <div>
                    <button id="ready_player_1" style="display: inline; border: 1px solid black; margin-top: 13px; padding: 15px; padding-right: 5px; color: white; background-color: black; border-radius: 20px; margin-bottom: 30px;">
                        <img style="width: 100px; margin-left: 5px; margin-bottom: 3px" src="images/extra_objects/ddd.jpg" alt="" />
                        <!-- <p class="avatar_helper_1" style='color:white;   border: 1px solid white; padding: 5px; margin-left: 9px; '>v 2.1</p> -->
                    </button>
                </div>
                <!-- <img style="width: 60px; margin-bottom: 20px; display: inline" src="images/extra_objects/icon-05.png" alt="" /> -->

                <div class="avatar_helper_1"></div>
                <div class="avatar_helper_1"></div>
                <div class="avatar_helper_1"></div>
                <div class="avatar_helper_1"></div>
                <div class="avatar_helper_1"></div>
                <div class="avatar_helper_1"></div>
            </div>
        </div>
        <!-------------------------------------------------------------->

        <!-------------------------------- EYE HAND ----------------------------------->
        <div class="d-flex align-items-center flex-column">
            <img id="img_xxx" class="ra" style="display:none;margin-bottom: 100px;" src="images/extra_objects/xxx.png" alt=""/>
            <img id="img_xxxxy" class="ra" style="display:none;margin-bottom: 100px" src="images/extra_objects/xxxxy.png" alt=""/>
        </div>
        <!----------------------------------------------------------------------------->

        <!-------------------------- BUTTONS  ------------------------------>
        <div class="bt">
            <a href="#">
                <div class="square" onclick="web3Login();">
                    <i id="led" class="fa-solid fa-circle" ></i>
                    <i class="fa-solid fa-power-off"></i>
                </div>
            </a>
            <a id="modalz" href="#">
                <div class="square">
                    <img id="buttton_v_1" src="images/extra_objects/scarabeo.png" alt="" />
                </div>
            </a>
            <a id="modaly" href="#">
                <div class="square">
                    <!-- <i class="fa-solid fa-sheet-plastic"></i> -->
                    <span class="text-white">1.0</span>
                </div>
            </a>
        </div>
        <!------------------------------------------------------------------>


    </div>
</template>

<script>
import Game from "./Game/Game.vue";
export default {
    
    components: {
            Game,
    },

    data(){
        return {
            test: false,
        }
    },

    methods:{
        getStatus: function () {
            setInterval( async function()
            {
                const {ethereum} = window;
                const accounts = await ethereum.request({method: 'eth_accounts'});
                console.log(accounts);
                if (accounts && accounts.length > 0) {
                    this.test = true;
                }
                else{
                    // console.log('user not logged in');
                    this.test = false;
                }
            },2000);   
        },
    },

    watch:{
        test()
        {
            this.getStatus();
        }
    },

    mounted () {
        console.log("Menu PAge Component mounted."); 
    },

};
</script>