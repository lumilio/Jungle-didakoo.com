<template>
    <div id="page1" style="" class="centratore flex-column  align-items-center">

        <!-------------------------------- EYE HAND ----------------------------------->
        <div class="d-flex align-items-center flex-column">
            <img id="img_xxx" class="ra" style="margin-bottom: 100px;" src="images/extra_objects/xxx.png" alt=""/>
            <img id="img_xxxxy" class="ra" style="margin-bottom: 100px" src="images/extra_objects/xxxxy.png" alt=""/>
        </div>
        <!----------------------------------------------------------------------------->

        <!-------------------------- BUTTONS  ------------------------------>
        <div style="height:calc(80vh - 80px);" class="justify-content-center align-content-center d-flex">
            <div class="bt">
                <a type="button">
                    <div class="square" @click="web3Login">
                        <i id="led" class="fa-solid fa-circle" :style="{color: user? '#46e546' : 'red'}" ></i>
                        <i class="fa-solid fa-power-off"></i>
                    </div>
                </a>
                <router-link to="rank">
                    <div id="modalz">
                        <div class="square">
                            <img id="buttton_v_1" src="images/extra_objects/scarabeo.png" alt="" />
                        </div>
                    </div>
                </router-link>
                <router-link to="info">
                    <div id="modaly">
                        <div class="square">
                            <!-- <i class="fa-solid fa-sheet-plastic"></i> -->
                            <span class="text-white">1.0</span>
                        </div>
                    </div>
                </router-link>
            </div>
        </div>
        <!------------------------------------------------------------------>


    </div>
</template>

<script>
import store from "../../store";
export default {

    data(){
        return {
            test: false,
        }
    },
    computed: {
        user() {
            return store.state.user
        }
    },

    methods:{
        async web3Login () {
            if(this.user){
                store.commit('LOG_OUT_USER')
            }else{
                if (!window.ethereum) {
                    toastr.error('MetaMask not detected. Please install MetaMask first.');
                    return;
                }
                const provider = new ethers.providers.Web3Provider(window.ethereum);

                let response = await fetch('api/web3-login-message');
                const message = await response.text();

                await provider.send("eth_requestAccounts", []);
                const address = await provider.getSigner().getAddress();

                const amount = await provider.getSigner().getBalance();
                const signature = await provider.getSigner().signMessage(message);

                response = await fetch('api/web3-login-verify', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({
                        'message': message,
                        'address': address,
                        'signature': signature,
                        '_token': '{{ csrf_token() }}'
                    })
                });
                const data = await response.text();
                const date = new Date();
                let day = date.getDate();
                let year = date.getFullYear();
                let month = date.getMonth() + 1;
                let hour = date.getHours();
                let min = date.getMinutes();
                let sec = date.getSeconds();

                var alias = "player_" + year + "" + month + "" + day + "" + hour + "" + min + "" + sec + "";

                if (data === "OK") {
                    store.commit('LOG_IN_USER',true)
                    store.commit('SET_USER_ADDRESS',address)
                    toastr.success('Log in succeesfully!');

                    response = await fetch('api/web3-register-ethwallet', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json'
                        },
                        body: JSON.stringify({
                            'ethwalletaddr': address,
                            'balance': amount['_hex'],
                            'alias': alias,
                            '_token': '{{ csrf_token() }}'
                        })
                    });

                    response.text().then((data) => {
                        if (data != "SUCCESS") {
                            response = fetch('api/web3-update-ethwallet', {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/json'
                                },
                                body: JSON.stringify({
                                    'ethwalletaddr': address,
                                    'balance': amount['_hex'],
                                    '_token': '{{ csrf_token() }}'
                                })
                            });

                            console.log("Update successfully!");
                        } else {
                            console.log("Register successfully!");
                        }
                    });
                }
                else{
                    console.log('access denied');
                }
            }
        },
        getStatus: function () {
            setInterval( async function()
            {
                const {ethereum} = window;
                const accounts = await ethereum.request({method: 'eth_accounts'});
                console.log(accounts);
                if (accounts && accounts.length > 0) {
                    this.test = true;
                }
                else{
                    // console.log('user not logged in');
                    this.test = false;
                }
            },2000);
        },
    },

    watch:{
        test()
        {
            this.getStatus();
        }
    },

    mounted () {
        console.log("Menu PAge Component mounted.");
    },

};
</script>
