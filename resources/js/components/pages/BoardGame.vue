<template>
    <div class="allineatore2 board_game">
        <Modal
            :open="true"
            :gameStarted="false"
            :buttons="buttons"
            :startNewGame="true"
        />
    </div>
</template>

<script>
    import axios from "axios";
    import Modal from "../Modal/Modal";
    import store from "../../store";
    import helper from "../Game/GameHelper";
    export default {
        components: {Modal},
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
            }
        },
        methods: {
            quitGame(){
                this.$router.push('/rank')
            },
            async createGame({ multiPlay }){
                try {
                    if(this.user){
                        this.url = window.location.host;
                        const state = helper.getInitialState();
                        const response = await axios.post('/api/make-game',{multiPlay: multiPlay, address: this.address, state: state});
                        this.$router.push(`/room/${response.data.url}`);
                    }

                }catch (e) {
                    console.log(e)
                }

            }
        },
    }
</script>


