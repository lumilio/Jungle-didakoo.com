<template>
    <div v-show="open" class="allineatore2">
        <!----------------- MODALS UTILITY ------------------->
        <div class="modal d-flex main_modal align-items-center modal-outgame">
            <!-- Modal content -->
            <div class="modal-content container-sm d-flex flex-column align-items-center">
                <div class="d-flex container-sm align-items-center justify-content-between flex-row">
                    <img class="modal_logo" src="../../../images/extra_objects/ddd.jpg">
                    <span class="version_sign">v 1.0.0</span>
                </div>
                <div class="console-screen d-flex justify-content-center align-items-center">
                    <p class="main_message">
                        {{mainMessage}}
                        <span v-if="!canStart">Your Game Will Start in {{timeoutIndicator}}</span>
                    </p>
                </div>
                <template v-if="(this.gameStarted && this.canStart) || startNewGame">
                    <div class="d-flex flex-wrap flex-column justify-content-center">
                        <div v-if="showNotification" class="notification">
                          Room ID copied to clipboard!
                        </div>
                        <div class="mb-3" v-for="(item, index) in buttons" :key="index">
                            <Button
                                v-on:handelClick="() => item.onclick()"
                                :title="item.title"
                                :icons="item.icon"
                                :image="item.image"
                            />
                        </div>
                    </div>
                </template>
            </div>
        </div>
    </div>
</template>

<script>
import axios from "axios";
import Button from "../Button/Button.vue";

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
        startNewGame: {
            type: Boolean,
            default: false
        },
       showNotification: {
            type: Boolean,
            default: false
        },
        buttons: {
            type: Array,
            default: [],
        }
    },
    components: { Button },
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
            return this.message ? this.message :'YOU WIN / YOU LOSE / Other data'
        },
    },
    created() {
        if(this.gameStarted && !this.canStart){
            let timeout = 4
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

.notification {
  position: fixed;
  right: 20px;
  top:20px;
  background-color: #4caf50;
  color: #fff;
  padding: 10px 20px;
  border-radius: 5px;
  box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1);
}

.gameStarted-wrapper{
    display: flex;
    flex-direction: column;
    gap: 10px;
}
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
    background-size: 600px;
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
