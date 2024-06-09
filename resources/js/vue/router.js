const routes = [
    {
        path: "/",
        component: () => import("./pages/Home.vue"),
        name: "home",
        meta: {},
    },
    {
        path: "/weight-less/select-gender",
        component: () => import("./pages/weight_less/SelectGender.vue"),
        name: "weight-less|select-gender",
        meta: {},
    },
    {
        path: "/weight-less/select-age",
        component: () => import("./pages/weight_less/SelectAge.vue"),
        name: "weight-less|select-age",
        meta: {},
    },
    {
        path: "/weight-less/select-height",
        component: () => import("./pages/weight_less/SelectHeight.vue"),
        name: "weight-less|select-height",
        meta: {},
    },
    {
        path: "/weight-less/select-weight",
        component: () => import("./pages/weight_less/SelectWeight.vue"),
        name: "weight-less|select-weight",
        meta: {},
    },
    {
        path: "/weight-less/select-sickness",
        component: () => import("./pages/weight_less/SelectSickness.vue"),
        name: "weight-less|select-sickness",
        meta: {},
    },
    {
        path: "/weight-less/show-chart",
        component: () => import("./pages/weight_less/ShowChart.vue"),
        name: "weight-less|show-chart",
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
