import "./bootstrap";
import "../css/app.css";
import { createApp, h } from "vue";
import { createInertiaApp } from "@inertiajs/vue3";
import { resolvePageComponent } from "laravel-vite-plugin/inertia-helpers";
import { ZiggyVue } from "../../vendor/tightenco/ziggy/dist/vue.m";
import router from "./router/index";

// Import your Vue component
import App from "./vue/app.vue";

const appName = import.meta.env.VITE_APP_NAME || "Laravel";

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) =>
        resolvePageComponent(
            `./Pages/${name}.vue`,
            import.meta.glob("./Pages/**/*.vue")
        ),
    setup({ el, App: Page, props, plugin }) {
        // Create a new Vue app and mount your Vue component to the 'el' element
        const app = createApp({
            render: () => h(App, props),
        });

        // Use necessary Vue plugins
        app.use(router);
        app.use(plugin);
        app.use(ZiggyVue, Ziggy);
        app.mount(el);
    },
    progress: {
        color: "#4B5563",
    },
});
