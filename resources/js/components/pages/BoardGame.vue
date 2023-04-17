<template>
    <div class="allineatore2">
        <Modal :open="true" :gameStarted="false"/>
    </div>
</template>

<script>
    import axios from "axios";
    import Modal from "../Modal/Modal";
    export default {
        components: {Modal},
        methods: {
            async createGame(){
                this.url = window.location.host;
                const response = await axios.get('http://'+this.url+'/api/make-game');
                this.$router.push(`/room/${response.data.url}`);
            }
        },
    }
</script>



