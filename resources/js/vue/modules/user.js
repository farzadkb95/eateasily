import { useUserStore } from "@/store/UserStore";
import axios from "axios";

async function setUser(user) {
    const userStore = useUserStore();

    await userStore.$patch({
        name: user.full_name,
        firstName: user.first_name,
        lastName: user.last_name,
        phone: user.phone,
        email: user.email,
        isAdmin: user.is_admin,
        login: true,
    });
    console.log('bbb set', user);
}

function getUser() {
    const userStore = useUserStore();

    return userStore;
}

async function initial() {
    try {
        const response = await axios.get("/api/initial-data");
        console.log('bbb req', response);
        if (response.data.user) {
            await setUser(response.data.user);
        }
    } catch (error) {
        console.error(error);
    }
}

function logOut() {
    localStorage.removeItem("token");
    const userStore = useUserStore();
    userStore.$patch({
        name: null,
        firstName: null,
        lastName: null,
        phone: null,
        email: null,
        isAdmin: false,
        login: false,
    });
    axios.defaults.headers["Authorization"] = null;
    initial();
}

export default {
    setUser,
    logOut,
    getUser,
    initial,
};
