window.Vue = require("vue");

import App from "./views/Userpage.vue";

const app = new Vue({
    el: "#root",
    render: (h) => h(App),
});
