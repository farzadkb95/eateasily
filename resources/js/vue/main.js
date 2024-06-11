import { createApp } from 'vue'
import './style.scss'
import App from './App.vue'
import { createRouter } from "./router";
import axios from 'axios';

const app = createApp(App);
const router = createRouter();

/* -------------------------------------------------------------------------- */
/*                                    axios                                   */
/* -------------------------------------------------------------------------- */
axios.defaults.headers["Accept"] = "application/json";
axios.defaults.headers["Content-Type"] = "application/json";
if (localStorage.getItem("gid")) {
    axios.defaults.headers["gid"] = localStorage.getItem("gid");
}
if (localStorage.getItem("token")) {
    axios.defaults.headers["Authorization"] =
        "Bearer " + localStorage.getItem("token");
}
axios.defaults.baseURL = import.meta.env.APP_URL;
axios.defaults.withCredentials = true;

app.use(router);
app.mount("#app");
