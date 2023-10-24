import { createRouter, createWebHistory } from "vue-router";
import App from "../vue/app.vue";
import editCourseForm from "../vue/editCourseForm.vue";

const routes = [
    // {
    //     path: "/",
    //     component: App,
    // },
    {
        path: "/edit/:id",
        name: "course.edit",
        component: editCourseForm,
        props: true,
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;
