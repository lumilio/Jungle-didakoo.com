<template>
    <div id='page2' >

        <!----------------------- LOGO ----------------------->
        <div id="_box1_" class="container-sm d-flex justify-content-center align-items-center flex-column">
            <div class="d-flex flex-column justify-content-center  alingn-items-center">
                <div class="d-flex justify-content-center  alingn-items-center">
                    <img style="width: 60px; margin-bottom: 20px; display: inline; transform: scaleX(-1);" src="images/extra_objects/icon-06.png" alt=""/>
                    <div @click="startGame()" style="display: contents" class="pointer">
                        <button id="modalx" class="no-wrap align-items-center text-big d-flex px-4 call_button">
                            <span>
                                START GAME
                            </span>
                        </button>
                    </div>
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
                    <p class='text-white' style='font-family: "VT323", monospace;'>Next update list in {{ secondsUntilUpdate }} sec </p>
                    <div class="d-flex">

                        <img style='width:30px;' src="images/extra_objects/sandtime.png" alt="">
                    </div>
                </div>
            </button>
            <!-- Looping through players --------------------------------------------------->
                <div
                    v-for="(player, playerListIndex) in players"
                    @click="goToAvatarPage(player)"
                    :key="player.id"
                    class="record pointer"
                    :style="{backgroundColor : player.backgroundBord, textDecoration: 'none'}"
                >
                    <div :style="{
                        color: player.colorAddress,
                        textOverflow: 'ellipsis',
                        whiteSpace: 'nowrap',
                        overflow: 'hidden'
                    }">
                        <p :style="{
                            color: player.colorAddress,
                            fontSize: '14.5px',
                            padding: '10px',
                            margin: '0',
                            textOverflow: 'ellipsis',
                            whiteSpace: 'nowrap',
                            overflow: 'hidden',
                            textDecoration: player.textDecorationAddress}"
                        >
                            {{ playerListIndex + 1 }}°
                            <img
                                :src="player.avatarSrc" alt="User Avatar"
                                style="width: 20px; margin-left: 5px; margin-right: 5px; margin-bottom: 3px;" />
                            {{ player.wallet_address }}
                        </p>
                    </div>
                    <div class='d-flex align-items-center flex-row flex-nowrap'>
                        <template v-for="(item, key) in colorIconNft(player.color_id)" v-if="player[key] > 0 && item">
                            <i v-if="item?.type === 'icon'"
                               :style="{fontSize: item?.size, marginRight: '5px', color: [3,5].includes(player.color_id) ? 'white' : 'black'}"
                               :class=item.class></i>
                            <img v-else :style="{width: item?.size ? item.size : '35px', marginRight: '5px'}" :src="item?.image ? item.image : item" alt=""/>
                        </template>
                    </div>

                    <span class='align-items-center' :style="{color: player.colorPower, marginRight: '10px',whiteSpace: 'nowrap',  backgroundColor: '',  padding: '0 10px',  borderRadius: '20px', display: 'flex'}">
                        {{ formatPower(player.power) }} <i class="fa-solid fa-bolt ml-1"></i>
                    </span>
                </div>

            <div class="spinner_handler my-5" v-if="isLoading">
                <div class="spinner-border text-light" role="status">
                    <span class="sr-only">Loading...</span>
                </div>
            </div>
        </div>

    </div>
</template>

<script>
import axios from 'axios';
import store from "../../store";
import { getColorStyles } from '../../utilites/getColorByUserColorId';
import { formatNumberWithSuffix } from '../../utilites/formatNumberWithSuffix'
import colorIconNft from "../../constants/nftLinks";
import _ from 'lodash'

 export default {
    data(){
        return {
            players: [],
            url: '',
            backgroundBord: '',
            colorAddress:'',
            colorPower: '',
            avatarSrc: '',
            textDecorationAddress: '',
            colorId: '',
            secondsUntilUpdate: 60,
            page: 1,
            isLoading: false,
            scrollToBottomLastCalled: 0
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
        },
        playersArray() {
            return store.state.playersList
        }
    },
    methods:{
        startGame() {
            this.$router.push({path: 'game'});
        },
        colorIconNft,
        async updatePlayersListIfNeeded() {
            const playersListLastFetched = store.state.playersListLastFetched
            const now = Math.floor(Date.now() / 1000)

            // If last time fetched is more than 1 minute ago, fetch
            if (playersListLastFetched === null || now - playersListLastFetched > 60) {
                await this.fetchAllUsers(1)
            }
        },
        async fetchAllUsers(page) {
            this.url = window.location.host;
            const response = await axios.get(process.env.MIX_SERVER_APP_URL + `/api/get-users?page=${page}`);
            const players = response.data.users.map((player) => {
                return {
                    ...player,
                    ...this.getPlayerStyles(player.color_id)
                }
            })
            if (page == 1) {
                store.commit('SET_PLAYERS_LIST', players)
                store.commit('SET_PLAYERS_LIST_LAST_FETCHED', Math.floor(Date.now() / 1000))

                this.players = [...players]
            } else {
                this.players = [
                    ...this.players,
                    ...players.slice(this.players.length)
                ]
            }
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
        },
        goToAvatarPage(players){
            this.$router.push({path: "/avatar", query: {wallet_address: players?.wallet_address}});
        },
        initWindowScrollListener() {
            window.addEventListener('scroll', (event) => {
                if (Date.now() > this.scrollToBottomLastCalled + 2000) {
                    if ((event.target.scrollingElement.offsetHeight + event.target.scrollingElement.scrollTop) >= event.target.scrollingElement.scrollHeight) {
                        this.scrollToBottomLastCalled = Date.now()
                        this.isLoading = true;
                        this.page++;
                        setTimeout(() => {
                            this.fetchAllUsers(this.page)
                                .then(() => {
                                    this.isLoading = false
                                })
                        }, 1000)
                    }
                }
            })
        }
    },
    async mounted()
    {
        await this.updatePlayersListIfNeeded();
        this.players = [...this.playersArray]
        setInterval(() => {
            if (this.secondsUntilUpdate > 1) {
                this.secondsUntilUpdate--
            }
        }, 1000)
        setInterval(async () => {
            await this.fetchAllUsers(1)
            this.secondsUntilUpdate = 60
            this.page = 1
        }, 60 * 1000)
        this.initWindowScrollListener()
    },

 }
</script>
<style>
.pointer{
    cursor: pointer;
}
</style>
