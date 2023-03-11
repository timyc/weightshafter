<script setup lang="ts">
import { ref } from 'vue';
import { ElLoading, ElMessage } from 'element-plus';
import axios from 'axios';
import { useRouter } from 'vue-router'
import { useUserStore } from '@/stores/user';
const router = useRouter()
const userStore = useUserStore();
const emit = defineEmits(['swap']);
const name = ref('');
const email = ref('');
const password = ref('');
const password_confirm = ref('');
const register = async () => {
    let data = {
        name: name.value,
        email: email.value,
        password: password.value,
        password_confirmation: password_confirm.value
    };
    axios.post('/register', data)
        .then().catch(errorResponse => {
            ElMessage.error(errorResponse.response.data.message);
        }).finally(() => {
            axios.get('/user/info')
                .then(response => {
                    if (response.data > 0) {
                        window["userID"] = response.data.id;
                        userStore.info = response.data;
                        userStore.loggedIn = true;
                        setTimeout(() => {
                            userStore.initEcho();
                            router.push('/');
                        }, 1000);
                    }
                });
        });
};
</script>

<template>
    <el-form class="registerForm a-move-in-top" label-width="120px" label-position="top" @submit.prevent="register">
        <el-row>
            <el-col :span="24">
                <h1 class="t-center">Register</h1>
            </el-col>
            <el-col :span="24">
                <el-form-item label="Your Name">
                    <el-input v-model="name" />
                </el-form-item>
            </el-col>
            <el-col :span="24">
                <el-form-item label="Email">
                    <el-input v-model="email" />
                </el-form-item>
            </el-col>
            <el-col :span="24">
                <el-form-item label="Password">
                    <el-input v-model="password" type="password" />
                </el-form-item>
            </el-col>
            <el-col :span="24">
                <el-form-item label="Confirm Password">
                    <el-input v-model="password_confirm" type="password" />
                </el-form-item>
            </el-col>
            <el-col :span="24">
                <el-form-item>
                    <el-input type="submit" style="display:none"></el-input>
                    <el-button type="primary" style="margin:auto;width:100%" @click="register">Register</el-button>
                </el-form-item>
            </el-col>
            <el-col :span="24">
                <el-divider>
                    Or
                </el-divider>
            </el-col>
            <el-col :span="24">
                <el-button type="default" style="margin:auto;width:100%" @click="$emit('swap')">Login</el-button>
            </el-col>
        </el-row>
    </el-form>
</template>

<style scoped>
.registerForm {
    padding: 20px;
    border-radius: 1.5rem;
    border: 1px solid lightgray;
}
</style>