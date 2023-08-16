<template>
    <div id='page4'>
        <div class='allineatore2'>

            <!------------------  white ----------------------->

            <div style='height:89vh;' class="allineatore d-flex container-fluid flex-column justify-content-center px-4 align-items-center">



                <!-- Like in the rank page display logos of selected player (selected playaer = AVATAR CARD -->
                <!------------------------ AVATAR CARD ---------------------->
                <div style='margin-bottom:100px; background-color:black; border:3px solid blue;' class="container-sm avatar mt-4 d-flex flex-column  align-items-center px-3">
                    <!-- <img style='width:50px; position: absolute; top:15px; left:15px;' src='images/extra_objects/ff.png' alt=""> -->
                    <p style='position:absolute; display:block; font-size:15px; left:35px; top:30px; color:white;'> <i  class="fa-solid fa-circle" :style="{color: user? 'grey' : 'red'}" ></i> Offline </p>
                    
                    <!-- <p style='position:absolute; display:block; font-size:15px; left:35px; top:30px; color:white;'> <i  class="fa-solid fa-circle" style="color: #46e546" ></i> &nbsp Online</p> -->
                    <p style='position:absolute; display:block;  font-size:20px; left:84px; top:25px; color:white;'> </p>
                    <p style='position:absolute; display:block; margin-top:10px;  font-size:33px; right:15px; top:5px; color:white;'>32°</p>
                    <img id='avataricon' style='margin-top:80px; margin-bottom:20px;' src='images/extra_objects/iconaplayW.png' alt="">
                    <!-- <p class="text-white">Avatar v.1</p> -->
                    <div style="background-color:black; width:100%;" >
                        <p  style='color:white; width:100%; font-size:x-smal; padding: 10px; margin: 0; text-overflow: ellipsis; white-space: nowrap;  overflow:hidden;'>
                            <img style='width:20px; margin-left:5px; margin-right:5px;  margin-bottom:3px; filter: invert(1);'  src='images/extra_objects/Logomark-BlueB.png' >
                            {{ address }}
                        </p>
                    </div>
                <!------------------------ ARCHIVMENTS LOGOS EXAMPLE ---------------------->
                <!-- see previous branch "avatar checkpoint" -->
                <!------------------------------------------------------------->
                    <p style='font-size:33px; color:white;'>{{ userData.power }} <i style='color:#feb442' class="fa-solid fa-bolt"></i></p>
                    
                    
                </div>
                <!------------------------------------------------------------>


                <!------------------------ HISTORY EXAMPLE ---------------------->
                <!-- see previous branch "avatar checkpoint" -->
                <!------------------------------------------------------------->

            </div>
        </div>
    </div>
</template>



<script>
    export default {
        data() {
            return {
                userData: null,
            };
        },

        computed: {
            user () {
                return this.$store.state.user
            },
            address() {
                return this.$store.state.address
            }
        },
      async created() {
        await this.getUserByWalletAddress();
      },
        methods: {
            async getUserByWalletAddress() {
                try {
                    const walletAddress = this.$route.query.wallet_address;
                    const response = await axios.get(`/api/user-by-wallet-address/${walletAddress}`);
                    this.userData = response.data.user;
                } catch (error) {
                    console.error(error);
                    this.user = null;
                }
            }
        },watch: {
            address: {
                immediate: true,
                handler() {
                    this.getUserByWalletAddress();
                }
            } },
        mounted() {
            if(!this.user){
                this.$router.push('/rank')
            }
            console.log('Avatar Component mounted.')
        }

    }
</script>
<style lang="scss">
.icons-wrapper{
    display: flex;
    justify-content: center;
    align-items: center;
    flex-wrap: wrap;
    margin-bottom:0;
    gap: 5px;
    & > div {
        width: 50px;
        height: 50px;
        display: flex;
        justify-content: center;
        align-items: center;
    }
}
</style>
