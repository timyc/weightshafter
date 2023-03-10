<script setup lang="ts">
import { ref } from 'vue';
import Login from '@/components/auth/Login.vue';
import Register from '@/components/auth/Register.vue';
const curAction = ref(true);
navigator.geolocation.getCurrentPosition(
    position => {
        console.log(position.coords.latitude);
        console.log(position.coords.longitude);
    },
    error => {
        console.log(error.message);
    },
);
</script>

<template>
    <div class="app-container">
        <div class="auth-container">
            <el-image class="a-move-in-bottom" src="/img/wsblack.png" />
            <Login v-if="curAction" @swap="curAction = false" />
            <Register v-else @swap="curAction = true" />
        </div>

    </div>
</template>

<style scoped>
.auth-container {
    padding: 20px;
    
}
</style>