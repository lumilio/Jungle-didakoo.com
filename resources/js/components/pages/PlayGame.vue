<template>
    <div class="game_main" :class="{ loading: isLoading }">
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
                    <button
                        @click="reloadPage"
                        class="d-flex bg-transparent border-0 align-items-center"
                    >
                        <i class="fa-solid fa-arrows-rotate" style="color: white;font-size: 18px;"></i>
                    </button>
                    <button
                        @click="openModal()"
                        class="d-flex bg-transparent border-0 align-items-center"
                    >
                        <i class="fa-solid burger_menu fa-bars" style="margin: 0 auto; position: static; font-size: 20px;"></i>
                    </button>
                </div>
                <!----------------------------------------->
                <div
                    class="allineatore d-flex flex-column container-sm justify-content-center align-items-center"
                >
                    <div class="allineatore-inner-container">

                    <!-------------- PLAYER 2 DATA ---------------->
                    <div class="board-player">
                        <div
                            :style="{
                                backgroundColor: backgroundBord,
                                width: '100%',
                                border: '0',
                            }"
                            class="record"
                        >
                            <p
                                class="player-info"
                                :style="{
                                    color: colorAddress ? colorAddress : 'black',
                                    textDecoration: textDecorationAddress ? textDecorationAddress : 'underline black',
                                }"
                            >
                                1°
                                <img
                                    :src="avatarSrc ? avatarSrc : '../../../images/extra_objects/iconaplayB.png'"
                                    alt="..."
                                />
                                {{ this.game?.opponent?.wallet_address === address ? this.game?.creator?.wallet_address : this.game?.opponent?.wallet_address }}
                            </p>
                            <div
                                class="d-flex align-items-center flex-row flex-nowrap"
                            >
                                <img
                                    style="width: 30px"
                                    :src="nftIconSrc"
                                    alt=""
                                />
                                <!-- <i style='font-size:20px; color:black;'  class="fa-solid fa-battery-full"></i> -->
                            </div>
                            <span
                                class="align-items-center"
                                :style="{
                                    color: colorPower,
                                    marginRight: '10px',
                                    whiteSpace: 'nowrap',
                                    backgroundColor: '',
                                    padding: '0 10px',
                                    borderRadius: '20px',
                                    display: 'flex',
                                }"
                            >
                                100
                                <i class="fa-solid fa-bolt ml-1"></i
                                ></span>
                        </div>
                    </div>
                    <!--------------------------------------------->
                    <div
                        class="board d-flex justify-content-center bg-transparent align-items-center"
                    >
                        <template  v-if="game.status === 'pending' || game?.opponent_id || game.opponent?.wallet_address || !address">
                            <MultiPlay @gameover="gameOver" @connected="connected" :game="game" :id="$route.params.id" />
                        </template>
                        <template v-else>
                            <Game @gameover="gameOver" :game="game" :id="$route.params.id" />
                        </template>
                    </div>
                    <!-------------- PLAYER 1 DATA ---------------->
                    <div class="board-player">
                        <div
                            :style="{
                                backgroundColor: backgroundBord,
                                width: '100%',
                                border: '0',
                            }"
                            class="record"
                        >
                            <p
                                class="player-info"
                                :style="{
                                    color: colorAddress ? colorAddress : 'black',
                                    textDecoration: textDecorationAddress ? textDecorationAddress : 'underline black',
                                }"
                            >
                                1°
                                <img
                                    style="
                                        width: 20px;
                                        margin-left: 5px;
                                        margin-right: 5px;
                                        margin-bottom: 3px;
                                    "
                                    :src="avatarSrc ? avatarSrc : '../../../images/extra_objects/iconaplayB.png'" alt="User Avatar"
                                />
                                {{ address }}
                            </p>
                            <div
                                class="d-flex align-items-center flex-row flex-nowrap"
                            >
                                <img
                                    style="width: 30px"
                                    :src="nftIconSrc"
                                    alt=""
                                />
                                <!-- <i style='font-size:20px; color:black;'  class="fa-solid fa-battery-full"></i> -->
                            </div>
                            <span
                                class="align-items-center"
                                :style="{
                                    color: colorPower,
                                    marginRight: '10px',
                                    whiteSpace: 'nowrap',
                                    backgroundColor: '',
                                    padding: '0 10px',
                                    borderRadius: '20px',
                                    display: 'flex',
                                }"
                            >
                                {{ userData?.power }}
                                <i class="fa-solid fa-bolt ml-1"></i
                            ></span>
                        </div>
                    </div>
                    <!--------------------------------------------->
                </div>
                </div>
            </template>
        </div>
        <Modal
            :open="open"
            :gameStarted="isStarted"
            :delay="canStart"
            :message="message"
            :readyToStart="readyToStart"
            :buttons="buttons"
            :showNotification="showNotification"
            v-on:handelReadyToStart="handelReadyToStart()"
            v-on:quitGame="quitGame()"
        />
        <div v-show="!toggleModal" style="z-index: 1000;" class="justify-content-center align-content-center d-flex">
            <ConnectWalletModal :show="toggleModal" style="margin: 0"></ConnectWalletModal>
        </div>
    </div>
