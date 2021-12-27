import { createApp } from "vue";
import { createRouter, createWebHistory } from "vue-router";
import App from "./App.vue";
import Register from './views/Register.vue'
import Products from './views/Products.vue'
import Edit from './views/Edit.vue'
import Product from './views/Product.vue'
import "./assets/css/index.css";

const router = createRouter({
  history: createWebHistory(),
  routes: [
    {path: '/new-product', name: 'Register', component: Register},
    {path: '/products', name: 'Products', component: Products},
    {path: '/edit/:id', name: 'Edit', component: Edit},
    {path: '/product/:id', name: 'Product', component: Product},
  ],
});

createApp(App).use(router).mount("#app");
