import { defineStore } from "pinia";
import { ref } from "vue";

export const useUserStore = defineStore("user", () => {
    const name = ref();
    const firstName = ref();
    const lastName = ref();
    const phone = ref();
    const email = ref();
    const isAdmin = ref(false);
    const login = ref(false);
    const openModal = ref(false);

    return {
        name,
        phone,
        email,
        isAdmin,
        login,
        firstName,
        lastName,
        openModal,
    };
});