</template>

<script>
import Game from "../Game/Game";
import Modal from "../Modal/Modal";
import axios from "axios";
import store from "../../store";
import { getColorStyles } from '../../utilites/getColorByUserColorId';
import user from "../../store/modules/user";
import MultiPlay from "../Game/MultiPlay.vue";
import ConnectWalletModal from "../Modal/ConnectWalletModal.vue";

export default {
    data() {
        return {
            isLoading: false,
            open: !localStorage.getItem('canStart'),
            canStart: !!localStorage.getItem('canStart'),
            isStarted: true,
            readyToStart: false,
            game: {},
            message: '',
            buttons: [],
            placeA:false,
            backgroundBord:'',
            colorAddress:'',
            colorPower: '',
            avatarSrc: '',
            textDecorationAddress: '',
            showNotification: false,
            nftIconSrc: '',
        };
    },
    created() {
        this.buttons = [
            {
              title: 'SHARE',
              image: '../../../images/board/piramids/piramid_4.png',
              onclick: this.share
            },
            {
                title: 'REASUME',
                image: '../../../images/board/tree.png',
                onclick: this.closeModal
            },
            {
                title: 'QUIT',
                image: '../../../images/board/animals/icon-17.png',
                onclick: this.quitGame
            }
        ];

        this.getColorByUserColorId();
    },
    components: {
        MultiPlay,
        Game,
        Modal,
        ConnectWalletModal,
    },
    computed: {
        user() {
            return user
        },
        address() {
            return store.state.address
        },
        userData(){
            return store.state.userData
        },
        toggleModal(){
            return store.state.connectWallet
        }
    },
    methods: {
        getColorByUserColorId() {
            try {
                const colorUser = this.game?.creator?.wallet_address === this.address ? this.game.state.colors.white : this.game.state.colors.black;
                const colorStyles = getColorStyles(colorUser);
                this.backgroundBord = colorStyles.backgroundBord;
                this.colorAddress = colorStyles.colorAddress;
                this.colorPower = colorStyles.colorPower;
                this.avatarSrc = colorStyles.avatarSrc;
                this.textDecorationAddress = colorStyles.textDecorationAddress;
                this.nftIconSrc = colorStyles.nftIconSrc;
            } catch (error) {
                console.error(error);
                this.user = null;
            }
        },
        reloadPage() {
            window.location.reload();
        },
        openModal(message = null) {
            this.open = true;
            if(message){
                this.message = message
            }
        },
        gameOver(color) {
            let message = color === 'white' ? 'You Won' : 'You Lost'
            this.buttons = [
                {
                    title: 'QUIT',
                    image: '../../../images/board/animals/icon-17.png',
                    onclick: this.finishedGame
                }
            ];
            this.openModal(message)
        },
        closeModal() {
            this.open = false;
        },
        handelReadyToStart() {
            this.readyToStart = true;
            localStorage.setItem('canStart', 'true');
            this.open = false;
        },
        async connected() {
            this.readyToStart = true;
            localStorage.setItem('canStart', 'true');
            this.open = false;
            try {
                this.isLoading = true;
                const response = await axios.post(
                    `/api/get-game/${this.$route.params.id}`,
                    {
                        address: this.address,
                    }
                );
                if (response.status === 200) {
                    this.game = response.data.game
                    this.getColorByUserColorId()
                    this.isLoading = false;

                    if(this.game.status === "started" && this.address === this.game?.creator?.wallet_address){
                        const opponentAddress = this.game?.opponent?.wallet_address
                        toastr.success(opponentAddress.slice(0, 6) + '......' + opponentAddress.slice(-5) + '<br>Connected successfully!');
                    }
                } else {
                    this.$router.push("/game");
                }
            } catch (e) {
                this.$router.push("/game");
            }
        },
        async quitGame() {
            try {
                    await axios.get(
                        `/api/delete-game/${this.$route.params.id}`
                    );
                    localStorage.removeItem('canStart')
                    if (this.readyToStart) {
                        return this.$router.push("/rank");
                    }
                    return this.$router.push("/game");

            } catch (e) {
                console.log(e);
            }
        },
        async finishedGame() {
            return this.$router.push("/rank");
        },

         share() {
           const url = window.location.href;

           const el = document.createElement('textarea');
           el.value = url;
           el.setAttribute('readonly', '');
           el.style.position = 'absolute';
           el.style.left = '-9999px';
           document.body.appendChild(el);

           const selected =
               document.getSelection().rangeCount > 0
                   ? document.getSelection().getRangeAt(0)
                   : false;

           el.select();
           document.execCommand('copy');
           document.body.removeChild(el);

           if (selected) {
             document.getSelection().removeAllRanges();
             document.getSelection().addRange(selected);
           }

           this.showNotification = true;
           setTimeout(() => {
             this.showNotification = false;
           }, 2000);
        },
    },
    async mounted() {
        if (this.address){
            try {
                this.isLoading = true;
                const response = await axios.post(
                    `/api/get-game/${this.$route.params.id}`,
                    {
                        address: this.address,
                    }
                );
                if (response.status === 200) {
                    this.game = response.data.game
                    this.getColorByUserColorId()
                    this.isLoading = false;
                } else {
                    this.$router.push("/game");
                }
            } catch (e) {
                this.$router.push("/game");
            }
        }
    },
    watch:{
        test()
        {
            this.getStatus();
        },
        userData() {
                this.getColorByUserColorId();
        },
        async address(data) {
            try {
              if (data){
                this.isLoading = true;
                const response = await axios.post(
                    `/api/get-game/${this.$route.params.id}`,
                    {
                      address: this.address,
                    }
                );
                if (response.status === 200) {
                  this.game = response.data.game
                  this.getColorByUserColorId()
                  this.isLoading = false;
                } else {
                  this.$router.push("/game");
                }
              }

            } catch (e) {
                this.$router.push("/game");
            }
        },
    },
};
</script>
<style lang="scss">
.game_main {
    &.loading {
        display: flex;
        height: 100vh;
        align-items: center;
        justify-content: center;
    }
    .board-player .record {
        width: 100%;
        border: 0;
        p {
            color: black;
            padding: 10px;
            margin: 0;
            text-overflow: ellipsis;
            white-space: nowrap;
            overflow: hidden;
            img {
                width: 20px;
                margin-left: 5px;
                margin-right: 5px;
                margin-bottom: 3px;
            }
        }
        span {
            color: black;
            margin-right: 10px;
            white-space: nowrap;
            padding: 0 10px;
            border-radius: 20px;
            display: flex;
        }
    }
    .banner-board-helper {
        height: 80px;
        color: black;
        .avatar_helper {
            color: white;
            padding: 5px;
            margin: 0 0 0 5px;
        }
        .gamepad {
            font-size: 25px;
            margin-left: 5px;
            margin-bottom: 3px;
        }
    }
    .spinner_handler {
        display: flex;
        justify-content: center;
    }
}
  .player-info{
        font-size: 14.5px;
        padding: 10px;
        margin: 0;
        text-overflow: ellipsis;
        white-space: nowrap;
        overflow: hidden;
    }
</style>
