<script setup lang="ts">
const props = defineProps({
  chatee: Number
});
const emit = defineEmits(['go-listing']);
</script>

<template>
    <div class="hover-chat">
        <!-- Navbar with return button -->
        <el-row :gutter="10">
            <el-col :span="4">
                <el-button @click="emit('go-listing')">
                    <el-icon><Back /></el-icon>
                </el-button>
            </el-col>
        </el-row>
        <!-- Chat Window -->
        <el-row :gutter="10">
            <el-col :span="4">
                <el-avatar :size="50" class="user-avatar" />
            </el-col>
            <el-col :span="20">
                <div class="message-content">
                    <p>Hi, I'm John</p>
                </div>
            </el-col>
        </el-row>
        <!-- Bottom bar with input box -->
        <el-row :gutter="10">
            <el-col :span="20">
                <el-input placeholder="Type your message here" />
            </el-col>
            <el-col :span="4">
                <el-button>Send</el-button>
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
</style>