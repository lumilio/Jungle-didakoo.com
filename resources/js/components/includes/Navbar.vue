<template>
    <div class="d-flex banner-board-helper align-items-center" style=' background-color:black; height:80px; color: black; '>
        <div id='btnkoo4' class="d-flex align-items-center position:absolute; top:0;">
            <img style="width: 100px; margin-left: 5px; margin-bottom: 3px" src="images/extra_objects/ddd.jpg" alt="" />
            <router-link to="menu">
                <i style='display:inline; margin-bottom:25px;position:relative; margin-right:0px' class="fa-solid fa-bars"></i>
            </router-link>
            <router-link style="margin-left: 10px;" v-if="user" to="profile">
                <img  style='display:inline; width:30px; margin-left:0px; margin-bottom:3px;'   src='images/extra_objects/iconaplay1.png' alt="">
            </router-link>
        </div>
    </div>
</template>

<script>
import store from "../../store";
export default {
    name: "Navbar",
    computed: {
        user () {
            return store.state.user
        }
    },
    mounted() {
    }
}
</script>

<style scoped>

</style>
