<script setup lang="ts">
  import Navbar from '@/components/Navbar.vue';
  import Tabbar from '@/components/Tabbar.vue';
  import FoodPlan from '@/components/food/FoodPlan.vue';
  import FoodRecommend from '@/components/food/FoodRecommend.vue';

</script>

<template>
    <div class="app-container with-navbar">
        <div class="home-container">
            <Navbar />
            <Tabbar />
            <!-- <FoodPlan /> -->
            <FoodRecommend />
        </div>
    </div>
  </template>