<script setup lang="ts">
import Navbar from '@/components/Navbar.vue';
import Tabbar from '@/components/Tabbar.vue';
import Slider from '@/components/home/Slider.vue';
import DailyHealth from '@/components/home/DailyHealth.vue';
</script>

<template>
    <div class="app-container with-navbar">
        <div class="home-container">
            <Navbar />
            <Slider />
            <DailyHealth />
            <Tabbar />
        </div>
    </div>
</template>

<style scoped>
.home-container {
    padding: 0 10px;
}
</style>