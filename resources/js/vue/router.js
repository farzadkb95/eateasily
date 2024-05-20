const routes = [
    {
        path: "/",
        component: () => import("./pages/Home.vue"),
        name: "home",
        meta: {},
    },
    {
        path: "/1",
        component: () => import("./pages/temps/P1.vue"),
        meta: {},
    },
    {
        path: "/2",
        component: () => import("./pages/temps/P2.vue"),
        meta: {},
    },
    {
        path: "/6",
        component: () => import("./pages/temps/P6.vue"),
        meta: {},
    },
];

import {
    // createMemoryHistory,
    createRouter as _createRouter,
    createWebHistory,
} from "vue-router";

// https://github.com/ljharb/qs
import qs from "qs";

export function createRouter() {
    const router = _createRouter({
        history: createWebHistory(),
        routes,
        parseQuery(query) {
            return qs.parse(query);
        },
        stringifyQuery(query) {
            var result = qs.stringify(query);

            return result ? result : "";
        },
    });

    return router;
}
