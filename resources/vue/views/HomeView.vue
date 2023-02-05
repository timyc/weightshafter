<script setup lang="ts">
import Navbar from '@/components/Navbar.vue';
import Tabbar from '@/components/Tabbar.vue';
</script>

<template>
    <div class="app-container with-navbar">
        <div class="home-container">
            <Navbar />
            <Tabbar />
        </div>
    </div>
</template>