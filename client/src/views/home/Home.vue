<script setup>
  import ProductCard from './components/ProductCard.vue'
  import Intro from './components/Intro.vue'
  import useProducts from './../../api/ProductAPI.js'
  import useCategories from './../../api/CategoryAPI.js'
  import { onMounted, ref, computed, defineProps  } from 'vue'

  const { products, getProducts } = useProducts()
  const { categories, getCategories } = useCategories()

  // ****** Get Data *******
  onMounted(() => {
    getProducts()
    getCategories()
  } )

  // ****** Switch Category ******
  const selectedCategoryId = ref(0); // All = 0
  const swithCategory = (id) => {
    selectedCategoryId.value = id
  }

  // ****** Sort Products ******
  const filterType = ref("date"); // Products

  const sortedProducts = computed(() => {
    switch (filterType.value) {
      case "low-price":
        return products.value.slice().sort((a, b) => a.price - b.price);
      case "high-price":
        return products.value.slice().sort((a, b) => b.price - a.price);
      case "date":
      default:
        return products.value.slice();
    }

  });



</script>

<template>
    <!-- Home Page - Show All Products -->
    <div class="all-products">
        <!-- Intro -->
        <Intro />
        <!-- Header -->
        <div class="header-product">
            <h2>All Products</h2>
            <!-- Filter Bar -->
            <div class="filter-bar">
                <select v-model="filterType">
                    <option value="date">Sort by : Date</option>
                    <option value="low-price">Sort by : Low Price</option>
                    <option value="high-price">Sort by : High Price</option>
                </select>
                <span class="material-symbols-outlined">sort</span>
            </div>
        </div>
        <!-- Categories -->
        <div class="categories">
            <button :class="{ 'category-selected': selectedCategoryId === 0 }" @click="swithCategory(0)">
                all
            </button>
            <button 
                v-for="category in categories" :key="category.id" @click="swithCategory(category.id)"
                :class="{ 'category-selected': selectedCategoryId === category.id }">
                {{ category.name }}
            </button>
        </div>
        <!-- Prodcuts -->
        <div class="products">
            <ProductCard 
                v-for="product in sortedProducts" :key="product.id" :product="product"
                :category="selectedCategoryId" 
            />
        </div>
    </div>
</template>

