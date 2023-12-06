<template>
    <div id='page4'>
        <div class='allineatore2'>

            <!------------------  white ----------------------->

            <div style='height:calc(100vh - 80px);' class="allineatore d-flex container-fluid flex-column justify-content-center px-4 align-items-center">



                <!------------------------ AVATAR CARD ---------------------->
                <div :style="{ marginBottom: '100px', backgroundColor: 'black', border: '3px solid ' + borderColor }" class="container-sm avatar mt-4 d-flex flex-column  align-items-center px-3">
                    <!-- <img style='width:50px; position: absolute; top:15px; left:15px;' src='images/extra_objects/ff.png' alt=""> -->
                    <p style="position:absolute; display:block; font-size:15px; left:35px; top:30px; color:white;"> <i  class="fa-solid fa-circle" :style="{color: isUserOnline ? '#46e546' : 'red'}" ></i>{{isUserOnline ? ' Online' : ' Offline'}}  </p>

                    <!-- <p style='position:absolute; display:block; font-size:15px; left:35px; top:30px; color:white;'> <i  class="fa-solid fa-circle" style="color: #46e546" ></i> &nbsp Online</p> -->
                    <p style='position:absolute; display:block;  font-size:20px; left:84px; top:25px; color:white;'> </p>
                    <p style='position:absolute; display:block; margin-top:10px;  font-size:33px; right:15px; top:5px; color:white;'>{{ playerListIndex ?? playerNumber }}°</p>
                    <img id='avataricon' style='margin-top:80px; margin-bottom:20px;' src='images/extra_objects/iconaplayW.png' alt="">
                    <!-- <p class="text-white">Avatar v.1</p> -->
                    <div style="background-color:black; width:100%;" >
                        <p class='avatar-address'  style='color:white; width:100%; font-size:x-smal; padding: 10px; margin: 0; text-overflow: ellipsis; white-space: nowrap;  overflow:hidden;'>
                            <img style='width:20px; margin-left:5px; margin-right:5px;  margin-bottom:3px; filter: invert(1);'  src='images/extra_objects/Logomark-BlueB.png' >
                            <a
                                :href="`https://opensea.io/${userData?.wallet_address}`"
                                style="color: #fff;">
                                {{ userData?.wallet_address }}
                            </a>
                        </p>
                    </div>
                <!------------------------ ARCHIVMENTS LOGOS EXAMPLE ---------------------->
                <!-- see previous branch "avatar checkpoint" -->
                <!------------------------------------------------------------->
                    <p style='font-size:33px; color:white;'>{{ userData?.power !== undefined ? formatPower(userData?.power) : '' }} <i style='color:#feb442' class="fa-solid fa-bolt"></i></p>


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
import axios from "axios";
import {getColorStyles} from '../../utilites/getColorByUserColorId'
import { formatNumberWithSuffix } from '../../utilites/formatNumberWithSuffix'

export default {
    data() {
        return {
            userData: null,
            playerListIndex: null,
            borderColor: ''
        };
    },

    computed: {
        user () {
            return this.$store.state.user
        },
        address() {
            return this.$store.state.address
        },
        playerNumber() {
            return this.$store.state.playerNumber
        },
        userIsLoggedIn() {
            return this.user && this.address == this.userData?.wallet_address
        },
        isUserOnline() {
            if (!this.userData) {
                return false
            } else {
                const currentDateUTC = new Date(new Date().toUTCString().slice(0, 25))
                const lastActivityDate = new Date(this.userData.last_activity)

                return (currentDateUTC - lastActivityDate) / 1000 < 5 * 60
            }
        }
    },

    async beforeRouteUpdate(to, from, next) {
        try {
            const walletAddress = to.query.wallet_address;
            const response = await axios.get(`/api/user-by-wallet-address/${walletAddress}`);
            this.userData = response.data.user;
            next();
        } catch (error) {
            console.error(error);
            this.user = null;
            next();
        }
    },

    async created() {
        await this.getUserByWalletAddress();
    },
    methods: {
      getPlayerStyles(colorId) {
        const colorStyles = getColorStyles(colorId)
        this.borderColor = colorStyles.backgroundBord

      },
        async getUserByWalletAddress() {
            this.playerListIndex = this.$route.query.player_list_index

            try {
                const walletAddress = this.$route.query.wallet_address;
                const response = await axios.get(`/api/user-by-wallet-address/${walletAddress}`);
                this.userData = response.data.user;
              this.getPlayerStyles(this.userData.color_id)
            } catch (error) {
                console.error(error);
                this.user = null;
            }
        },
        // getBorderColor(userColorId) {
        //     switch (userColorId) {
        //         case 1:
        //             return '#FFFF00'
        //         case 2:
        //             return '#FF0000'
        //         case 3:
        //             return '#0000FF'
        //         case 4:
        //             return '#EE5E81'
        //         default:
        //             return '#FFFF00'
        //     }
        // },
        formatPower(power) {
            return formatNumberWithSuffix(power)
        }
    },
    watch: {
        address: {
            immediate: true,
            handler() {
              this.getUserByWalletAddress();
            }
        }
    },

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
