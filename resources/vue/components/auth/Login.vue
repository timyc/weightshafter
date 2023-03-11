<script setup lang="ts">
import { ref, onMounted } from 'vue';
import { ElLoading, ElMessage } from 'element-plus';
import { useRouter } from 'vue-router'
import { useUserStore } from '@/stores/user';
import axios from 'axios';
const router = useRouter();
const userStore = useUserStore();
const emit = defineEmits(['swap']);
const email = ref('');
const password = ref('');
const login = async () => {
    let data = {
        email: email.value,
        password: password.value
    };
    axios.post('/login', data)
        .then().catch(errorResponse => {
            ElMessage.error(errorResponse.response.data.message);
        }).finally(() => {
            axios.get('/user/info')
                .then(response => {
                    if (response.data) {
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
onMounted(() => {
    if (userStore.loggedIn) {
        router.push('/');
    }
});
</script>

<template>
    <el-form class="loginForm a-move-in-top" label-width="120px" label-position="top" @submit.prevent="login">
        <el-row>
            <el-col :span="24">
                <h1 class="t-center">Login</h1>
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