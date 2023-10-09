<script setup>
  import useProducts from './../../../api/ProductAPI.js'
  import {API_URL} from './../../../config/index.js'

  const { deleteProduct } = useProducts()

</script>

<template>
    <!-- Product Card -->
    <div class="product-card" v-if="category === 0 || product.category_id === category">
        <router-link :to="'product-details/' + product.id">
            <img :src="API_URL + 'storage/' + product.image" />
        </router-link>
        <!-- Product Info -->
        <div class="product-info">
            <h4>{{ product.name }}</h4>
            <section>
                <div>
                    <span>Price</span>
                    <h3>${{ product.price }}</h3>
                </div>
                <button @click.prevent="deleteProduct(product.id)">
                    <span class="material-symbols-outlined">delete</span>
                </button>
            </section>
        </div>
    </div>
</template>

<script>
export default {
  props: {
    product: Object, 
    category: [Number, String]
  },
};
</script>
