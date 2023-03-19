import { createRouter, createWebHistory } from "vue-router";
import HomeView from "../views/HomeView.vue";

const router = createRouter({
  history: createWebHistory(),
  routes: [
    {
      path: "/",
      name: "home",
      component: HomeView,
    },
    {
      path: "/auth",
      name: "auth",
      component: () => import("../views/AuthView.vue"),
    },
    {
      path: "/search",
      name: "search",
      component: () => import("../views/SearchView.vue"),
    },
    {
      path: "/people",
      name: "people",
      component: () => import("../views/PeopleView.vue"),
    },
    {
      path: "/messages",
      name: "messages",
      component: () => import("../views/MessagesView.vue"),
    },
    {
      path: "/settings",
      name: "settings",
      component: () => import("../views/SettingsView.vue"),
    },
    {
      path: "/foods",
      name: "foods",
      component: () => import("../views/FoodsView.vue"),
    },
  ],
});

export default router;
