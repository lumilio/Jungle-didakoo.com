<template>
    <div class="game_main" :class="{'modal-outgame': toggleModal || open,'loading': isLoading }" style="height: 100%">
        <div class="allineatore2" :class="{'modal-outgame': toggleModal || open}" style="height: 100%">
            <template v-if="isLoading">
                <div class="spinner_handler">
                    <div class="spinner-border text-light" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>
                </div>
            </template>
            <template v-else>
                <!----------------- NAV ------------------->
                <div v-show="!(toggleModal || open)">
                <div style='margin-right:6px;' class="d-flex banner-board-helper align-items-center" >
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
                </div>
                <!----------------------------------------->
                <div
                    class="allineatore d-flex flex-column container-sm justify-content-center align-items-center"
                >
                    <div class="allineatore-inner-container">

                    <!-------------- PLAYER 2 DATA ---------------->
                    <div class="board-player" v-show="!(toggleModal || open)">
                        <div
                            :style="{
                                backgroundColor: backgroundBordTop,
                                width: '100%',
                                border: '0',
                            }"
                            class="record"
                            v-show="checkSectionTop()"
                        >
                            <p
                                class="player-info"
                                :style="{
                                    color: colorAddressTop ? colorAddressTop : 'black',
                                    textDecoration: textDecorationAddressTop ? textDecorationAddressTop : 'underline black',
                                }"
                            >
                                1°
                                <img
                                    :src="avatarSrcTop ? avatarSrcTop : '../../../images/extra_objects/iconaplayB.png'"
                                    alt="..."
                                />
                                {{ opponentUser ? creator?.wallet_address : opponent?.wallet_address }}
                            </p>
                            <div
                                class="d-flex align-items-center flex-row flex-nowrap"
                            >
                                <template v-for="(item, key) in colorIconNft(colorUserTop)" v-if="(creatorUser ? opponent : creator)?.[key] > 0 && item">
                                    <i v-if="key === 'nft_3_battery'" style="font-size: 24px; margin-right: 5px;"
                                       :style="{color: [3,5].includes(colorUserTop) ? 'white' : 'black'}" class="fa-solid fa-battery-full "></i>
                                    <img style="width:30px;" :src="item" alt=""/>
                                </template>
                            </div>
                            <span
                                class="align-items-center"
                                :style="{
                                    color: colorPowerTop,
                                    marginRight: '10px',
                                    whiteSpace: 'nowrap',
                                    backgroundColor: '',
                                    padding: '0 10px',
                                    borderRadius: '20px',
                                    display: 'flex',
                                }"
                            >
                                {{ creatorUser ? opponent?.power : creator?.power }}
                                <i class="fa-solid fa-bolt ml-1"></i
                                ></span>
                        </div>
                    </div>
                    <!--------------------------------------------->
                    <div v-show="!(toggleModal || open)">
                        <div
                        class="board d-flex justify-content-center bg-transparent align-items-center"
                        >
                        <template  v-if="checkGame">
                            <MultiPlay @gameover="gameOver" @connected="connected" :game="game" :id="$route.params.id" />
                        </template>
                        <template v-else>
                            <Game @gameover="gameOver" :game="game" :id="$route.params.id" />
                        </template>
                        </div>
                    </div>
                    <!-------------- PLAYER 1 DATA ---------------->
                    <div class="board-player" v-show="!(toggleModal || open)">
                        <div
                            :style="{
                                backgroundColor: backgroundBordBottom,
                                width: '100%',
                                border: '0',
                            }"
                            class="record"
                            v-show="checkSectionBottom()"
                        >
                            <p
                                class="player-info"
                                :style="{
                                    color: colorAddressBottom ? colorAddressBottom : 'black',
                                    textDecoration: textDecorationAddressBottom ? textDecorationAddressBottom : 'underline black',
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
                                    :src="avatarSrcBottom ? avatarSrcBottom : '../../../images/extra_objects/iconaplayB.png'" alt="User Avatar"
                                />
                                {{ address }}
                            </p>
                            <div
                                class="d-flex align-items-center flex-row flex-nowrap"
                            >
                                <template v-for="(item, key) in colorIconNft(colorUserBottom)" v-if="(creatorUser ? creator : opponent)?.[key] > 0 && item">
                                    <i v-if="key === 'nft_3_battery'" style="font-size: 24px; margin-right:  5px;"
                                       :style="{color: [3,5].includes(colorUserBottom) ? 'white' : 'black'}" class="fa-solid fa-battery-full "></i>
                                    <img v-else style="width:30px;" :src="item" alt=""/>
                                </template>
                            </div>
                            <span
                                class="align-items-center"
                                :style="{
                                    color: colorPowerBottom,
                                    marginRight: '10px',
                                    whiteSpace: 'nowrap',
                                    backgroundColor: '',
                                    padding: '0 10px',
                                    borderRadius: '20px',
                                    display: 'flex',
                                }"
                            >
                                {{  creatorUser ? creator?.power : opponent?.power  }}
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
            :game="game"
            v-on:handelReadyToStart="handelReadyToStart()"
            v-on:quitGame="quitGame()"
        />
        <div v-show="!toggleModal" style="z-index: 1000;" class="justify-content-center align-content-center d-flex">
            <ConnectWalletModal @login="loggedIn" :show="toggleModal" style="margin: 0"></ConnectWalletModal>
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
import colorIconNft from "../../constants/nftLinks";

