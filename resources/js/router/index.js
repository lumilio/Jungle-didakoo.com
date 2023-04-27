import VueRouter from "vue-router";
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

export default router
