<template>
    <router-view ></router-view>
</template>
<script>
import store from "./store";
export default {
    name: "App",
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
