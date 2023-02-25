<script setup lang="ts">
  import Navbar from '@/components/Navbar.vue';
  import Tabbar from '@/components/Tabbar.vue';
  import Sections from '@/components/setting/Sections.vue';

</script>

<template>
    <div class="app-container with-navbar">
        <div class="home-container">
            <Navbar />
            <Tabbar />
            <Sections />
        </div>
    </div>
  </template>