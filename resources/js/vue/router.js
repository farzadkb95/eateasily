const routes = [
    {
        path: "/",
        component: () => import("./pages/Home.vue"),
        name: "home",
        meta: {},
    },
    {
        path: "/weight-less/start",
        component: () => import("./pages/weight_less/_Start.vue"),
        name: "weight-less|start",
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
    {
        path: "/weight-less/show-change-weight",
        component: () => import("./pages/weight_less/ShowChangeWeight.vue"),
        name: "weight-less|show-change-weight",
        meta: {},
    },
    {
        path: "/weight-less/insert-phone",
        component: () => import("./pages/weight_less/InsertPhone.vue"),
        name: "weight-less|insert-phone",
        meta: {},
    },
    {
        path: "/weight-less/select-weight-type",
        component: () => import("./pages/weight_less/SelectWeightType.vue"),
        name: "weight-less|select-weight-type",
        meta: {},
    },
    {
        path: "/weight-less/show-weight-typee",
        component: () => import("./pages/weight_less/ShowWeightType.vue"),
        name: "weight-less|show-weight-type",
        meta: {},
    },
    {
        path: "/weight-less/relish-condition",
        component: () => import("./pages/weight_less/RelishCondition.vue"),
        name: "weight-less|relish-condition",
        meta: {},
    },
    {
        path: "/weight-less/walking-condition",
        component: () => import("./pages/weight_less/WalkingCondition.vue"),
        name: "weight-less|walking-condition",
        meta: {},
    },
    {
        path: "/weight-less/sleep-question",
        component: () => import("./pages/weight_less/SleepQuestion.vue"),
        name: "weight-less|sleep-question",
        meta: {},
    },
    {
        path: "/weight-less/weight-less-target",
        component: () => import("./pages/weight_less/WeightLessTarget.vue"),
        name: "weight-less|weight-less-target",
        meta: {},
    },
    {
        path: "/weight-less/best-way-weight-less",
        component: () => import("./pages/weight_less/BestWayWeightLess.vue"),
        name: "weight-less|best-way-weight-less",
        meta: {},
    },
    {
        path: "/weight-less/fat-sadly",
        component: () => import("./pages/weight_less/FatSadly.vue"),
        name: "weight-less|fat-sadly",
        meta: {},
    },
    {
        path: "/weight-less/weight-less-barrier",
        component: () => import("./pages/weight_less/WeightLessBarrier.vue"),
        name: "weight-less|weight-less-barrier",
        meta: {},
    },
    {
        path: "/weight-less/meal-volume",
        component: () => import("./pages/weight_less/MealVolume.vue"),
        name: "weight-less|meal-volume",
        meta: {},
    },
    {
        path: "/weight-less/cant-stop-eat",
        component: () => import("./pages/weight_less/CantStopEat.vue"),
        name: "weight-less|cant-stop-eat",
        meta: {},
    },
    {
        path: "/weight-less/weight-less-experience",
        component: () => import("./pages/weight_less/WeightLessExperience.vue"),
        name: "weight-less|weight-less-experience",
        meta: {},
    },
    {
        path: "/weight-less/prison",
        component: () => import("./pages/weight_less/Prison.vue"),
        name: "weight-less|prison",
        meta: {},
    },
    {
        path: "/weight-less/your-description",
        component: () => import("./pages/weight_less/YourDescription.vue"),
        name: "weight-less|your-description",
        meta: {},
    },
    {
        path: "/weight-less/agree-question-one",
        component: () => import("./pages/weight_less/AgreeQuestionOne.vue"),
        name: "weight-less|agree-question-one",
        meta: {},
    },
    {
        path: "/weight-less/select-lunch",
        component: () => import("./pages/weight_less/SelectLunch.vue"),
        name: "weight-less|select-lunch",
        meta: {},
    },
    {
        path: "/weight-less/cant-loose-food",
        component: () => import("./pages/weight_less/CantLooseFood.vue"),
        name: "weight-less|cant-loose-food",
        meta: {},
    },
    {
        path: "/weight-less/eat-everything",
        component: () => import("./pages/weight_less/EatEverything.vue"),
        name: "weight-less|eat-everything",
        meta: {},
    },
    {
        path: "/weight-less/smooth-muscle",
        component: () => import("./pages/weight_less/SmoothMuscle.vue"),
        name: "weight-less|smooth-muscle",
        meta: {},
    },
    {
        path: "/weight-less/fingers-form",
        component: () => import("./pages/weight_less/FingersForm.vue"),
        name: "weight-less|fingers-form",
        meta: {},
    },
    {
        path: "/weight-less/pulse-status",
        component: () => import("./pages/weight_less/PulseStatus.vue"),
        name: "weight-less|pulse-status",
        meta: {},
    },
    {
        path: "/weight-less/your-description-two",
        component: () => import("./pages/weight_less/YourDescriptionTwo.vue"),
        name: "weight-less|your-description-two",
        meta: {},
    },
    {
        path: "/weight-less/wrist-size",
        component: () => import("./pages/weight_less/WristSize.vue"),
        name: "weight-less|wrist-size",
        meta: {},
    },
    {
        path: "/weight-less/select-party-food",
        component: () => import("./pages/weight_less/SelectPartyFood.vue"),
        name: "weight-less|select-party-food",
        meta: {},
    },
    {
        path: "/weight-less/social-relationship",
        component: () => import("./pages/weight_less/SocialRelationship.vue"),
        name: "weight-less|social-relationship",
        meta: {},
    },
    {
        path: "/weight-less/community-influence",
        component: () => import("./pages/weight_less/CommunityInfluence.vue"),
        name: "weight-less|community-influence",
        meta: {},
    },

    {
        path: "/weight-less/analyze",
        component: () => import("./pages/weight_less/Analyze.vue"),
        name: "weight-less|analyze",
        meta: {},
    },
    {
        path: "/weight-less/buy",
        component: () => import("./pages/weight_less/Buy.vue"),
        name: "weight-less|buy",
        meta: {},
    },
    {
        path: "/weight-less/buy-bulimia-nervosa",
        component: () => import("./pages/weight_less/BuyBulimiaNervosa.vue"),
        name: "weight-less|buy-bulimia-nervosa",
        meta: {},
    },
    {
        path: "/weight-less/pay-verify",
        component: () => import("./pages/weight_less/PayVerify.vue"),
        name: "weight-less|pay-verify",
        meta: {},
    },
    {
        path: "/login",
        component: () => import("./pages/Login.vue"),
        name: "login",
        meta: {},
    },
    {
        path: "/panel",
        component: () => import("./pages/admin/Panel.vue"),
        name: "panel",
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
