<script setup lang="ts">
import { ref } from 'vue';
import Navbar from '@/components/Navbar.vue';
import Tabbar from '@/components/Tabbar.vue';
import Listing from '@/components/people/Listing.vue';
import Chat from '@/components/people/Chat.vue';
const chatting = ref(false);
const chatee = ref(0);
const avatar = ref('');
const name = ref('');
</script>

<template>
    <div class="app-container with-navbar">
        <div class="people-container">
            <Navbar />
            <Listing v-if="!chatting" @go-chatting="(x, y, z) => { chatting = true; chatee = x; avatar = y; name = z}" />
            <Chat v-if="chatting" :chatee="chatee" :avatar="avatar" :name="name" @go-listing="chatting = false" />
            <Tabbar />
        </div>
    </div>
</template>
  
<style scoped>
.people-container {
    padding: 0;
}
</style>