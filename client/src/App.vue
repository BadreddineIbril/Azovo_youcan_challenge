<script setup>
  import { RouterLink, RouterView } from 'vue-router'
  import { ref } from 'vue'
  import NavBar from './layouts/NavBar.vue'
  import Footer from './layouts/Footer.vue'
  import AddProduct from './layouts/forms/AddProduct.vue'
  import AddCategory from './layouts/forms/AddCategory.vue'

  // ****** Add Product & Categoryt Btn *******
  const productControl = ref(false); 
  const categoryControl = ref(false);
  
  const openForm = (type) => {
    if(type == "product"){
      productControl.value = !productControl.value
    }else{
      categoryControl.value = !categoryControl.value
    }
  }

</script>

<template>
  <div class="main-app">
    <!-- Nav Bar -->
    <NavBar :formControl="openForm" />
    <!-- Content Page -->
    <RouterView />
    <!-- Product Form -->
    <AddProduct :formControl="openForm" :control="productControl" />
    <!-- Product Form -->
    <AddCategory :formControl="openForm" :control="categoryControl" />
    <!-- Footer -->
    <Footer />

  </div>

</template>