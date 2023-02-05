<script setup lang="ts">
import Navbar from '@/components/Navbar.vue';
import Tabbar from '@/components/Tabbar.vue';
import Slider from '@/components/home/Slider.vue';
</script>

<template>
    <div class="app-container with-navbar">
        <div class="home-container">
            <Navbar />
            <Slider />
            <Tabbar />
        </div>
    </div>
</template>