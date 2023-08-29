require('./bootstrap');

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();


import { createApp } from 'vue';
// import VueChatScroll from 'vue-chat-scroll';
// Vue.use(VueChatScroll);

let app=createApp({})
app.component('chat-view', require('./components/ChatView.vue').default);
app.mount("#app")