<template>
    <div id='page5'>
        <div class='allineatore2'>
            <div class="allineatore d-flex justify-content-top ">
                <div style="margin-top:30px;" class="container-sm pepar  ">
                    <p style='font-size:30px;'> v 1.0.4  <a style="color:white; font-size:20px;" href="https://en.wikipedia.org/wiki/Jungle_(board_game)">  斗兽棋 </a> &nbsp <a href="https://ethereum.org/en/"><i class="fa-brands fa-ethereum"></i></a></p>
                    <p>Players in list : {{players}}</p>
                    <p>Players online : {{ totalCurrentUsers }} </p>

                    <br width="100%" size="20" color="white">

                    <p style='font-size:15px;'> >>>  <a style="color:#FFA500; text-decoration: underline;" href="https://medium.com/@didakoo/jungle-game-pepar-afd5fb84f18e">GAME RULES </a>  <<< </p>

                    <br width="100%" size="20" color="white">


                    <p style='color:white;'>Play as guest <img :src=Guest alt="guest" class="imgSize"> or use a supported <a style='color:#3490dc;' href="https://ethereum.org/en/">Ethereum</a> wallet to get the pass and save your game progress.</p>
                    <p>> <a style="color:#D1230F;" href="https://metamask.io/"> Metamask</a> < <img :src=Metamask alt="guest" class="imgSize"></p>
                    <!-- <p>> <a style="color:#D1230F;" href="https://metamask.io/">Coin Base</a> <</p> -->

                    <br width="100%" size="20" color="white">
                    <br width="100%" size="20" color="white">

                    <p>The following NFTs allow you to unlock in game extra content.</p>

                    <br width="100%" size="20" color="white">

                    <p style='font-size:15px;'> >>> ⚡️ <a style="color:#FAEA09; text-decoration: underline;" href="https://opensea.io/assets/ethereum/0xd07dc4262bcdbf85190c01c996b4c06a461d2430/628469">GAME PASS </a> ⚡️ <<< </p>
                    <p>🌻 x 0 : Basic pass</p>
                    <p>🌻 x 1 : Big pass</p>
                    <p>🌻 x 2 : Priority pass</p>
                    <p>🌻 x 3 : Mega pass</p>
                    <p>🌻 x 4 : Ultimate Pass</p>

                    <br width="100%" size="20" color="white">

                    <p> <a style="color:#556FEE;" href="https://rarible.com/token/0xbdc8bd87cfd22ef5b90a93a77eebe5bd0628f841:2352475547185321859375352175754401687841756219705495990747967153936990732289?tab=overview">sun flower V.2  (<span style="color:#FAEA09;" >GAME PASS v.2</span>) </a> </p>
                    <p> <a style="color:#556FEE;" href="https://opensea.io/collection/didakoo-items">didakoo items </a> </p>
                    <p> <a style="color:#556FEE;" href="https://opensea.io/collection/cryptokitties">CryptoKitties</a> </p>
                    <p> <a style="color:#556FEE;" href="https://opensea.io/collection/boredapeyachtclub">Bored Ape Yacht Club</a></p>
                    <p> <a style="color:#556FEE;" href="https://opensea.io/collection/cryptopunks">CryptoPunks</a></p>
                    <p> <a style="color:#556FEE;" href="https://opensea.io/collection/polychainmonsters">Polychain Monsters</a></p>
                    <p> <a style="color:#556FEE;" href="https://opensea.io/collection/sandbox">The sandbox  </a></p>
                    <p> <a style="color:#556FEE;" href="https://opensea.io/collection/doodles-official">Doodles  </a></p>
                    <p> <a style="color:#556FEE;" href="https://opensea.io/collection/hashmasks">Hash Masks  </a></p>
                    <p> <a style="color:#556FEE;" href="https://opensea.io/collection/adidascapsule">adidas IMPOSSIBLE BOX  </a></p>
                    <p> <a style="color:#556FEE;" href="https://opensea.io/collection/rtfkt-nike-cryptokicks">RTFKT x Nike Dunk Genesis CRYPTOKICKS  </a></p>
                    <p> <a style="color:#556FEE;" href="https://opensea.io/collection/pepsi-mic-drop">Pepsi Mic Drop  </a></p>
                    <p> <a style="color:#556FEE;" href="https://opensea.io/collection/lacoste-undw3-the-emerge">Lacoste UNDW3: The Emerge  </a></p>
                    <p> <a style="color:#556FEE;" href="https://opensea.io/collection/decentraland">Decentraland  </a></p>
                    
                    <br width="100%" size="20" color="white">
                    <hr width="100%" size="20" color="white">
                    <br width="100%" size="20" color="white">

                    <p>info@didakoo.com</p>
                    <a href="https://twitter.com/didakoo_games"><i style='font-size: 20px; margin-left: 0px; color: white;' class="fa-brands fa-x-twitter"></i></a>
                    <a href="https://www.instagram.com/didakoo.games/"><i style='font-size: 20px; margin-left: 7px; color: white;' class="fa-brands fa-instagram"></i></a>  
                    <a href="https://medium.com/@didakoo/jungle-game-pepar-afd5fb84f18e"><i style='font-size: 20px; margin-left: 7px; color: white;' class="fa-brands fa-medium"></i></a>
                    <a href="https://discord.gg/5pWJft5muW"><i style='font-size: 20px; margin-left: 7px; color: white;' class="fa-brands fa-discord"></i></a>
                    <a href="https://www.reddit.com/r/Jungle_didakoo/new/"><i style='font-size: 22px; margin-left: 7px; color: white;' class="fa-brands fa-square-reddit"></i></a>
                    <a href="https://www.youtube.com/@didakoo_tv"><i style='font-size: 20px; margin-left: 7px; color: white;' class="fa-brands fa-youtube"></i></a>
                    <a href="https://www.twitch.tv/didakoo_tv"><i style='font-size: 20px; margin-left: 7px; color: white;' class="fa-brands fa-twitch"></i></a>
                </div>
            </div>
        </div>
    </div>
</template>


<script>
import axios from "axios";
import Guest from '../../../images/extra_objects/ghost.png'
import Metamask from '../../../images/extra_objects/MetaMask_Fox.png'

export default {
    data() {
        return {
            players: '',
            totalCurrentUsers: 1,
            Guest: Guest,
            Metamask: Metamask
        }
    },
    mounted() {
        this.getTotalCurrentUsers()
        this.getAllUsers()
    },
    methods: {
        async getTotalCurrentUsers() {
            try {
                const response = await axios.get(process.env.MIX_SERVER_APP_URL + '/api/active-sessions')
                const activeSessions = response.data.total
                this.totalCurrentUsers = activeSessions
            } catch (error) {
                console.log(error)
                this.totalCurrentUsers = 'Could not fetch current users'
            }
        },
        async getAllUsers() {
            const response = await axios.get(process.env.MIX_SERVER_APP_URL + '/api/get-users');
            this.players = response.data.users.length
        }
    }
}
</script>

<style scoped>
.imgSize{
    max-width: 20px;
    margin: 0;
    align-self: center;
    padding: 2px 0;

}
</style>





