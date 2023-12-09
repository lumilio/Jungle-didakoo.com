<template>
    <div id='page2' >

        <!----------------------- UTILITY MODAL usless now ----------------------->
        <div id='myModalkoo' class="modal">
            <div class="modal-content d-flex flex-column align-items-center">
                <span class="closekoo_rank">&times;</span>
                <button id='btnkoo_2_1' class="rainbow-button" > H𐍈ME </button>
                <button id='btnkoo_2_2' > Y𐍈U  </button>
                <button id='btnkoo_2_3' > LOG𐍈UT </button>
            </div>
        </div>

        <!----------------------- LOGO ----------------------->
        <div id="_box1_" class="container-sm d-flex justify-content-center align-items-center flex-column">


            <div class="d-flex flex-column justify-content-center  alingn-items-center">

                <div class="d-flex justify-content-center  alingn-items-center">
                    <img style="width: 60px; margin-bottom: 20px; display: inline; transform: scaleX(-1);" src="images/extra_objects/icon-06.png" alt=""/>
                    <router-link :to="{ path: 'game' }" style="display: contents">
                        <button id="modalx" class="no-wrap align-items-center text-big d-flex px-4 call_button">
                            <span>
                                START GAME
                            </span>
                        </button>
                    </router-link>
                    <img style="width: 60px; margin-bottom: 20px; display: inline" src="images/extra_objects/icon-05.png" alt="" />
                </div>
            </div>

            <img id='scarabeo'  style='margin-top:20px;' src='images/extra_objects/17.svg' alt="">
        </div>
        <div class="d-flex container-sm  mt-3 flex-column"></div>

        <!--------------------------------------- RANK LIST ------------------------------------------>
        <div style='max-width:800px' class="rank d-flex container-sm  flex-column align-items-center text-white">

            <button class='refresh-button' style='background-color:black;'>
                <div class='d-flex justify-content-center align-items-center' style='color:white; padding: 10px; margin: 0;'>
                    <p class='text-white' style='font-family: "VT323", monospace;'>Next update list in 15 sec </p>
                    <div class="d-flex">

                        <img style='width:30px;' src="images/extra_objects/sandtime.png" alt="">
                    </div>
                </div>
            </button>



            <!-- Looping through players --------------------------------------------------->
                <router-link
                    v-for="(players, playerListIndex) in playersArray"
                    v-bind:key="players.id"
                    class="record"
                    :style="{backgroundColor : players.backgroundBord, textDecoration: 'none'}"
                    :to="{ path: 'avatar', query: { wallet_address: players?.wallet_address, player_list_index: playerListIndex + 1 } }"
                >
                    <div :style="{
                        color: players.colorAddress,
                        textOverflow: 'ellipsis',
                        whiteSpace: 'nowrap',
                        overflow: 'hidden'
                    }">
                        <p :style="{
                            color: players.colorAddress,
                            fontSize: '14.5px',
                            padding: '10px',
                            margin: '0',
                            textOverflow: 'ellipsis',
                            whiteSpace: 'nowrap',
                            overflow: 'hidden',
                            textDecoration: players.textDecorationAddress}"
                        >
                            {{ playerListIndex + 1 }}°
                            <img
                                :src="players.avatarSrc" alt="User Avatar"
                                style="width: 20px; margin-left: 5px; margin-right: 5px; margin-bottom: 3px;" />
                            {{ players.wallet_address }}
                        </p>
                    </div>
                    <div class='d-flex align-items-center flex-row flex-nowrap'>
                        <template v-for="(item, key) in colorIconNft(players.color_id)" v-if="players[key] > 0 && item">
                            <img style="width:35px;" :src="item" alt=""/>
                        </template>
                    </div>

                    <span class='align-items-center' :style="{color: players.colorPower, marginRight: '10px',whiteSpace: 'nowrap',  backgroundColor: '',  padding: '0 10px',  borderRadius: '20px', display: 'flex'}">
                        {{ formatPower(players.power) }} <i class="fa-solid fa-bolt ml-1"></i>
                    </span>
                </router-link>


        </div>

    </div>
</template>

<script>
import axios from 'axios';
import store from "../../store";
import { getColorStyles } from '../../utilites/getColorByUserColorId';
import { formatNumberWithSuffix } from '../../utilites/formatNumberWithSuffix'
import colorIconNft from "../../constants/nftLinks";

 export default {
    data(){
        return{
            playersArray: [],
            url: '',
            backgroundBord: '',
            colorAddress:'',
            colorPower: '',
            avatarSrc: '',
            textDecorationAddress: '',
            colorId: '',
        }
    },
    computed: {
        user() {
            return store.state.user
        },
        address() {
            return store.state.address
        },
        userData(){
            return store.state.userData
        }
    },
    methods:{
        colorIconNft,
        async getAllUsers()
        {
            this.url = window.location.host;
            const response = await axios.get(process.env.MIX_SERVER_APP_URL + '/api/get-users');
            this.playersArray = response.data.users;
            this.playersArray.forEach(user =>{
            return this.getPlayerStyles(user.color_id)
          })
            this.playersArray = this.playersArray.map((player) => {
                return {
                    ...player,
                    ...this.getPlayerStyles(player.color_id)
                }
            })
        },
        getPlayerStyles(colorId) {
            const colorStyles = getColorStyles(colorId)

            return {
                backgroundBord: colorStyles.backgroundBord ?? '#EDEB52',
                colorAddress: colorStyles.colorAddress ?? 'black',
                colorPower: colorStyles.colorPower ?? 'black',
                avatarSrc: colorStyles.avatarSrc ?? '../../../images/extra_objects/iconaplayB.png',
                textDecorationAddress: colorStyles.textDecorationAddress ?? 'black',
                colorId: colorStyles.colorId,
            }
        },
        formatPower(power) {
            return formatNumberWithSuffix(power)
        }
    },
    async mounted()
    {
        await this.getAllUsers();
    },

 }
</script>
