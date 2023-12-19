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

    </div>
</template>

<script>
    import axios from "axios";
    import Modal from "../Modal/Modal";
    import store from "../../store";
    import helper from "../Game/GameHelper";
    import ConnectWalletModal from "../Modal/ConnectWalletModal.vue";
    import Swal from 'sweetalert2'

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
                        await this.$router.push(`/room/${response.data.url}`);
                    } else if (!this.user) {
                        // this.showLowSunflowerErrorModal()
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
            },
            showLowSunflowerErrorModal() {
                Swal.fire({
                    title: 'Error!',
                    text: 'You don\'t have enough sunflower',
                    icon: 'error',
                    confirmButtonText: 'OK',
                    background: '#000',
                    color: '#fff',
                    confirmButtonColor: '#000',
                    customClass: {
                        container: 'error-modal-font',
                        confirmButton: 'btn-button console-screen'
                    }
                })
            }
        },
    }
</script>

<style>
    .error-modal-font {
        font-family: "VT323", monospace;
    }
</style>


