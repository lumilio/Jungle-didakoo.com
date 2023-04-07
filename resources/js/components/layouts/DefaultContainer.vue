<template>
    <div>
        <Navbar/>
        <div class="d-flex text-light justify-content-center">
            <router-link class="p-4" to="/game">game</router-link>
            <router-link class="p-4" to="/avatar">avatar</router-link>
            <router-link class="p-4" to="/rank">rank</router-link>
            <router-link class="p-4" to="/menu">menu</router-link>
            <router-link class="p-4" to="/info">info</router-link>
        </div>
        <router-view ></router-view>
    </div>
</template>

<script>
import Navbar from "../includes/Navbar";
export default {
    name: "DefaultContainer",
    components: {
        Navbar
    }
}
</script>

<style scoped>

</style>
