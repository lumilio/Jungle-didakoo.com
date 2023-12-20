<template>
    <div id='page5'>
        <div class='allineatore2'>
            <div class="allineatore d-flex justify-content-top ">
                <div style="margin-top:30px;" class="container-sm pepar  ">
                    <p style='font-size:30px;'> v 1.0.0  <a style="color:white; font-size:20px;" href="https://en.wikipedia.org/wiki/Jungle_(board_game)">  斗兽棋 </a> &nbsp <a href="https://ethereum.org/en/"><i class="fa-brands fa-ethereum"></i></a></p>
                    <p>Players in list : </p>
                    <p>Players online : {{ totalCurrentUsers }} </p>
                    <br width="100%" size="20" color="white">
                    <p style='font-size:18px;'> >>> <a style="color:#FAEA09;" href="https://opensea.io/assets/ethereum/0xd07dc4262bcdbf85190c01c996b4c06a461d2430/628469">GAME PASS </a> <<< </p>
                    <p>🌻 x 0 : Basic pass</p> 
                    <p>🌻 x 1 : Big pass</p>   
                    <p>🌻 x 2 : Mega pass</p> 
                    <p>🌻 x 3 : Priority pass</p> 
                    <p>🌻 x 4 : Ultimate Pass</p>  
                    <br width="100%" size="20" color="white">
                    <br width="100%" size="20" color="white">
                    <p style='color:white;'>Chose an Ethereum wallet to get the pass and save your data.</p>
                    <p>> <a style="color:#D1230F;" href="https://metamask.io/"> Metamask</a> <</p>
                    <p>> <a style="color:#D1230F;" href="https://metamask.io/">Coin Base</a> <</p>
                    <br width="100%" size="20" color="white">
                    <br width="100%" size="20" color="white">
                    <p>The following NFTs allow you to unlock in game extra content.</p>
                    <p> > <a style="color:#556FEE;" href="https://rarible.com/token/0xbdc8bd87cfd22ef5b90a93a77eebe5bd0628f841:2352475547185321859375352175754401687841756219705495990747967153936990732289?tab=overview">sun flower V.2  (by didakoo) </a> </p>
                    <p> > <a style="color:#556FEE;" href="https://opensea.io/collection/didakoo-items">didakoo items (by didakoo) </a> </p>
                    <p> > <a style="color:#556FEE;" href="https://opensea.io/collection/cryptokitties">CryptoKitties</a> </p>
                    <p> > <a style="color:#556FEE;" href="https://opensea.io/collection/boredapeyachtclub">Bored Ape Yacht Club</a> </p>
                    <p> > <a style="color:#556FEE;" href="https://opensea.io/collection/cryptopunks">CryptoPunks</a> </p>
                    <p> > <a style="color:#556FEE;" href="https://opensea.io/collection/polychainmonsters">Polychain Monsters</a> </p>
                    <p> > <a style="color:#556FEE;" href="https://opensea.io/collection/sandbox">The sandbox  </a> </p>
                    <p> > <a style="color:#556FEE;" href="https://opensea.io/collection/doodles-official">Doodles  </a> </p>
                    <p> > <a style="color:#556FEE;" href="https://opensea.io/collection/hashmasks">Hash Masks  </a> </p>
                    <br width="100%" size="20" color="white">
                    <hr width="100%" size="20" color="white">
                    <br width="100%" size="20" color="white">
                    <p>help@didakoo.com</p>
                </div>
            </div>
        </div>
    </div>
</template>


<script>
import axios from "axios";

export default {
    data() {
        return {
            totalCurrentUsers: 1,
        }
    },
    mounted() {
        this.getTotalCurrentUsers()
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
        }
    }
}
</script>





