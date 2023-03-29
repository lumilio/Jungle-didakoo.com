import VueRouter from "vue-router";
import store from '../store' 
import BoardGame from "../components/BoardGame.vue";


// import Login from '../modules/login'
// import Register from '../modules/register'
// import Home from "../modules/home/1.vue";

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
    name: 'Home',
    component: BoardGame
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
  routes: routes
});

export default router