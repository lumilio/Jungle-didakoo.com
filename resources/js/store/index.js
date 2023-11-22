import Vue from "vue";
import Vuex from "vuex";
Vue.use(Vuex);

const store = new Vuex.Store({
  state: {
    user: null,
    address: null,
    playerNumber: localStorage.getItem('playerNumber') ?? null,
    turn: "white",
    turnNumber: 1,
    squares: [],
    movesHistory: [
      {
        black: {},
        white: {},
      },
    ],
    svg: null,
    errors: [],
      userData: {},
  },

  getters: {
    errors: state => state.errors
  },

  mutations: {
    CHANGE_TURN(state, val) {
      state.turn = val;
    },
    PUSH_MOVES_HISTORY(state, val) {
      state.movesHistory.push(val);
    },
    RESET_MOVES_HISTORY(state) {
      state.movesHistory = [
        {
          black: {},
          white: {},
        },
      ];
    },
    LOG_IN_USER(state, val) {
        state.user = val;
    },
    SET_USER_ADDRESS(state, val) {
        state.address = val;
    },
    SET_PLAYER_NUMBER(state, val) {
        localStorage.setItem('playerNumber', val);
        state.playerNumber = val
    },
    SET_USER_DATA(state, UsersData) {
        state.userData = UsersData;
    },
    LOG_OUT_USER (state){
        state.user = null;
        state.address = null;
    },
    ADD_MOVE_HISTORY(state, move) {
      let lastMove = state.movesHistory[state.movesHistory.length - 1];
      if (Object.keys(lastMove[move.color]).length) {
        lastMove = {
          black: {},
          white: {},
        };
        state.movesHistory.push(lastMove);
      }

      lastMove[move.color] = move;
    },
    setErrors(state, errors) {
      state.errors = errors;
    }
  },

  actions: {
    makemove({commit}, data){
      return axios
        .post("/api/makemove", data)
        .then(response => {
          console.log("response", response.data);
          // commit("setUserData", response.data.data.user);
          // localStorage.setItem("authToken", response.data.data.token);
        });
      },
    test({commint}, data)
    {
      return axios
        .post("/api/test", data)
        .then(response => {
          console.log("response", response.data);
          // commit("setUserData", response.data.data.user);
          // localStorage.setItem("authToken", response.data.data.token);
        });

    }
  },
})

export default store;
