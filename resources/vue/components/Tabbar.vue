<script lang="ts">
import TabBarItem from './items/TabbarItem.vue';
import { defineComponent } from "vue";
export default defineComponent ({
    components: {
        TabBarItem,
    }
});
</script>

<template>
    <div class="tabbar-container w-100 p-fixed">
        <div class="tabbar dp-flex">
            <TabBarItem title="Home" icon="home" @click="$router.push({ name: 'home' });" />
            <TabBarItem title="People" icon="people" @click="$router.push({ name: 'people' });" />
            <TabBarItem title="Settings" icon="settings" @click="$router.push({ name: 'settings' });" />
        </div>
    </div>
</template>

<style scoped>
.tabbar {
    box-sizing: content-box;
    width: 100%;
    height: 4.16667rem;
    background: #fff;
    border-top: 1px solid #c8c8c8;
    padding-bottom: env(safe-area-inset-bottom);
}
</style>