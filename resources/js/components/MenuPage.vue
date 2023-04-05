<template>
    <div id="page1" style="" class="centratore flex-column  align-items-center">


        <!------------------------ modal DEPRECATED --------------------->
        <!-- <div id="myModalkoo6" class="modal justify-content-center align-items-center" >
            <div class="modal-content d-flex flex-column align-items-center justify-content-center " >
                <p style="color: red">Login failed</p>
            </div>
        </div> -->
        <!------------------------------------------------------------->



        <!-------------------------- NAV  ------------------------------>
        <div class="d-flex banner-board-helper align-items-center" style=' background-color:black; height:80px;  color: black; '>    
            <div id='' class="d-flex align-items-center position:absolute; top:0;">
                <img style="width: 100px; margin-left: 5px; margin-bottom: 3px" src="images/extra_objects/ddd.jpg" alt="" />
                <i style='display:inline; margin-bottom:25px;position:relative; margin-right:0px' class="fa-solid fa-bars"></i>
                <button style='display:;border:1px solid black; padding: 20px 0px 15px 15px; color:white; background-color:black; border-radius:20px;  '>
                    <!-- <p style='display:inline; background:white; border-radius:10px; background-color:black; color:white; border:1px solid white; padding:10px;' >Login </p> -->
                    <img style='display:inline; width:30px; margin-left:0px; margin-bottom:3px;'   src='images/extra_objects/iconaplay1.png' alt="">
                </button>
            </div>
        </div>
        <!-------------------------------------------------------------->





        <!-------------------------------- EYE HAND deprecated ----------------------------------->
        <div class="d-flex align-items-center flex-column">
            <img id="img_xxx" class="ra" style="display:none;margin-bottom: 100px;" src="images/extra_objects/xxx.png" alt=""/>
            <img id="img_xxxxy" class="ra" style="display:none;margin-bottom: 100px" src="images/extra_objects/xxxxy.png" alt=""/>
        </div>
        <!----------------------------------------------------------------------------->

        <!-------------------------- BUTTONS  ------------------------------>
        <div style="height:calc(80vh - 80px);" class="justify-content-center align-content-center d-flex">
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