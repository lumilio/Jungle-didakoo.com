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
    export default {
        components: {Modal},
        data(){
            return {
                buttons: [
                    {
                        title: 'QUICK GAME',
                        icon: 'fa-solid fa-bolt icons',
                        onclick: this.createGame
                    },
                    {
                        title: 'PRIVATE GAME',
                        image: '../../../images/extra_objects/iconaplay1.png',
                        onclick: this.createGame
                    },
                    {
                        title: 'QUIT',
                        image: '../../../images/board/animals/icon-17.png',
                        onclick: this.quitGame
                    }
                ]
            }
        },
        methods: {
            quitGame(){
                this.$router.push('/rank')
            },
            async createGame(){
                try {
                    this.url = window.location.host;
                    const response = await axios.get('http://'+this.url+'/api/make-game');
                    this.$router.push(`/room/${response.data.url}`);
                }catch (e) {
                    console.log(e,'11')
                }

            }
        },
    }
</script>


