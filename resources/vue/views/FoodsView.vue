<script setup lang="ts">
  import Navbar from '@/components/Navbar.vue';
  import Tabbar from '@/components/Tabbar.vue';
  import FoodPlan from '@/components/food/FoodPlan.vue';

</script>

<template>
    <div class="app-container with-navbar">
        <div class="home-container">
            <Navbar />
            <Tabbar />
            <FoodPlan />
        </div>
    </div>
  </template>