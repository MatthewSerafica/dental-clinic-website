import { createApp, h } from "vue";
import "flowbite";
import VCalendar from 'v-calendar';
import 'v-calendar/style.css';
import { createInertiaApp } from "@inertiajs/vue3";
import "../css/app.css";

createInertiaApp({
    resolve: async (name) => {
        const pages = import.meta.glob("./Pages/**/*.vue");

        const page = await pages[`./Pages/${name}.vue`]();

        return page;
    },
    setup({ el, App, props, plugin }) {
        createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(VCalendar, {})
            .mixin({ methods: { route } })
            .mount(el);
    },
});
