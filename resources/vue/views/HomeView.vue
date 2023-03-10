<script setup lang="ts">
import { useRouter } from 'vue-router';
import { onMounted } from 'vue';
import Navbar from '@/components/Navbar.vue';
import Tabbar from '@/components/Tabbar.vue';
import Slider from '@/components/home/Slider.vue';
import DailyHealth from '@/components/home/DailyHealth.vue';
import UserInput from '@/components/home/UserInput.vue';
import { useUserStore } from '@/stores/user';
const userStore = useUserStore();
const router = useRouter();
onMounted(() => {
    if (!userStore.loggedIn) {
        router.push('/auth');
    }
});
</script>


<template>
    <div class="app-container with-navbar">
        <div class="home-container">
            <Navbar />
            <Slider />
            <DailyHealth />
            <Tabbar />
            <UserInput />
        </div>
    </div>
</template>

<style scoped>
.home-container {
    padding: 0 10px;
}
</style>