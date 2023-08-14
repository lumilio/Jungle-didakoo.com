<template>
    <div class="modal1" v-if="show">
        <div class="modal-overlay1" @click="closeModal"></div>
        <div class="connect-modal-content">
            <div class="d-flex container-sm align-items-center justify-content-between flex-row">
                <img class="modal_logo" style='width:100px;' src="../../../images/extra_objects/ddd.jpg">
                <span class="version_sign text-white">v 1.0.0</span>
            </div>
            <div> <h2 class=" mt-4 mb-5 ml-3" style='font-family: "VT323", monospace; color:white;'>Select wallet to login</h2> </div>
            <button class="WalletCoinButton" @click="web3Login('metamask')" id="metamask">
                <img :src=MetamaskWalletImg alt="MetamaskWallet" class="imgSize">
                <p class="WalletCoinButtonText"> METAMSK </p>
            </button>
            <button class="WalletCoinButton" @click="web3Login('coinbase')" id="coinbase">
                <img :src=CoinBaseWallet alt="MetamaskWallet" class="imgSize">
                <p class="WalletCoinButtonText"> COINBASE </p>
            </button>
            <span class="close1" @click="closeModal" >&times;</span>
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
                try {
                    if (!window.ethereum) {
                        toastr.error('MetaMask not detected.Please install MetaMask first.');
                        return;
                    }

                    let provider = {};
                    try {
                        provider = wallet === 'metamask' ? window.ethereum.providers.find((provider) => provider.isMetaMask) : window.ethereum.providers.find((provider) => provider.isCoinbaseWallet);
                        console.log(window.ethereum.providers,'provider')
                        provider = new ethers.providers.Web3Provider(provider);
                    }catch (e) {
                        if (wallet === 'metamask'){
                            console.log(2)

                            provider = new ethers.providers.Web3Provider(window.ethereum);
                        }else{
                            toastr.error('Coinbase not detected.Please install Coinbase first.');
                        }

                    }
                    console.log(3)

                    let response = await fetch('api/web3-login-message');
                    const message = await response.text();
                    console.log(3.1)

                    await provider.send("eth_requestAccounts", []);
                    console.log(3.2)
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
                    console.log(4)

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
                }catch (e) {

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
    overflow-y: hidden;
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
    /* background-color: rgba(0, 0, 0, 0.4); NO DARK BACKGROUND for NOW */
}

/* Modal Content/Box */
.connect-modal-content {
    background: black;
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
    align-items: center;

}

/* The Close Button */
.close1 {
    color:red;
    font-size: 28px;
    font-weight: bold;
    position: absolute;
    top: 5px;
    right: 10px;
    cursor: pointer;
}

.close1:hover {
    color: darkred;
}

.WalletCoinButtonText{
    margin: 0;
    align-self: center;
    text-transform: uppercase;
    background-clip: border-box;
    color: #fff;
    font-size: 14px;
}
.WalletCoinButton{
    background: black;
    border-radius: 8px;
    min-height: auto;
    height: 42px;
    border: 1px solid rgba(255, 255, 255, 0.2196078431);
    padding: 0 5px;
    box-shadow: 0 0 6px 1px rgba(255, 255, 255, 0.43);
    transition: 0.2s ease;
    width: 150px;
    display: flex;
    gap: 10px;
}
.WalletCoinButton:hover {
    box-shadow: 0 0 7px 1px rgba(255, 255, 255, 0.5);
    transform: scale(1.02);
}
.imgSize{
    max-width: 35px;
    margin: 0;
    align-self: center;
    padding: 2px 0;

}
</style>
