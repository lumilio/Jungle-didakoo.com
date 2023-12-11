<template>
    <div class="navbar d-flex banner-board-helper align-items-center">
        <div class="d-flex align-items-center">
            <img class="didakoo" src="images/extra_objects/ddd.jpg" alt="" />
            <router-link :to="this.$route.name === 'avatar' ? 'rank': 'menu'">
                <i class="fa-solid burger_menu fa-bars"></i>
            </router-link>
            <router-link class="avatar_link" v-if="userAddress" :to="{ path: 'avatar', query: { wallet_address: address } }">
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
            currentPlayer:{},
            userAddress: false
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
        this.checkToAddress()
    },
    methods:{
        checkToAddress(){
            return this.address?.length === 42 && this.address?.substring(0, 2) === '0x' ? this.userAddress = true : this.userAddress = false;
        },
        async getAllUsers()
        {
            this.url = window.location.host;
            const response = await axios.get(process.env.MIX_SERVER_APP_URL + '/api/get-users');
            console.log(response,"responseRankk")
            this.playersArray = response.data.users;
        }
    },
    watch:{
        address() {
            this.checkToAddress()
        },
    }
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
