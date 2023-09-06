<template>
    <div class="navbar d-flex banner-board-helper align-items-center">
        <div class="d-flex align-items-center">
            <img class="didakoo" src="images/extra_objects/ddd.jpg" alt="" />
            <router-link :to="this.$route.name === 'avatar' ? 'rank': 'menu'">
                <i class="fa-solid burger_menu fa-bars"></i>
            </router-link>
            <router-link class="avatar_link" v-if="user" :to="{ path: 'avatar', query: { wallet_address: address } }">
                <img src='images/extra_objects/iconaplay1.png' alt="">
            </router-link>
        </div>
    </div>
</template>

<script>
import store from "../../store";
import axios from "axios";
export default {
    name: "Navbar",
    data() {
        return {
            currentPlayer:{}
        }
    },
    computed: {
        user () {
            return store.state.user
        },
        address() {
            return store.state.address
        }
    },
    mounted() {

    },
    methods:{
        async getAllUsers()
        {
            this.url = window.location.host;
            const response = await axios.get('http://'+this.url+'/api/get-users');
            console.log(response,"responseRankk")
            this.playersArray = response.data.users;
        }
    },
}
</script>

<style scoped lang="scss">
.navbar{
    background-color:black;
    height:80px;
    color: black;
    .burger_menu{
        display: inline;
        margin-bottom: 25px;
        position: relative;
        margin-right: 0px;
    }
    .avatar_link{
        margin-left: 10px;
        img{
            display: inline;
            width: 30px;
            margin-left: 0px;
            margin-bottom: 3px;
        }
    }
    img.didakoo{
        width: 100px;
        margin-left: 5px;
        margin-bottom: 3px;
    }
}

</style>
