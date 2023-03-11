<script setup lang="ts">
import { ref } from 'vue';
import axios from 'axios';
interface Person {
    id: number;
    name: string;
    avatar: string;
    gender: string;
    bmi: number;
}
const people = ref([] as Person[]);
const emit = defineEmits(['goChatting']);

axios.get('/user/similar').then(res => {
    people.value = res.data;
});
</script>

<template>
    <h1 style="text-align:center">People Like You</h1>
    <el-card class="person-card" v-for="person of people" :key="person.id" @click="emit('goChatting', person.id)">
        <div class="user-info">
            <el-row :gutter="10">
                <el-col :span="8">
                    <el-avatar :size="100" class="user-avatar" :src="person.avatar" />
                </el-col>
                <el-col :span="16">
                    <div class="user-name">
                        <h3>{{ person.name }}</h3>
                        <p>{{ person.gender }}</p>
                    </div>
                </el-col>
            </el-row>

        </div>
    </el-card>
</template>

<style scoped>
.person-card:not(:last-child) {
    margin-bottom: 10px;
}
</style>