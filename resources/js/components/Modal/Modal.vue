<template>
    <div v-show="open" class="allineatore2">
        <!----------------- MODALS UTILITY ------------------->
        <div id="myModalkoo2" class="modal d-flex modal-ingame align-items-center">
            <!-- Modal content -->
            <div class="modal-content container-sm d-flex flex-column align-items-center" style=''>
                <div class="d-flex container-sm align-items-center justify-content-between flex-row">
                    <img alt="" src=" images/extra_objects/ddd.jpg" style="width:80px">
                    <span style="color:white; margin:0; margin-top:5px; margin-left:8px;"> v 1.0.0</span>
                </div>
                <div id='console-screen' class="d-flex justify-content-center align-items-center"
                     style='background-color:black; display:flex;  justify-content:center; align-items:center;'>
                    <p class="" style='color:white; font-size:17px; padding:10px;'> You win / You Lose / Other data</p>
                </div>
                <template v-if="!gameStarted">
                    <div class="d-flex flex-wrap flex-column justify-content-center">
                        <button style='background-color:black; d-flex justify-content-center' @click="createGame()">
                            <div class="d-flex no-wrap justify-content-center align-items-center">
                                <p class="m-0">QUICK GAME</p>
                                <i class="fa-solid fa-bolt" style='font-size:20px; margin-left:15px;'></i>
                            </div>
                        </button>
                        <button class=" d-flex justify-content-center align-items-center" style='background-color:black'>
                            <div class="d-flex no-wrap justify-content-center">
                                <p class="m-0"> INVITE P2</p>
                                <img alt="" src='images/extra_objects/iconaplay1.png'
                                     style='width:30px; margin-left:8px'>
                            </div>
                        </button>
                    </div>
                </template>
                <div class="d-flex flex-wrap justify-content-center">
                    <template v-if="gameStarted">
                        <button class="closekoo2 d-flex align-items-center jusify-content-around" style='background-color:black;'
                                @click="closeModal()">
                            <span>REASUME</span>
                            <img alt="" src='images/board/tree.png' style='width:30px; margin-left:8px'>
                        </button>
                    </template>
                    <button id='btnkoo_3_1' class="jusify-content-around" style='background-color:black;'
                            @click="quitGame()">
                        <span>QUIT</span>
                        <img alt=""
                             src='images/board/animals/icon-17.png'
                             style='width:30px; margin-left:8px'
                        >
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from "axios";

export default {
    props: ['open', 'gameStarted'],
    methods: {
        async createGame() {
            this.url = window.location.host;
            const response = await axios.get('http://' + this.url + '/api/make-game');
            this.$router.push(`/room/${response.data.url}`);
        },
        closeModal() {
            this.$emit("closeModal")
        },
        quitGame() {
            this.$emit("quitGame")
        }
    },
}
</script>
