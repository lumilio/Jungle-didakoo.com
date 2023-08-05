<template>
    <div class="modal1" v-if="show">
        <div class="modal-overlay1" @click="closeModal"></div>
        <div class="connect-modal-content">
            <div> <h1 class="animate-charcter">SELECT YOUR WALLET</h1> </div>
            <div class="buttonCoin" @click="web3Login('metamask')" id="metamask">
                <img :src=MetamaskWalletImg alt="MetamaskWallet" class="imgSize"> <p class="animate-charcterMeta">Metamask</p>
            </div>
            <div class="buttonCoin" @click="web3Login('coinbase')" id="coinbase">
                <img :src=CoinBaseWallet alt="MetamaskWallet" class="imgSize"> <p class="animate-charcterBase">CoinBase</p>
            </div>
            <span class="close1" @click="closeModal">&times;</span>
            <slot></slot>

        </div>
    </div>
</template>

<script>
import store from "../../store";
import MetamaskWalletImg from "../../../images/extra_objects/MetaMask_Fox.png"
import CoinBaseWallet from "../../../images/extra_objects/CoinBaseWallet.png"

export default {
    props: {
        show: {
            type: Boolean,
            required: true,

        }
    },
    data(){
        return {
            MetamaskWalletImg: MetamaskWalletImg,
            CoinBaseWallet :CoinBaseWallet
        }
    },
    methods: {
        closeModal() {
            this.$emit("close");
        },
        openModal() {
            this.showModal = true;
        },
        async web3Login(wallet) {

            if (this.user) {
                const response = await fetch('api/logout', {
                    method: 'GET',
                    headers: {
                        'Content-Type': 'application/json'
                    }
                });
                store.commit('LOG_OUT_USER')
            } else {
                if (!window.ethereum) {
                    toastr.error('MetaMask not detected.Please install MetaMask first.');
                    return;
                }


                // const provider = new ethers.providers.Web3Provider(window.ethereum);
                let provider = wallet === 'metamask' ? window.ethereum.providers.find((provider) => provider.isMetaMask) : window.ethereum.providers.find((provider) => provider.isCoinbaseWallet);
                provider = new ethers.providers.Web3Provider(provider);


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
                        '_token': document.querySelector('meta[name="csrf-token"]').content
                    })
                });
                const data = response.statusText;
                const date = new Date();
                let day = date.getDate();
                let year = date.getFullYear();
                let month = date.getMonth() + 1;
                let hour = date.getHours();
                let min = date.getMinutes();
                let sec = date.getSeconds();

                var alias = "player_" + year + "" + month + "" + day + "" + hour + "" + min + "" + sec + "";
                if (data === "OK") {
                    store.commit('LOG_IN_USER', true)
                    store.commit('SET_USER_ADDRESS', address)
                    this.$emit("close");
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
                            '_token': document.querySelector('meta[name="csrf-token"]').content
                        })
                    });
                    response.text().then((data) => {
                        if (data !== "SUCCESS") {
                            response = fetch('api/web3-update-ethwallet', {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/json'
                                },
                                body: JSON.stringify({
                                    'ethwalletaddr': address,
                                    'balance': amount['_hex'],
                                    '_token': document.querySelector('meta[name="csrf-token"]').content
                                })
                            });

                            console.log("Update successfully!");
                        } else {
                            console.log("Register successfully!");
                        }
                    });
                } else {
                    toastr.error('access denied')
                    console.log('access denied');
                }
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
watch:{
    test()
    {
        this.getStatus();
    }
},

mounted () {
    console.log("Menu PAge Component mounted.");
},
}
</script>

<style>
/* Style the modal */
.modal1 {
    position: fixed;
    z-index: 1;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    display: flex;
    justify-content: center;
    align-items: center;

}

.modal-overlay1 {
    position: fixed;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.4);
}

/* Modal Content/Box */
.connect-modal-content {
    background: linear-gradient(rgb(42, 39, 65), rgb(42, 39, 65)) padding-box padding-box, linear-gradient(45deg, rgb(39 78 120 / 18%), rgba(39, 141, 254, 0.18)) border-box border-box;
    padding: 20px;
    width: 350px;
    height: 400px;
    overflow: auto;
    position: relative;
    display: flex;
    flex-direction: column;
    gap: 15px;
    justify-content: center;
    margin: 15% auto;
    border-radius: 20px;
    min-width: 350px;

}

/* The Close Button */
.close1 {
    color: #aaa;
    font-size: 28px;
    font-weight: bold;
    position: absolute;
    top: 5px;
    right: 10px;
    cursor: pointer;
}

.close1:hover {
    color: black;
}
.buttonCoin{
    display: flex;
    text-align: center;
    align-items: center;
    width: 100%;
    background: rgba(49, 46, 71, 0.64);
    -webkit-box-align: center;
    box-shadow: none;
    border: 2px solid transparent;
    border-radius: 12px;
    padding: 8px 24px;
    color: rgb(252, 252, 255);
    cursor: pointer;
    gap: 40px;
    margin: 0;
    height: 70px;
}
.buttonCoin:hover{
    font-size: 22px;
}
.animate-charcter{
    position: absolute;
    top: 0;
    padding-top: 25px;
    text-transform: uppercase;
    background-image: linear-gradient(
        -225deg,
        #231557 0%,
        #111da2 29%,
        #064ae0 67%,
        #33d1ee 100%
    );
    background-size: auto auto;
    background-clip: border-box;
    background-size: 200% auto;
    color: #fff;
    background-clip: text;
    text-fill-color: transparent;
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    animation: textclip 2s linear infinite;
    display: inline-block;
    font-size: 28px;
}

@keyframes textclip {
    to {
        background-position: 200% center;
    }
}
.animate-charcterMeta{
    margin: 0;
    text-transform: uppercase;
    background-image: linear-gradient(
        -225deg,
        #ff4c00 0%,
        #de6135 29%,
        #f6885a 67%,
        #f3c63e 100%
    );
    font-size: 18px;
    background-size: auto auto;
    background-clip: border-box;
    background-size: 200% auto;
    color: #fff;
    background-clip: text;
    text-fill-color: transparent;
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    animation: textclip 4s linear infinite;
    display: flex;
    justify-items: center;
}

@keyframes textclip {
    to {
        background-position: 200% center;
    }
}
.animate-charcterBase{
    margin: 0;
    text-transform: uppercase;
    background-image: linear-gradient(
        -225deg,
        #1b3ad3 0%,
        #4a56da 29%,
        #789bea 67%,
        #a2c0ee 100%
    );
    font-size: 18px;
    background-size: auto auto;
    background-clip: border-box;
    background-size: 200% auto;
    color: #fff;
    background-clip: text;
    text-fill-color: transparent;
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    animation: textclip 4s linear infinite;
    display: flex;
    justify-items: center;
}

@keyframes textclip {
    to {
        background-position: 200% center;
    }
}
.imgSize{
    max-width: 40px;

}
.WalletText{
    margin: 0;
    text-transform: uppercase;
    background-image: linear-gradient(
        -225deg,
        #231557 0%,
        #111da2 29%,
        #064ae0 67%,
        #33d1ee 100%
    );
    font-size: 18px;
    background-size: auto auto;
    background-clip: border-box;
    background-size: 200% auto;
    color: #fff;
    background-clip: text;
    text-fill-color: transparent;
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    animation: textclip 4s linear infinite;
    display: flex;
    justify-items: center;
}

@keyframes textclip {
    to {
        background-position: 200% center;
    }
}
.WalletText:hover{
    font-size: 22px;

}
.buttonCoin:hover{
    font-size: 22px;
}

</style>
