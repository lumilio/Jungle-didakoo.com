<template>
    <router-view ></router-view>
</template>
<script>
import store from "./store";
import axios from "axios";
export default {
    name: "App",
    computed: {
        user () {
            return store.state.user
        }
    },
    async mounted() {
        try{
            this.url = window.location.host;
            const response = await axios.get(process.env.MIX_SERVER_APP_URL + '/api/getSession', {
                headers: {
                    'Content-Type': 'application/json',
                    '_token': document.querySelector('meta[name="csrf-token"]').content
                }
            });
            if(response.data !== "failed"){
                store.commit('LOG_IN_USER',true)
                store.commit('SET_USER_ADDRESS', response.data.address)
                store.commit('SET_USER_DATA', {color_id: response.data.color, power: response.data.power, id: response.data.id})
            }else{
                if (window.location.pathname.includes('room')){
                    store.commit('TOGGLE_WALLET_MODAL');
                }
                store.commit('LOG_OUT_USER');
            }
            document.getElementById('loader').style.display='none'
            
        } catch (error) {
            if (error instanceof Error) {
                const resource = process.env.MIX_SERVER_APP_URL + '/api/getSession'
                switch (error.status) {
                    case 404:
                        console.error(`Resource not found: ${resource}`);
                        break;
                    case 405:
                        console.error(`Method not allowed: ${resource}`);
                        break;
                    case 419:
                        console.error("Session expired!");
                        break;
                    default:
                        console.error(`Unhandled error: ${error.message}`);
                }
            } else {
                console.error("Unhandled error:", error);
            }
        }
    }
}
</script>

<style scoped>

</style>
