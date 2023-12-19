<template>
    <div id='page5'>
        <div class='allineatore2'>


            <!--------------------- MODAL -------------------->
            <div id='myModalkoo4' class="modal">
                <!-- Modal content -->
                <div class="modal-content d-flex flex-column align-items-center">
                    <span class="closekoo4">&times;</span>
                    <button id='btnkoo_5_1' class="rainbow-button" > H𐍈ME </button>
                    <button id='btnkoo_5_2' > Y𐍈U  </button>
                    <button id='btnkoo_5_3' > LOG𐍈UT </button>
                </div>
            </div>

            <!---------------------- BODY ------------------->
            <div class="allineatore d-flex justify-content-top ">
                <div style="margin-top:30px;" class="container-sm pepar  ">
                    <p style='font-size:30px;'> v 1.0.0  <a style="color:white; font-size:20px;" href="https://opensea.io/assets/ethereum/0xd07dc4262bcdbf85190c01c996b4c06a461d2430/628469">  斗兽棋 </a> &nbsp <a href=""><i class="fa-brands fa-ethereum"></i></a>
                    </p>
                    <p>Players online : {{ totalCurrentUsers }} </p>
                    <p style='color:white;'>Buy flower Nft :</p>

                    <p style='font-size:20px;' >
                        >>> <a style="color:#FAEA09;" href="https://opensea.io/assets/ethereum/0xd07dc4262bcdbf85190c01c996b4c06a461d2430/628469"><!-- sun flower pass  --><span style="font-size:30px;">🌻</span> </a> <<<
                    </p>
                    

                    <p>🌻 x 0 : Basic pass</p> 
                    <p>🌻 x 1 : Big pass</p>   
                    <p>🌻 x 2 : Mega pass</p> 
                    <p>🌻 x 3 : Priority pass</p> 
                    <p>🌻 x 4 : Ultimate Pass</p>  



                    <hr width="100%" size="20" color="white">
                    <br width="100%" size="20" color="white">
                    <!-- <p>At the cout down end an immage of the entire rank will be mint. </p> -->
                    <span style='color:white;'>Download an Ethereum wallet to get the pass and save your data :   </span>
                    <span>> <a style="color:#D1230F;" href="https://metamask.io/"> Metamask</a> <</span>
                    <span>> <a style="color:#D1230F;" href="https://metamask.io/">Coin Base</a> <</span>
                    <br width="100%" size="20" color="white">




                    <br width="100%" size="20" color="white">
                    <hr width="100%" size="20" color="white">
                    <br width="100%" size="20" color="white">





                    <!-- <p>🌻 v.2 = + 1/1 GAME TOKENS <img style='width:30px;' src='images/extra_objects/ff.png' alt=""></p> -->
                    <!--
                    <p> Every day you total token will recharged:</p>
                    <p class='text-white' style='font-family: "VT323", monospace;   margin-top:25px; '> 00:00:00 UTC+1 ROME</p>
                    <p style="font-size:30px">  0/2 <img style='width:50px;' src='images/extra_objects/ff.png' alt="">
                    --->    <!-- 2/2 <img style='width:50px;' src='images/extra_objects/ff.png' alt=""> </p>  -->





                    <p>The following NFTs allow you to unlock in game extra content.</p>
                    <p> > <a style="color:#556FEE;" href="https://opensea.io/collection/cryptopunks">sun flower V.2  (by didakoo) </a> </p>
                    <p> > <a style="color:#556FEE;" href="https://opensea.io/collection/cryptopunks">didakoo items (by didakoo) </a> </p>
                    <p> > <a style="color:#556FEE;" href="https://opensea.io/collection/cryptokitties">CryptoKitties</a> </p>
                    <p> > <a style="color:#556FEE;" href="https://opensea.io/collection/boredapeyachtclub">Bored Ape Yacht Club</a> </p>
                    <p> > <a style="color:#556FEE;" href="https://opensea.io/collection/cryptopunks">CryptoPunks</a> </p>
                    <p> > <a style="color:#556FEE;" href="https://opensea.io/collection/cryptopunks">Polychain  </a> </p>
                    <p> > <a style="color:#556FEE;" href="https://opensea.io/collection/cryptopunks">The sandbox  </a> </p>
                    <p> > <a style="color:#556FEE;" href="https://opensea.io/collection/cryptopunks">Doodles  </a> </p>
                    <p> > <a style="color:#556FEE;" href="https://opensea.io/collection/cryptopunks">Hash Masks  </a> </p>
                    <hr width="100%" size="20" color="white">
                    <br width="100%" size="20" color="white">


                <p>
                    help@didakoo.com
                </p>

                <p>
                     Follow on instagram
                </p>

                <p>Follow on twitter</p>
                </div>
            </div>
            <!----------------------------------------------->


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





