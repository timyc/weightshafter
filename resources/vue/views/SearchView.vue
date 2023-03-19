<script setup lang="ts">
import { ref, onUpdated } from 'vue';
import { useRouter } from 'vue-router';
import axios from 'axios';
let delay = (() => {
    let timer = 0;
    return (callback: any, ms: any, that: any) => {
        clearTimeout(timer);
        timer = window.setTimeout(callback.bind(that), ms);
    };
})();
let router = useRouter();
let query = ref('');
let results = ref([] as any[]);
let canSearch = ref(true);

function search() {
    if (query.value.length >= 3 && canSearch.value) {
        searchReq();
    }
}

function searchReq() {
    axios.get('/user/search', {
        params: {
            name: query.value
        }
    }).then(response => {
        console.log(response.data);
        results.value = response.data;
        canSearch.value = false;
    });
}

onUpdated(() => {
    delay(() => {
        search();
        canSearch.value = true;
    }, 1000, null);
});
</script>

<template>
    <div class="app-layout m-auto">
        <div class="main-container">
            <div class="search-list">
                <el-card class="person-card" v-for="person of results" :key="person.id" @click="router.push(`/people?chatee=${person.id}&avatar=${person.avatar}&name=${person.name}`)">
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
            </div>
        </div>
        <div class="search-navbar w-100 p-fixed p-zero dp-flex align-center border-box">
            <div class="search-bar p-relative border-box bar">
                <div class="search-bar-bg w-100 p-absolute p-zero ts-dot-4" style="height: 32px;">
                    <div class="search-suggestion w-100 p-absolute border-box over-hidden"
                        :style="{ height: '150px', display: results.length == 0 ? 'none' : 'block' }">
                        <div class="data-list h-100 p-relative ps">
                            <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
                                <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
                            </div>
                            <div class="ps__rail-y" style="top: 0px; right: 0px;">
                                <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;">
                                </div>
                            </div>
                            <!-- <SearchSuggestionItem v-for="(item, index) in results" :key="index" :searchResult="item" /> -->
                        </div>
                    </div>
                </div>
                <form class="dp-block h-100 p-relative" @submit.prevent="() => { }">
                    <div class="p-relative h-100 dp-flex">
                        <button class="confirm-btn app-button v-middle pointer" type="submit">
                            <div class="search-icon bg-cover bg-center bg-no-repeat"></div>
                        </button>
                        <div class="search-input-wrapper dp-flex justify-center p-relative">
                            <div class="placeholder-list w-100 h-100 p-absolute p-zero border-box over-hidden">

                            </div>
                            <input class="search-input v-middle ts-dot-2 w-100" placeholder="Enter someone's name"
                                v-model="query">
                        </div>
                        <span class="clear-icon bg-cover bg-no-repeat" v-if="query.length > 0" @click="query = ''"></span>
                    </div>
                </form>
            </div>
            <span class="dp-i-block btn t-center" @click="$router.go(-1)">Cancel</span>
        </div>
    </div>
</template>

<style scoped>
.app-layout {
    width: 100%;
    padding-top: 50px;
}

.app-layout .search-navbar {
    z-index: 1000;
    padding: 10px;
    background-color: #f3f3f3;
}

.search-bar {
    height: 2.66667rem;
    margin: 0 .83333rem;
    line-height: 32px;
    flex-grow: 1;
}

.app-layout .search-navbar .bar {
    display: inline-block;
}

.search-bar .search-bar-bg {
    height: 32px;
    background-color: #dddddd;
    border-radius: 8px;
    margin-top: -16px;
    top: 50%;
}

.search-bar .search-bar-bg .search-suggestion {
    left: 0;
    top: 32px;
    padding: 0 10px;
}

