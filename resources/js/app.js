require('./bootstrap');

// Import modules...
import { createApp, h } from 'vue';
import { App as InertiaApp, plugin as InertiaPlugin } from '@inertiajs/inertia-vue3';
import { InertiaProgress } from '@inertiajs/progress';
import PrimeVue from 'primevue/config';
import "primeflex/primeflex.css";
import 'primevue/resources/themes/saga-blue/theme.css';       
import 'primevue/resources/primevue.min.css';                 
import 'primeicons/primeicons.css';    

import InputText from "primevue/inputtext";
import Button from "primevue/button";
import Checkbox from "primevue/checkbox";
import RadioButton from "primevue/radiobutton";
import Textarea from "primevue/textarea";
import Dropdown from "primevue/dropdown";
import MultiSelect from 'primevue/multiselect';
import ToastService from 'primevue/toastservice';
import Toast from 'primevue/toast';
import Card from 'primevue/card';
import Rating from 'primevue/rating';
import SelectButton from 'primevue/selectbutton';

import CascadeSelect from 'primevue/cascadeselect';

const el = document.getElementById('app');

import ElementPlus from 'element-plus';
import 'element-plus/lib/theme-chalk/index.css';




createApp({
    render: () =>
        h(InertiaApp, {
            initialPage: JSON.parse(el.dataset.page),
            resolveComponent: (name) => require(`./Pages/${name}`).default,
        }),
})
    .mixin({ methods: { route } })
    .use(InertiaPlugin)
    .use(ElementPlus)
    .use(PrimeVue, {
        ripple: true
    })
    .use(ToastService)
    .use(Toast)
    .component("InputText", InputText)
    .component("Button", Button)
    .component("Checkbox", Checkbox)
    .component("RadioButton", RadioButton)
    .component("Textarea", Textarea)
    .component("Dropdown", Dropdown)
    .component("MultiSelect", MultiSelect)
    .component("Toast", Toast)
    .component("Card", Card)
    .component("Rating", Rating)
    .component("SelectButton", SelectButton)
    .component("CascadeSelect", CascadeSelect)

    .mount(el);

InertiaProgress.init({ color: '#4B5563' });
