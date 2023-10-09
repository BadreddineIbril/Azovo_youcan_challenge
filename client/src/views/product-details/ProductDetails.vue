<script setup>
  import useProducts from './../../api/ProductAPI.js'
  import { onMounted } from 'vue'
  import { useRouter } from "vue-router";
  import {API_URL} from './../../config/index.js'

  const { product, getProduct } = useProducts()

  const props = defineProps({
    id: {
        required: true,
        type: String
    }
  })
  const router = useRouter()

  onMounted(() => getProduct(props.id) )
  
</script>

<template>
    <!-- Product Details -->
    <div class="product-details">
        <!-- Path -->
        <ul class="path">
            <li><router-link to="/">All Products</router-link></li>
            <li><router-link :to="'/product-details/' + props.id">{{ product.category ? product.category.name : "" }}</router-link></li>
            <li><router-link :to="'/product-details/' + props.id">{{ product.category ? product.name : "" }}</router-link></li>
        </ul>
        <!-- Details -->
        <div class="details">
            <!-- Image -->
            <div class="image">
                <img :src="API_URL + 'storage/' + product.image" />
            </div>
            <!-- Info -->
            <div class="info">
                <h2>{{ product.name }}</h2>
                <h1>${{ product.price }}</h1>
                <h5>{{ product.description }}</h5>
                <button>
                    <span class="material-symbols-outlined">shopping_cart</span>
                    <p>Add to Cart</p>
                </button>
            </div>
        </div>
    </div>
</template>
