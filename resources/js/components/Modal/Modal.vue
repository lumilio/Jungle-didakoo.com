<template>
    <div v-show="open" class="allineatore2">
        <!----------------- MODALS UTILITY ------------------->
        <div class="modal d-flex main_modal align-items-center" :class="readyToStart ? 'modal-ingame':'modal-outgame'">
            <!-- Modal content -->
            <div class="modal-content container-sm d-flex flex-column align-items-center">
                <div class="d-flex container-sm align-items-center justify-content-between flex-row">
                    <img class="modal_logo" src="images/extra_objects/ddd.jpg">
                    <span class="version_sign">v 1.0.0</span>
                </div>
                <div id='console-screen' class="d-flex justify-content-center align-items-center">
                    <p class="main_message">
                        {{mainMessage}}
                        <span v-if="!canStart">Your Game Will Start in {{timeoutIndicator}}</span>
                    </p>
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
                        <button v-if="canStart" class="closekoo2 d-flex align-items-center jusify-content-around" style='background-color:black;'
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
    props: {
        open: Boolean,
        gameStarted: Boolean,
        message: {
            type: String,
            default: 'You win / You Lose / Other data'
        },
        delay: {
            type: Boolean,
            default: true
        },
        readyToStart: {
            type: Boolean,
            default: false
        },
    },
    data () {
        return {
            canStart:this.delay,
            timeoutIndicator: null
        }
    },
    computed: {
        mainMessage(){
            if(this.gameStarted && !this.canStart){
                return 'CountDown Message'
            }
            return 'You win / You Lose / Other data'
        }
    },
    created() {
        if(this.gameStarted && !this.canStart){
            let timeout = 15
            let interval = setInterval(() => {
                this.timeoutIndicator = this.numberToTime(timeout)
                if(!timeout){
                    clearInterval(interval)
                    this.canStart = true
                    this.closeModal();
                    this.$emit("handelReadyToStart")
                }
                timeout --;
            },1000)
        }
    },
    methods: {
        numberToTime(time){
            let minutes = Math.floor(time/60);
            minutes = minutes < 10 ? '0' + minutes : minutes
            let seconds = time % 60
            seconds = seconds < 10 ? '0' + seconds : seconds
            return minutes + ':' + seconds

        },
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

<style lang="scss">
.modal-ingame{
    background:
        linear-gradient(
                rgba(0, 0, 0, 0.4),
                rgba(0, 0, 0, 0.4)
        );
}
.modal-outgame{
    background: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)), url(/images/bignilo3.jpg?f59feddceecdafca8ecaff8ca2dd9179);
    background-repeat: repeat;
    background-position: center;
    background-size: 500px;
}
.main_modal{
    .modal_logo{
        width:80px
    }
    .version_sign{
        color: white;
        margin-top: 5px;
    }
    .main_message{
        color: white;
        font-size: 17px;
        padding: 10px;
    }
}
</style>
