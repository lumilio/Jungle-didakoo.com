<template>
    <div class="allineatore2 board_game">
        <Modal
            :open="!toggleModal"
            :gameStarted="false"
            :buttons="buttons"
            :startNewGame="true"
        />
        <div v-show="!toggleModal" style="height:100vh;" class="justify-content-center align-content-center d-flex modal-outgame">
            <ConnectWalletModal :show="toggleModal" style="margin: 0"></ConnectWalletModal>
        </div>
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
                ]
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
        methods: {
            quitGame(){
                this.$router.push('/rank')
            },
            async createGame({ multiPlay }){
                alert(this.user)
                alert(this.address)
                alert(window.location.host)
                try {
                    if(this.user){
                        this.url = window.location.host;
                        const state = helper.getInitialState();
                        const response = await axios.post('/api/make-game',{multiPlay: multiPlay, address: this.address, state: state});
                        this.$router.push(`/room/${response.data.url}`);
                    }else{
                        return store.commit('TOGGLE_WALLET_MODAL');
                    }

                }catch (e) {
                    console.log(e)
                }

            }
        },
    }
</script>


