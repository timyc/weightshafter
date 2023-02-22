<script setup lang="ts">
import { ref } from 'vue';

const drawer = ref(false);
</script>


<template>
    <div class="navbar-container w-100 p-fixed p-zero">
        <nav class="navbar-container p-relative">
            <div class="size-ruler align-center m-auto f-clear p-relative dp-flex">
                <div class="logo-part dp-block align-center t-no-wrap" @click="drawer = true">
                    <div class="expand bg-center bg-cover dp-i-block v-middle"></div>
                </div>
                <div class="opt-part dp-flex align-center">
                    <RouterLink to="/" class="search-btn t-center pointer">
                        <div class="search-icon dp-i-block bg-cover bg-center bg-no-repeat v-middle"></div>
                    </RouterLink>
                </div>
            </div>
        </nav>
    </div>
    <el-drawer v-model="drawer" title="Menu" :with-header="false" direction="ltr" size="50%">
        <el-menu>
            <el-menu-item index="1">Some Long Option Name</el-menu-item>
            <el-menu-item index="100">Logout</el-menu-item>
        </el-menu>
    </el-drawer>
</template>

<style scoped>
.navbar-container {
    width: 100%;
    height: 3.75rem;
    min-width: 24rem;
    background-color: #fff;
    font-size: 1.25rem;
    line-height: 3.75rem;
}

.navbar-container .size-ruler {
    padding: 0 1.33333rem;
    justify-content: space-between;
}

.navbar-container .logo-part {
    color: #272727;
}

.navbar-container .logo-part .expand {
    width: 2.16667rem;
    height: 2.16667rem;
    margin-right: .66667rem;
    border-radius: 4px;
    background-image: url(data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pg0KPCEtLSBVcGxvYWRlZCB0bzogU1ZHIFJlcG8sIHd3dy5zdmdyZXBvLmNvbSwgR2VuZXJhdG9yOiBTVkcgUmVwbyBNaXhlciBUb29scyAtLT4NCjwhRE9DVFlQRSBzdmcgUFVCTElDICItLy9XM0MvL0RURCBTVkcgMS4xLy9FTiIgImh0dHA6Ly93d3cudzMub3JnL0dyYXBoaWNzL1NWRy8xLjEvRFREL3N2ZzExLmR0ZCI+DQo8c3ZnIGZpbGw9IiMwMDAwMDAiIHZlcnNpb249IjEuMSIgaWQ9IkNhcGFfMSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgDQoJIHdpZHRoPSI4MDBweCIgaGVpZ2h0PSI4MDBweCIgdmlld0JveD0iMCAwIDEyNCAxMjQiIHhtbDpzcGFjZT0icHJlc2VydmUiPg0KPGc+DQoJPHBhdGggZD0iTTExMiw2SDEyQzUuNCw2LDAsMTEuNCwwLDE4czUuNCwxMiwxMiwxMmgxMDBjNi42LDAsMTItNS40LDEyLTEyUzExOC42LDYsMTEyLDZ6Ii8+DQoJPHBhdGggZD0iTTExMiw1MEgxMkM1LjQsNTAsMCw1NS40LDAsNjJjMCw2LjYsNS40LDEyLDEyLDEyaDEwMGM2LjYsMCwxMi01LjQsMTItMTJDMTI0LDU1LjQsMTE4LjYsNTAsMTEyLDUweiIvPg0KCTxwYXRoIGQ9Ik0xMTIsOTRIMTJjLTYuNiwwLTEyLDUuNC0xMiwxMnM1LjQsMTIsMTIsMTJoMTAwYzYuNiwwLDEyLTUuNCwxMi0xMlMxMTguNiw5NCwxMTIsOTR6Ii8+DQo8L2c+DQo8L3N2Zz4=);
}

.navbar-container .opt-part {
    flex: 1;
    justify-content: flex-end;
}

.navbar-container .opt-part .search-btn {
    margin-right: 1.33333rem;
}

.navbar-container .opt-part .search-btn .search-icon {
    width: 1.66667rem;
    height: 1.66667rem;
    background-image: url(data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4KPHN2ZyB2aWV3Qm94PSIxNDMuNTgyIDEzNS41ODQgMTguNDExIDE5LjIxMiIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KICA8cGF0aCBkPSJNIDE1OS45MjUgMTUwLjA3NiBMIDE1Ni4xMzUgMTQ2Ljg1MyBDIDE1NS43NDMgMTQ2LjUgMTU1LjMyNCAxNDYuMzM5IDE1NC45ODYgMTQ2LjM1NCBDIDE1NS44ODEgMTQ1LjMwNiAxNTYuNDIxIDE0My45NDcgMTU2LjQyMSAxNDIuNDYxIEMgMTU2LjQyMSAxMzkuMTQ3IDE1My43MzUgMTM2LjQ2MSAxNTAuNDIxIDEzNi40NjEgQyAxNDcuMTA3IDEzNi40NjEgMTQ0LjQyMSAxMzkuMTQ3IDE0NC40MjEgMTQyLjQ2MSBDIDE0NC40MjEgMTQ1Ljc3NSAxNDcuMTA3IDE0OC40NjEgMTUwLjQyMSAxNDguNDYxIEMgMTUxLjkwNyAxNDguNDYxIDE1My4yNjYgMTQ3LjkyMSAxNTQuMzE0IDE0Ny4wMjYgQyAxNTQuMjk4IDE0Ny4zNjQgMTU0LjQ2IDE0Ny43ODMgMTU0LjgxMyAxNDguMTc1IEwgMTU4LjAzNiAxNTEuOTY1IEMgMTU4LjU4OCAxNTIuNTc4IDE1OS40ODkgMTUyLjYzIDE2MC4wMzkgMTUyLjA4IEMgMTYwLjU4OSAxNTEuNTMgMTYwLjUzNyAxNTAuNjI4IDE1OS45MjQgMTUwLjA3NyBMIDE1OS45MjUgMTUwLjA3NiBaIE0gMTUwLjQyMSAxNDYuNDYgQyAxNDguMjEyIDE0Ni40NiAxNDYuNDIxIDE0NC42NjkgMTQ2LjQyMSAxNDIuNDYgQyAxNDYuNDIxIDE0MC4yNTEgMTQ4LjIxMiAxMzguNDYgMTUwLjQyMSAxMzguNDYgQyAxNTIuNjMgMTM4LjQ2IDE1NC40MjEgMTQwLjI1MSAxNTQuNDIxIDE0Mi40NiBDIDE1NC40MjEgMTQ0LjY2OSAxNTIuNjMgMTQ2LjQ2IDE1MC40MjEgMTQ2LjQ2IFoiIHN0eWxlPSJmaWxsOiByZ2IoMCwgMCwgMCk7Ii8+Cjwvc3ZnPg==);
}

.navbar-container:after {
    content: " ";
    position: absolute;
    left: 0;
    bottom: 0;
    width: 100%;
    height: .08333rem;
    background-color: #c1c1c1;
    transform: scaleY(.5);
}
</style>