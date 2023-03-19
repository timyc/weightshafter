<script setup lang="ts">
import { ref, onMounted, onUnmounted } from 'vue';
import axios from 'axios';
import { useUserStore } from '@/stores/user';
const props = defineProps({
    chatee: Number,
    avatar: String,
    name: String
});
const emit = defineEmits(['go-listing']);
const userStore = useUserStore();
const message = ref('');
const sendMessage = async () => {
    let data = {
        message: message.value,
        id: props.chatee
    };
    axios.post('/messages/send', data)
        .then(response => {
            message.value = '';
            scrollBottom();
            //userStore.messages.push(response.data);
        });
};
axios.post('/messages', { id: props.chatee })
    .then(response => {
        userStore.messages = response.data.messages;
        scrollBottom();
    });
onMounted(() => {
    (window.Echo as any).private('user.' + userStore.info.id).subscribed(() => {
        console.log(`uid: ${userStore.info.id}`);
    }).listenToAll((event: string, data: any) => {
        if (import.meta.env.VITE_APP_ENV === 'local') {
            console.log(event, data);
        }
        switch (event) {
            case 'SendMessage':
                userStore.messages.push(data.data);
                break;
        }
    });
});
onUnmounted(() => {
    window.Echo.leave(`user.${userStore.info.id}`);
});
function scrollBottom() {
    let chatWindow = document.querySelector('.chat-window');
    chatWindow!.scrollTop = chatWindow!.scrollHeight;
}
</script>

<template>
    <div class="hover-chat">
        <!-- Navbar with return button -->
        <el-row :gutter="10">
            <el-col :span="4">
                <el-button @click="userStore.messages = []; emit('go-listing')">
                    <el-icon>
                        <Back />
                    </el-icon>
                </el-button>
            </el-col>
        </el-row>
        <!-- Chat Window -->
        <div class="chat-window">
            <el-row v-for="m of userStore.messages" :key="m.id" class="chat-body">
                <template v-if="m.sender_id != userStore.info.id">
                    <el-col class="t-center" :span="4">
                        <el-avatar :size="50" class="user-avatar" :src="avatar" />
                    </el-col>
                    <el-col :span="20">
                        <div class="message message-in">
                            <p>{{ m.message }}</p>
                        </div>
                    </el-col>
                </template>
                <template v-else>
                    <el-col :span="20">
                        <div class="message message-out">
                            <p>{{ m.message }}</p>
                        </div>
                    </el-col>
                    <el-col class="t-center" :span="4">
                        <el-avatar :size="50" class="user-avatar" :src="userStore.info.avatar" />
                    </el-col>
                </template>
            </el-row>
        </div>
        <!-- Bottom bar with input box -->
        <el-row class="bottom-bar" :gutter="10">
            <el-col :span="20">
                <el-input placeholder="Type your message here" v-model="message" />
            </el-col>
            <el-col :span="4">
                <el-button @click="sendMessage">Send</el-button>
            </el-col>
        </el-row>
    </div>
</template>

<style scoped>
.hover-chat {
    position: fixed;
    top: 0;
    bottom: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: #fff;
    border-top: 1px solid #eee;
    z-index: 999;
}

.chat-window {
    margin-top: 10px;
    height: 90%;
    overflow: scroll;
}

.chat-body {
    left: 0;
    width: 100%;
    background-color: #fff;
    z-index: 999;
}

.bottom-bar {
    position: fixed;
    bottom: 0;
    left: 0;
    width: 100%;
    height: 50px;
    background-color: #fff;
    border-top: 1px solid #eee;
    z-index: 999;
}

.message {
    width: 45%;
    border-radius: 10px;
    padding: .5em;
    font-size: 1.2em;
}

.message-out {
    background: #407FFF;
    color: white;
    margin-left: 50%;
}

.message-in {
    background: #F1F0F0;
    color: black;
}
</style>