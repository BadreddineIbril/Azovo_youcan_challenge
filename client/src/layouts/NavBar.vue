<script setup>
</script>

<template>
    <nav>
        <!-- Logo -->
        <router-link to="/" class="logo">
            <span class="material-symbols-outlined">shopping_bag</span>
            <h3>Azovo</h3>
        </router-link>
        <!-- Links -->
        <div class="links">
          <button @click="formControl('category')">
              <p>Add Category</p>
              <span class="material-symbols-outlined">add</span>
          </button>
          <button @click="formControl('product')">
              <p>Add Product</p>
              <span class="material-symbols-outlined">add</span>
          </button>
        </div>
    </nav>
</template>

<script>
export default {
  props: {
    formControl: Function, 
  }
};
</script>
