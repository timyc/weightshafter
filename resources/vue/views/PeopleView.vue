<script setup lang="ts">
import { ref } from 'vue';
import Navbar from '@/components/Navbar.vue';
import Tabbar from '@/components/Tabbar.vue';
import Listing from '@/components/people/Listing.vue';
import Chat from '@/components/people/Chat.vue';
const chatting = ref(false);
const chatee = ref(0);
</script>

<template>
    <div class="app-container with-navbar">
        <div class="people-container">
            <Navbar />
            <Listing @go-chatting="(n) => { chatting = true; chatee = n}" />
            <Chat v-if="chatting" :chatee="chatee" @go-listing="chatting = false" />
            <Tabbar />
        </div>
    </div>
</template>
  
<style scoped>
.people-container {
    padding: 0;
}
</style>