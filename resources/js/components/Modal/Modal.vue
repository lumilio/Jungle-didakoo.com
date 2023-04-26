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
                <div class="console-screen d-flex justify-content-center align-items-center">
                    <p class="main_message">
                        {{mainMessage}}
                        <span v-if="!canStart">Your Game Will Start in {{timeoutIndicator}}</span>
                    </p>
                </div>
                <template v-if="!gameStarted">
                    <div class="d-flex flex-wrap flex-column justify-content-center">
                        <div class="mb-3">
                            <Button
                                v-on:handelClick="createGame()"
                                title='QUICK GAME'
                                icons="fa-solid fa-bolt icons"
                            />
                        </div>
                        <div class="mb-3">
                            <Button
                                v-on:handelClick="createGame()"
                                title='INVITE P2'
                                image="images/extra_objects/iconaplay1.png"
                            />
                        </div>

                    </div>
                </template>
                <div class="gameStarted-wrapper">
                    <template v-if="gameStarted">
                        <Button
                            v-if="canStart"
                            v-on:handelClick="closeModal()"
                            title='REASUME'
                            image="images/board/tree.png"
                        />
                    </template>
                    <div>
                        <Button
                            v-on:handelClick="quitGame()"
                            title='QUIT'
                            image="images/board/animals/icon-17.png"
                        />
                    </div>

                </div>
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
.gameStarted-wrapper{
    display: flex;
    flex-wrap: nowrap;
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
