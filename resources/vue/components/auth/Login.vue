<script setup lang="ts">
import { ref } from 'vue';
import { ElLoading, ElMessage } from 'element-plus';
const emit = defineEmits(['swap']);
const username = ref('');
const password = ref('');
const login = async () => {
    const loading = ElLoading.service({ fullscreen: true });
    try {
        const response = await fetch('/login', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({
                username: username.value,
                password: password.value,
            }),
        });
        if (response.ok) {
            const data = await response.json();
            localStorage.setItem('token', data.token);
            window.location.href = '/';
        } else {
            ElMessage.error('Invalid username or password');
        }
    } catch (error) {
        ElMessage.error('Something went wrong');
    } finally {
        loading.close();
    }
};
</script>

<template>
    <el-form class="loginForm" label-width="120px" label-position="top" @submit.prevent="login">
        <el-row>
            <el-col :span="24">
                <h1 class="t-center">Login</h1>
            </el-col>
            <el-col :span="24">
                <el-form-item label="Username">
                    <el-input v-model="username" />
                </el-form-item>
            </el-col>
            <el-col :span="24">
                <el-form-item label="Password">
                    <el-input v-model="password" type="password" />
                </el-form-item>
            </el-col>
            <el-col :span="24">
                <el-form-item>
                    <el-input type="submit" style="display:none"></el-input>
                    <el-button type="primary" style="margin:auto;width:100%" @click="login">Login</el-button>
                </el-form-item>
            </el-col>
            <el-col :span="24">
                <el-divider>
                    Or
                </el-divider>
            </el-col>
            <el-col :span="24">
                <el-button type="default" style="margin:auto;width:100%" @click="$emit('swap')">Register</el-button>
            </el-col>
        </el-row>
    </el-form>
</template>

<style scoped>
.loginForm {
    padding: 20px;
    border-radius: 1.5rem;
    border: 1px solid lightgray;
}
</style>