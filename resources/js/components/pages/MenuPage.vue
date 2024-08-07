<template>
    <div id="page1" class="centratore flex-column  align-items-center" style='height:calc(100vh - 80px);'>

        <!-------------------------------- EYE HAND ----------------------------------->
        <div class="d-flex align-items-center flex-column">
            <img id="img_xxx" class="ra" style="margin-bottom: 100px;" src="images/extra_objects/xxx.png" alt=""/>
            <img id="img_xxxxy" class="ra" style="margin-bottom: 100px" src="images/extra_objects/xxxxy.png" alt=""/>
        </div>
        <!----------------------------------------------------------------------------->

        <!-------------------------- BUTTONS  ------------------------------>
        <div v-show="!toggleModal" style="height:calc(80vh - 80px);" class="justify-content-center align-content-center d-flex">
            <div class="bt" v-show="!toggleModal">
                <a type="button" >
                    <div class="square" @click="openModal">
                        <i id="led" class="fa-solid fa-circle" :style="{color: user? '#46e546' : 'red'}" ></i>
                        <i class="fa-solid fa-power-off"></i>
                    </div>
                </a>

                <div @click="navigateToRank()" class="pointer">
                    <div id="modalz">
                        <div class="square">
                            <img id="buttton_v_1" src="images/extra_objects/scarabeo.png" alt="" />
                        </div>
                    </div>
                </div>
                <div @click="navigateToInfo()" class="pointer">
                    <div id="modaly" style="padding-top: 20px">
                        <div class="square">
                            <!-- <i class="fa-solid fa-sheet-plastic"></i> -->
                            <!-- <span class="text-white">1.0</span> -->
                            <img id="buttton_info" src="images/extra_objects/info-label.jpg" alt="" />
                        </div>
                    </div>
                </div>
            </div>
            <ConnectWalletModal :show="toggleModal" style="margin: 0"></ConnectWalletModal>
        </div>
        <!------------------------------------------------------------------>


    </div>
</template>

<script>
import store from "../../store";
import ConnectWalletModal from "../Modal/ConnectWalletModal.vue";
export default {

    data() {
        return {
            test: false,
            placeA: false,
            borderStyle: '',
        }
    },
    components: {
        ConnectWalletModal
    },
    computed: {
        user() {
            return store.state.user
        },
        address() {
            return store.state.address
        },
        toggleModal(){
            return store.state.connectWallet
        }
    },


    methods: {
        navigateToRank(){
            if(this.user){
                this.$router.push({path: 'rank'})
            }
        },
        navigateToInfo(){
            this.$router.push({path: 'info'})
        },
        async openModal() {
            if (this.user) {
                await fetch('api/logout', {
                    method: 'GET',
                    headers: {
                        'Content-Type': 'application/json'
                    }
                });
                store.commit('LOG_OUT_USER')
                // store.commit('TOGGLE_WALLET_MODAL')
                toastr.info("User logged out")
            } else {
                store.commit('TOGGLE_WALLET_MODAL')
            }
        },
    },

    watch:{
        test()
        {
            this.getStatus();
        }
    },

    mounted () {
        toastr.options.timeOut = 1500;
        console.log("Menu Page Component mounted.");
    },

};
</script>

<style>
.pointer{
    cursor: pointer;
}

#toast-container > .toast-info {
    background-image: url("../../../images/extra_objects/arrow-right-from.png") !important;
    background-size: 24px 24px;
}
</style>
