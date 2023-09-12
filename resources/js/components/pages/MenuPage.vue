<template>
    <div id="page1" style='height:89vh;' class="centratore flex-column  align-items-center">

        <!-------------------------------- EYE HAND ----------------------------------->
        <div class="d-flex align-items-center flex-column">
            <img id="img_xxx" class="ra" style="margin-bottom: 100px;" src="images/extra_objects/xxx.png" alt=""/>
            <img id="img_xxxxy" class="ra" style="margin-bottom: 100px" src="images/extra_objects/xxxxy.png" alt=""/>
        </div>
        <!----------------------------------------------------------------------------->

        <!-------------------------- BUTTONS  ------------------------------>
        <div v-show="!showModal" style="height:calc(80vh - 80px);" class="justify-content-center align-content-center d-flex">
            <div class="bt" v-show="!showModal">
                <a type="button" >
                    <div class="square" :style="{ border: borderStyle }" @click="openModal">
                        <i id="led" class="fa-solid fa-circle" :style="{color: user? '#46e546' : 'red'}" ></i>
                        <i class="fa-solid fa-power-off"></i>
                    </div>
                </a>

                <router-link to="rank">
                    <div id="modalz">
                        <div class="square" :style="{ border: borderStyle }">
                            <img id="buttton_v_1" src="images/extra_objects/scarabeo.png" alt="" />
                        </div>
                    </div>
                </router-link>
                <router-link to="info">
                    <div id="modaly">
                        <div class="square" :style="{ border: borderStyle }">
                            <!-- <i class="fa-solid fa-sheet-plastic"></i> -->
                            <span class="text-white">1.0</span>
                        </div>
                    </div>
                </router-link>
            </div>
            <ConnectWalletModal :show="showModal" @close="closeModal" style="margin: 0"></ConnectWalletModal>
        </div>
        <!------------------------------------------------------------------>


    </div>
</template>

<script>
import store from "../../store";
import ConnectWalletModal from "../Modal/ConnectWalletModal.vue";
import { getColorStyles } from '../../utilites/getColorByUserColorId';
import axios from "axios";
export default {

    data() {
        return {
            test: false,
            showModal: false,
            placeA: false,
            borderStyle: '',
        }
    },
    components: {
        ConnectWalletModal
    },
    created() {
        this.getColorByUserColorId();
    },
    computed: {
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


    methods: {
        getColorByUserColorId() {
            try {
                const colorStyles = getColorStyles(this.userData.color_id);
                this.borderStyle = colorStyles.borderStyle;
            } catch (error) {
                console.error(error);
                this.user = null;
            }
        },


        async openModal() {
            if (this.user) {
                const response = await fetch('api/logout', {
                    method: 'GET',
                    headers: {
                        'Content-Type': 'application/json'
                    }
                });
                store.commit('LOG_OUT_USER')
                this.showModal = false;
                toastr.info("User log outed")
            } else {
                this.showModal = true;
            }
        },

        closeModal() {
            this.showModal = false;
        },
    },

    watch:{
        test()
        {
            this.getStatus();
        },
        userData() {
                this.getColorByUserColorId();
        }
    },

    mounted () {
        console.log("Menu PAge Component mounted.");
        this.getColorByUserColorId();
    },

};
</script>

