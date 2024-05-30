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
        path: "/3",
        component: () => import("./pages/temps/P3.vue"),
        meta: {},
    },
    {
        path: "/4",
        component: () => import("./pages/temps/P4.vue"),
        meta: {},
    },
    {
        path: "/5",
        component: () => import("./pages/temps/P5.vue"),
        meta: {},
    },
    {
        path: "/6",
        component: () => import("./pages/temps/P6.vue"),
        meta: {},
    },
    {
        path: "/7",
        component: () => import("./pages/temps/P7.vue"),
        meta: {},
    },
    {
        path: "/8",
        component: () => import("./pages/temps/P8.vue"),
        meta: {},
    },
    {
        path: "/9",
        component: () => import("./pages/temps/P9.vue"),
        meta: {},
    },
    {
        path: "/10",
        component: () => import("./pages/temps/P10.vue"),
        meta: {},
    },
    {
        path: "/11",
        component: () => import("./pages/temps/P11.vue"),
        meta: {},
    },
    {
        path: "/12",
        component: () => import("./pages/temps/P12.vue"),
        meta: {},
    },
    {
        path: "/13",
        component: () => import("./pages/temps/P13.vue"),
        meta: {},
    },
    {
        path: "/14",
        component: () => import("./pages/temps/P14.vue"),
        meta: {},
    },
    {
        path: "/15",
        component: () => import("./pages/temps/P15.vue"),
        meta: {},
    },
    {
        path: "/16",
        component: () => import("./pages/temps/P16.vue"),
        meta: {},
    },
    {
        path: "/17",
        component: () => import("./pages/temps/P17.vue"),
        meta: {},
    },
    {
        path: "/18",
        component: () => import("./pages/temps/P18.vue"),
        meta: {},
    },
    {
        path: "/19",
        component: () => import("./pages/temps/P19.vue"),
        meta: {},
    },
    {
        path: "/20",
        component: () => import("./pages/temps/P20.vue"),
        meta: {},
    },
    {
        path: "/21",
        component: () => import("./pages/temps/P21.vue"),
        meta: {},
    },
    {
        path: "/22",
        component: () => import("./pages/temps/P22.vue"),
        meta: {},
    },
    {
        path: "/23",
        component: () => import("./pages/temps/P23.vue"),
        meta: {},
    },
    {
        path: "/24",
        component: () => import("./pages/temps/P24.vue"),
        meta: {},
    },
    {
        path: "/25",
        component: () => import("./pages/temps/P25.vue"),
        meta: {},
    },
    {
        path: "/26",
        component: () => import("./pages/temps/P26.vue"),
        meta: {},
    },
    {
        path: "/27",
        component: () => import("./pages/temps/P27.vue"),
        meta: {},
    },
    {
        path: "/28",
        component: () => import("./pages/temps/P28.vue"),
        meta: {},
    },
    {
        path: "/30",
        component: () => import("./pages/temps/P30.vue"),
        meta: {},
    },
    {
        path: "/31",
        component: () => import("./pages/temps/P31.vue"),
        meta: {},
    },
    {
        path: "/32",
        component: () => import("./pages/temps/P32.vue"),
        meta: {},
    },
    {
        path: "/33",
        component: () => import("./pages/temps/P33.vue"),
        meta: {},
    },
    {
        path: "/34",
        component: () => import("./pages/temps/P34.vue"),
        meta: {},
    },
    {
        path: "/35",
        component: () => import("./pages/temps/P35.vue"),
        meta: {},
    },
    {
        path: "/36",
        component: () => import("./pages/temps/P36.vue"),
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
