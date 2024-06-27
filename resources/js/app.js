import './bootstrap';
import 'bootstrap/dist/css/bootstrap.css'


import { createApp, h } from 'vue'
import { createInertiaApp } from '@inertiajs/vue3'
import Layout from "@/Pages/Layout.vue";
import AppHead from "@/Pages/components/AppHead.vue";

createInertiaApp({
    resolve: name => {
        const pages = import.meta.glob('./Pages/**/*.vue', { eager: true })
        let page = pages[`./Pages/${name}.vue`]
        page.default.layout = page.default.layout || Layout
        return page
    },
    setup({ el, App, props, plugin }) {
        createApp({ render: () => h(App, props) })
            .use(plugin)
            .component('AppHead', AppHead)
            .mount(el)
    },
    title: title => `${title} - App`,
    progress: {
        // The delay after which the progress bar will appear, in milliseconds...
        delay: 250,

        // The color of the progress bar...
        color: 'green',

        // Whether to include the default NProgress styles...
        includeCSS: true,

        // Whether the NProgress spinner will be shown...
        showSpinner: true,
    },
})

// util quando o projeto esta muito grande e comeca a causar lentidao
// isso separa o build em variarios arquivos ao invez de colocar todos no mesmo arquivo
// resolve: name => {
//     const pages = import.meta.glob('./Pages/**/*.vue', { eager: false })
//     let page = pages[`./Pages/${name}.vue`]()
//
//     page.then(value => {
//         value.default.layout = value.default.layout || Layout
//     })
//
//     return page
// },
