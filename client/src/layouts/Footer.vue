<script setup>

    // --- Current year ---
    const currentYear = new Date().getFullYear();   
</script>

<template>
    <footer>
        <!-- Logo -->
        <router-link to="/" class="logo">
            <span class="material-symbols-outlined">shopping_bag</span>
            <h3>Azovo</h3>
        </router-link>
        <p>© {{ currentYear }} - all rights reserved copyright</p>
        <p>By <a href="https://badribril-vcard.netlify.app/" target="_blank">Badreddine Ibril</a></p>
    </footer>
</template>
