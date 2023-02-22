<script lang="ts">
import TabbarItem from './items/TabbarItem.vue';
import { defineComponent } from "vue";
export default defineComponent ({
    components: {
        TabbarItem,
    }
});
</script>

<template>
    <div class="tabbar-container w-100 p-fixed">
        <div class="tabbar dp-flex">
            <TabbarItem title="Home" icon="home" @click="$router.push({ name: 'home' });" />
            <TabbarItem title="People" icon="people" @click="$router.push({ name: 'people' });" />
            <TabbarItem title="Settings" icon="settings" @click="$router.push({ name: 'settings' });" />
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
    padding-bottom: 0;
}
</style>