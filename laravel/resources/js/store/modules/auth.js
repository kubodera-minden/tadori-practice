const state = {
    token: '',
    currentUser: ''
};

const mutations = {
    login (state, payload) {
        state.token = payload;
    },
    logout (state) {
        state.token = null;
    },
    currentUserSearch (state, payload) {
        state.currentUser = payload;
    }
};

const getters = {
    isLogin (state) {
        return state.token ? true : false;
    },
};

const actions = {
    async login ({ commit }, payload) {
        return await axios.post('/api/auth/login', {
            email: payload.email,
            password: payload.password
        }).then(res => {
            const token = res.data.access_token;
            axios.defaults.headers.common['Authorization'] = 'Bearer ' + token;
            commit('login', token);
            return true;
        }).catch(error => {
            return error.response;
        });
    },
    async logout ({ commit }) {
        return await axios.post('/api/auth/logout').then(res => {
            axios.defaults.headers.common['Authorization'] = '';
            commit('logout');
            return true;
        }).catch(error => {
            return error.response;
        });
    },
    async currentUserSearch({ commit }) {
        return await axios.post('/api/auth/me').then(res => {
            const user = res.data;
            commit('currentUserSearch', user);
            return true;
        }).catch(error => {
            return error.response;
        });
    }
};

export default {
    namespaced: true,
    state,
    mutations,
    getters,
    actions
};