.search-bar .confirm-btn .search-icon {
    width: 16px;
    height: 16px;
    background-image: url(data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4KPHN2ZyB2aWV3Qm94PSIxNDMuNTgyIDEzNS41ODQgMTguNDExIDE5LjIxMiIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KICA8cGF0aCBkPSJNIDE1OS45MjUgMTUwLjA3NiBMIDE1Ni4xMzUgMTQ2Ljg1MyBDIDE1NS43NDMgMTQ2LjUgMTU1LjMyNCAxNDYuMzM5IDE1NC45ODYgMTQ2LjM1NCBDIDE1NS44ODEgMTQ1LjMwNiAxNTYuNDIxIDE0My45NDcgMTU2LjQyMSAxNDIuNDYxIEMgMTU2LjQyMSAxMzkuMTQ3IDE1My43MzUgMTM2LjQ2MSAxNTAuNDIxIDEzNi40NjEgQyAxNDcuMTA3IDEzNi40NjEgMTQ0LjQyMSAxMzkuMTQ3IDE0NC40MjEgMTQyLjQ2MSBDIDE0NC40MjEgMTQ1Ljc3NSAxNDcuMTA3IDE0OC40NjEgMTUwLjQyMSAxNDguNDYxIEMgMTUxLjkwNyAxNDguNDYxIDE1My4yNjYgMTQ3LjkyMSAxNTQuMzE0IDE0Ny4wMjYgQyAxNTQuMjk4IDE0Ny4zNjQgMTU0LjQ2IDE0Ny43ODMgMTU0LjgxMyAxNDguMTc1IEwgMTU4LjAzNiAxNTEuOTY1IEMgMTU4LjU4OCAxNTIuNTc4IDE1OS40ODkgMTUyLjYzIDE2MC4wMzkgMTUyLjA4IEMgMTYwLjU4OSAxNTEuNTMgMTYwLjUzNyAxNTAuNjI4IDE1OS45MjQgMTUwLjA3NyBMIDE1OS45MjUgMTUwLjA3NiBaIE0gMTUwLjQyMSAxNDYuNDYgQyAxNDguMjEyIDE0Ni40NiAxNDYuNDIxIDE0NC42NjkgMTQ2LjQyMSAxNDIuNDYgQyAxNDYuNDIxIDE0MC4yNTEgMTQ4LjIxMiAxMzguNDYgMTUwLjQyMSAxMzguNDYgQyAxNTIuNjMgMTM4LjQ2IDE1NC40MjEgMTQwLjI1MSAxNTQuNDIxIDE0Mi40NiBDIDE1NC40MjEgMTQ0LjY2OSAxNTIuNjMgMTQ2LjQ2IDE1MC40MjEgMTQ2LjQ2IFoiIHN0eWxlPSJmaWxsOiByZ2IoMjU1LCAyNTUsIDI1NSk7Ii8+Cjwvc3ZnPg==);
}

.search-bar .search-input-wrapper {
    flex: 15;
}

.search-bar .placeholder-list {
    height: 32px;
    padding: 0 10px 0 2px;
    pointer-events: none;
}

.search-bar .search-input {
    margin: 0 8px 0 0;
    border: 0;
    font-size: 12px;
    background-color: transparent;
    font-family: inherit;
    outline: none;
    z-index: 1;
    caret-color: #32aaff;
    color: black;
}

.search-bar .confirm-btn {
    padding: 5px;
    background-color: transparent;
    border: 0;
}

.search-bar .clear-icon {
    width: 1.66667rem;
    height: 1.66667rem;
    background-image: url(data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjIiIGhlaWdodD0iMjIiIGZpbGw9Im5vbmUiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PGNpcmNsZSBjeD0iMTEiIGN5PSIxMSIgcj0iOC4yNSIgZmlsbD0iIzAwMCIgZmlsbC1vcGFjaXR5PSIuMyIvPjxwYXRoIGQ9Ik04Ljg5MyA3LjkyMWEuNjg4LjY4OCAwIDAwLS45NzIuOTcyTDEwLjAyOCAxMSA3LjkyIDEzLjEwN2EuNjg4LjY4OCAwIDAwLjk3Mi45NzJMMTEgMTEuOTcybDIuMTA3IDIuMTA3YS42ODcuNjg3IDAgMTAuOTcyLS45NzJMMTEuOTcyIDExbDIuMTA3LTIuMTA3YS42ODcuNjg3IDAgMTAtLjk3Mi0uOTcyTDExIDEwLjAyOCA4Ljg5MyA3LjkyeiIgZmlsbD0iI2ZmZiIvPjwvc3ZnPg==);
    margin: 6px 6px 0 0;
}
</style>