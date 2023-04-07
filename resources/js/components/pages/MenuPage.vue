<template>
    <div id="page1" style="" class="centratore flex-column  align-items-center">

        <!-------------------------------- EYE HAND ----------------------------------->
        <div class="d-flex align-items-center flex-column">
            <img id="img_xxx" class="ra" style="margin-bottom: 100px;" src="images/extra_objects/xxx.png" alt=""/>
            <img id="img_xxxxy" class="ra" style="margin-bottom: 100px" src="images/extra_objects/xxxxy.png" alt=""/>
        </div>
        <!----------------------------------------------------------------------------->

        <!-------------------------- BUTTONS  ------------------------------>
        <div style="height:calc(80vh - 80px);" class="justify-content-center align-content-center d-flex">
            <div class="bt">
                <a type="button">
                    <div class="square" onclick="web3Login();">
                        <i id="led" class="fa-solid fa-circle" ></i>
                        <i class="fa-solid fa-power-off"></i>
                    </div>
                </a>
                <router-link to="rank">
                    <div id="modalz">
                        <div class="square">
                            <img id="buttton_v_1" src="images/extra_objects/scarabeo.png" alt="" />
                        </div>
                    </div>
                </router-link>
                <router-link to="info">
                    <div id="modaly">
                        <div class="square">
                            <!-- <i class="fa-solid fa-sheet-plastic"></i> -->
                            <span class="text-white">1.0</span>
                        </div>
                    </div>
                </router-link>
            </div>
        </div>
        <!------------------------------------------------------------------>


    </div>
</template>

<script>
export default {

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
