import VueRouter from "vue-router";

import store from "../store"
// import Login from '../modules/login'
// import Register from '../modules/register'
// import Home from "../modules/home/1.vue";

import DefaultContainer from "../components/layouts/DefaultContainer.vue";
import RankPage   from "../components/pages/RankPage.vue";
import AvatarPage from "../components/pages/AvatarPage.vue";
import BoardGame  from "../components/pages/BoardGame.vue"
import InfoPage   from "../components/pages/InfoPage.vue"
import MenuPage   from "../components/pages/MenuPage.vue"
import PlayGame from "../components/pages/PlayGame.vue";


const authGuard = (to, from, next) => {
    if (localStorage.getItem("authToken")) {
        next()
    } else {
        next('/login')
    }
}

const routes = [
    {
        path: '/',
        redirect: '/rank',
        component: DefaultContainer,
        children: [
            {
                path: 'rank',
                name: 'rank',
                component: RankPage,
            },
            {
                path: 'avatar',
                name: 'avatar',
                component: AvatarPage,
                props: (route) => ({
                    walletAddress: route.query.wallet_address,
                    playerListIndex: route.query.player_list_index
                }),
            },
            {
                path: 'menu',
                name: 'menu',
                component: MenuPage,
            },
            {
                path: 'info',
                name: 'info',
                component: InfoPage,
            }
        ]
    },
    {
        path: '/game',
        name: 'game',
        component: BoardGame,
    },
    {
        path: '/room/:id',
        name: 'room',
        component: PlayGame,
    },
    // {
    //   path: '/login',
    //   name: 'Login',
    //   component: Login
    // },
    // {
    //   path: '/main',
    //   name: 'Main',
    //   component: Board2Game,
    //   beforeEnter: authGuard
    // },
    // {
    //   path: '/register',
    //   name: 'Register',
    //   component: Register
    // },
    // {
    //   path: '/:pathMatch(.*)*',
    //   component: Home
    // }
]

const router = new VueRouter({
    mode: 'history',
    routes: routes
});

router.beforeEach(async (to, from, next) => {
    if (store.state.user) {
        await _throttleActivityLog(async () => {
            await axios.post(process.env.MIX_SERVER_APP_URL + '/api/update-player-last-activity', {
                headers: {
                    'Content-Type': 'application/json',
                    '_token': document.querySelector('meta[name="csrf-token"]').content
                }
            })
        }, 1)
    }

    next()
})

const _throttleActivityLog = async (callback, minutes) => {
    const lastActivityLogged = store.state.lastActivityLogged
    const now = Math.floor(Date.now() / 1000)

    if (lastActivityLogged === undefined || now - lastActivityLogged > minutes * 60) {
        console.log('IS LOGGING')
        await callback()
        store.commit('SET_LAST_LOGGED_ACTIVITY', Math.floor(Date.now() / 1000))
    } else {
        console.log('IS NOT LOGGING')
    }
}

export default router
