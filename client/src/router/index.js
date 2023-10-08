import { createRouter, createWebHistory } from 'vue-router'
import Home from '../views/home/Home.vue'
import ProductDetails from '../views/product-details/ProductDetails.vue'
import NotFound from '../views/errors/NotFound.vue'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'home',
      component: Home
    },
    {
      path: '/product-details/:id',
      name: 'product-details',
      component: ProductDetails,
      props: true
    },
    {
      path: '/not-found',
      name: 'not-found',
      component: NotFound,
    },
    {
      path: '/:catchAll(.*)',
      // name: 'not-found',
      component: NotFound,
    },
  ],
  scrollBehavior() {
    return { top: 0, left: 0 }
  }
})

export default router
