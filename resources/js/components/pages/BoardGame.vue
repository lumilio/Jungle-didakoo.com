<template>
    <div class="allineatore2 board_game">
        <Modal
            :open="!toggleModal"
            :gameStarted="false"
            :buttons="buttons"
            :startNewGame="true"
            :nftSunflowerPoints="nftSunflowerPoints"
            :gameModeLevel="gameModeLevel"
        />
<!--        <div v-show="!toggleModal" style="height:100vh;" class="justify-content-center align-content-center d-flex modal-outgame">-->
<!--            <ConnectWalletModal :show="toggleModal" style="margin: 0"></ConnectWalletModal>-->
<!--        </div>-->
    </div>
</template>

<script>
    import axios from "axios";
    import Modal from "../Modal/Modal";
    import store from "../../store";
    import helper from "../Game/GameHelper";
    import ConnectWalletModal from "../Modal/ConnectWalletModal.vue";

    export default {
        components: {ConnectWalletModal, Modal},
        data(){
            return {
                buttons: [
                    {
                        title: 'QUICK GAME',
                        icon: 'fa-solid fa-bolt icons',
                        onclick: this.createGame,
                        params: {multiPlay: false}
                    },
                    {
                        title: 'INVITE P2',
                        image: '../../../images/extra_objects/iconaplay1.png',
                        onclick: this.createGame,
                        params: {multiPlay: true}
                    },
                    {
                        title: 'QUIT',
                        image: '../../../images/board/animals/icon-17.png',
                        onclick: this.quitGame
                    }
                ],
                gameModeLevel: 0,
                nftSunflowerPoints: 0,
                doesUserHaveEnoughSunflower: false
            }
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
        async mounted() {
            await this.verifyUserHasEnoughNftSunflowerPoints()
        },
        methods: {
            quitGame(){
                this.$router.push('/rank')
            },
            async createGame({ multiPlay }){
                try {
                    if (this.user && this.doesUserHaveEnoughSunflower) {
                        this.url = window.location.host;
                        const state = helper.getInitialState();
                        const response = await axios.post('/api/make-game', { multiPlay: multiPlay, address: this.address, state: state });
                        this.$router.push(`/room/${response.data.url}`);
                    } else if (!this.user) {
                        return store.commit('TOGGLE_WALLET_MODAL');
                    }

                }catch (e) {
                    console.log(e)
                }

            },
            async verifyUserHasEnoughNftSunflowerPoints() {
                this.nftSunflowerPoints = await this.getUserLevelFromNftSunflowerPoints()
                this.gameModeLevel = await this.getActiveGameMode()

                this.doesUserHaveEnoughSunflower = this.nftSunflowerPoints >= this.gameModeLevel
            },
            async getUserLevelFromNftSunflowerPoints() {
                const response = await axios.get(`/api/user-by-wallet-address/${this.address}`);
                const user = response.data.user

                let nftSunflowerPoints = 0

                if (user.nft_1_sunflower_1 !== undefined && user.nft_2_sunflower_2 !== undefined) {
                    // Multiply by 100, get floor and divide by 100 to avoid having float number issues
                    nftSunflowerPoints = Math.floor((user.nft_1_sunflower_1 + (user.nft_2_sunflower_2 / 4)) * 100) / 100
                }

                return Math.floor(nftSunflowerPoints) <= 4 ? Math.floor(nftSunflowerPoints) : 4
            },
            async getActiveGameMode() {
                const response = await axios.get('/api/active-game-mode')
                const gameModeLevel = response.data.game_mode.level

                return gameModeLevel
            }
        },
    }
</script>

<style>
    .error-modal-font {
        font-family: "VT323", monospace;
    }
</style>