export default {
    data() {
        return {
            isLoading: false,
            open: !localStorage.getItem('canStart') && store.state.user,
            canStart: !!localStorage.getItem('canStart'),
            isStarted: true,
            readyToStart: false,
            game: {},
            message: '',
            buttons: [],
            placeA:false,
            backgroundBordTop:'',
            colorAddressTop:'',
            colorPowerTop: '',
            avatarSrcTop: '',
            textDecorationAddressTop: '',
            backgroundBordBottom:'',
            colorAddressBottom:'',
            colorPowerBottom: '',
            avatarSrcBottom: '',
            textDecorationAddressBottom: '',
            showNotification: false,
            colorUserTop: '',
            colorUserBottom: '',
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
        },
        creatorUser(){
            return this.game?.creator?.wallet_address === this.address ? this.game?.creator : null;
        },
        opponentUser(){
            return this.game?.opponent?.wallet_address === this.address ? this.game?.opponent : null;
        },
        creator(){
            return this.game?.creator;
        },
        opponent(){
            return this.game?.opponent;
        },
        checkGame(){
            return this.game?.status === 'pending' || this.game?.opponent_id || this.game?.opponent?.wallet_address || !this.address
        }
    },
    methods: {
        colorIconNft,
        checkSectionBottom(){
           return ((this.creatorUser && this.checkToAddress(this.creator?.wallet_address)) || (this.opponentUser && this.checkToAddress(this.opponent?.wallet_address)));
        },
        checkSectionTop(){
            return ((this.opponentUser && this.checkToAddress(this.creator?.wallet_address)) || (this.creatorUser && this.checkToAddress(this.opponent?.wallet_address)));
        },
        checkToAddress(address) {
            return (address?.length === 42 && address?.substring(0, 2) === '0x');
        },
        getColorByUserColorId() {
            try {
                let colorUserTop, colorUserBottom;
                if(this.creator?.color_id || this.opponent?.color_id){
                    colorUserTop = this.creatorUser ? this.opponent?.color_id : this.creator?.color_id;
                    colorUserBottom = this.creatorUser ? this.creator?.color_id : this.opponent?.color_id;
                    this.colorUserTop = colorUserTop
                    this.colorUserBottom = colorUserBottom
                    if(this.creator?.color_id === this.opponent?.color_id){
                        colorUserTop = this.creatorUser ? 5 : 6;
                        colorUserBottom = this.creatorUser ? 6 : 5;
                        this.colorUserTop = colorUserTop
                        this.colorUserBottom = colorUserBottom
                    }
                }else{
                    colorUserTop = this.creatorUser ? this.game.state?.colors?.black : this.game.state?.colors?.white;
                    colorUserBottom = this.creatorUser ? this.game.state?.colors?.white : this.game.state?.colors?.black;
                    this.colorUserTop = colorUserTop
                    this.colorUserBottom = colorUserBottom
                }

                const colorStylesTop = getColorStyles(colorUserTop);
                this.backgroundBordTop = colorStylesTop.backgroundBord;
                this.colorAddressTop = colorStylesTop.colorAddress;
                this.colorPowerTop = colorStylesTop.colorPower;
                this.avatarSrcTop = colorStylesTop.avatarSrc;
                this.textDecorationAddressTop = colorStylesTop.textDecorationAddress;

                const colorStylesBottom = getColorStyles(colorUserBottom);
                this.backgroundBordBottom = colorStylesBottom.backgroundBord;
                this.colorAddressBottom = colorStylesBottom.colorAddress;
                this.colorPowerBottom = colorStylesBottom.colorPower;
                this.avatarSrcBottom = colorStylesBottom.avatarSrc;
                this.textDecorationAddressBottom = colorStylesBottom.textDecorationAddress;
            } catch (error) {
                console.error(error);
                this.user = null;
            }
        },
        reloadPage() {
            window.location.reload();
        },
        openModal(message = null) {
            if(this.game.status === "started" && this.buttons.length > 2){
                this.buttons.splice(0, 1);
            }
            this.open = true;
            if(message){
                this.message = message
            }
        },
        gameOver(color) {
            const creator = this.checkToAddress(this.game?.creator?.wallet_address)
            const opponent = this.checkToAddress(this.game?.opponent?.wallet_address)
            const wonMessage = (creator && opponent) || (creator && this.game?.opponent === null) ? 'You Win ' + 3 + '<i class="fa-solid fa-bolt ml-1"></i>' : 'You Won'
            let message = color === 'white' ? wonMessage : 'You Lose'
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
        loggedIn(){
            this.open = true;
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
