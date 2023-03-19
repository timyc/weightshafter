<script setup lang="ts">
import { ref } from 'vue';
import { useRouter, useRoute } from 'vue-router';
import Navbar from '@/components/Navbar.vue';
import Tabbar from '@/components/Tabbar.vue';
import Listing from '@/components/people/Listing.vue';
import Chat from '@/components/people/Chat.vue';
const route = useRoute();
const chatting = ref(route.query.chatee != null ? true : false);
const chatee = ref(parseInt(route.query.chatee as string) || 0);
const avatar = ref(route.query.avatar as string || '');
const name = ref(route.query.name as string || '');
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