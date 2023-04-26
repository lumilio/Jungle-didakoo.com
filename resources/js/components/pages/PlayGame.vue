<template>
    <div class="game_main" :class="{loading:isLoading}">
        <div class="allineatore2">
            <template v-if="isLoading">
                <div class="spinner_handler">
                    <div class="spinner-border text-light" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>
                </div>
            </template>
            <template v-else>
                <!----------------- NAV ------------------->
                <div class="d-flex banner-board-helper align-items-center">
                    <button @click="openModal()" class="d-flex bg-transparent border-0 align-items-center">
                        <p class='avatar_helper' >Console</p>
                        <i class="fa-solid gamepad fa-gamepad"></i>
                    </button>
                </div>
                <!----------------------------------------->
                <div class="allineatore d-flex flex-column container-sm justify-content-center align-items-center">
                    <!-------------- PLAYER 2 DATA ---------------->
                    <div class="board-player" >
                        <div style="background-color:#EDEB52;  width:100%; border:0;" class="record   ">
                            <p >1°
                                <img src='images/extra_objects/iconaplayB.png'> 0xF83611F45e11b590eBB9FdABa9ee12e7Dc9E9393
                            </p>
                            <div class='d-flex align-items-center flex-row flex-nowrap'>
                                <img style='width:30px; ' src='images/extra_objects/icon-59.png' alt="">
                                <!-- <i style='font-size:20px; color:black;'  class="fa-solid fa-battery-full"></i> -->
                            </div>
                            <span class='align-items-center'> 100  <i class="fa-solid fa-bolt ml-1"></i></span>
                        </div>
                    </div>
                    <!--------------------------------------------->
                    <div  class=" board d-flex justify-content-center bg-transparent align-items-center">
                        <Game/>
                        <!-- <img class='board ' src="images/concepts/blue-red.jpeg" alt=""> -->
                        <!-- <img class='board ' src="images/concepts/yellow-blue.jpg" alt=""> -->
                    </div>
                    <!-------------- PLAYER 1 DATA ---------------->
                    <div class="board-player" >
                        <div style="background-color:#EDEB52;  width:100%; border:0;" class="record   ">
                            <p  style='color:black; font-size:x-smal; padding: 10px; margin: 0; text-overflow: ellipsis; white-space: nowrap;  overflow:hidden;'>1°
                                <img style='width:20px; margin-left:5px; margin-right:5px;  margin-bottom:3px;'   src='images/extra_objects/iconaplayB.png'> 0xF83611F45e11b590eBB9FdABa9ee12e7Dc9E9393
                            </p>
                            <div class='d-flex align-items-center flex-row flex-nowrap'>
                                <img style='width:30px; ' src='images/extra_objects/icon-59.png' alt="">
                                <!-- <i style='font-size:20px; color:black;'  class="fa-solid fa-battery-full"></i> -->
                            </div>
                            <span class='align-items-center' style='color:black; margin-right: 10px;     white-space: nowrap;     background-color: ;  padding:0 10px;  border-radius: 20px; display:flex;'> 100  <i class="fa-solid fa-bolt ml-1"></i></span>
                        </div>
                    </div>
                    <!--------------------------------------------->
                </div>
            </template>
        </div>
        <Modal
            :open="open"
            :gameStarted="isStarted"
            :delay="canStart"
            :readyToStart="readyToStart"
            v-on:closeModal="closeModal()"
            v-on:handelReadyToStart="handelReadyToStart()"
            v-on:quitGame="quitGame()"/>
    </div>
</template>

<script>
    import Game from "../Game/Game";
    import Modal from "../Modal/Modal";
    import axios from "axios";
    export default {
        data () {
            return {
                isLoading: true,
                open: true,
                canStart: false,
                isStarted: true,
                readyToStart: false,
            }
        },
        created() {

        },
        components: {
            Game,
            Modal
        },
        async mounted() {
            try {
                const response = await axios.get(`http://${window.location.host}/api/get-game/${this.$route.params.id}`);
                if (response.status === 200){
                    this.isLoading = false;
                }else {
                    this.$router.push('/game');
                }
            }catch (e) {
                this.$router.push('/game')
            }
        },
        methods: {
            openModal() {
                this.open = true;
            },
            closeModal(){
                this.open = false;
            },
            handelReadyToStart(){
                this.readyToStart = true;
            },
            async quitGame () {
                try {
                    const response = await axios.get(`http://${window.location.host}/api/delete-game/${this.$route.params.id}`);
                    if (this.readyToStart){
                        return this.$router.push('/rank');
                    }
                    return this.$router.push('/game');
                }catch (e) {
                    console.log(e)
                }
            }
        }
    }
</script>
<style lang="scss">
.game_main{
    &.loading{
        display: flex;
        height: 100vh;
        align-items: center;
    }
    .board-player .record{
        background-color: rgb(237, 235, 82);
        width: 100%;
        border: 0;
        p{
            color: black;
            padding: 10px;
            margin: 0;
            text-overflow: ellipsis;
            white-space: nowrap;
            overflow: hidden;
            img{
                width: 20px;
                margin-left: 5px;
                margin-right: 5px;
                margin-bottom: 3px;
            }
        }
        span{
            color: black;
            margin-right: 10px;
            white-space: nowrap;
            padding: 0 10px;
            border-radius: 20px;
            display: flex;
        }
    }
    .banner-board-helper{
        height: 80px;
        color: black;
        .avatar_helper{
            color: white;
            padding: 5px;
            margin: 0 0 0 5px;
        }
        .gamepad{
            font-size: 25px;
            margin-left: 5px;
            margin-bottom: 3px;
        }
    }
    .spinner_handler{
        display: flex;
        justify-content: center;
    }
}
</style>



