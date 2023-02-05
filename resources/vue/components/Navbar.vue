<script lang="ts">
import { defineComponent } from "vue";
export default defineComponent ({
    data() {
        return {
            app_name: import.meta.env.VITE_APP_NAME,
        }
    },
});
</script>


<template>
    <div class="navbar-container w-100 p-fixed p-zero">
        <nav class="navbar-container p-relative">
            <div class="size-ruler align-center m-auto f-clear p-relative dp-flex">
                <RouterLink to="/" class="logo-part dp-block align-center t-no-wrap">
                    <div class="logo-img bg-center bg-cover dp-i-block v-middle"></div>
                    <span class="app-title v-middle">{{ app_name }}</span>
                </RouterLink>
                <div class="opt-part dp-flex align-center">
                    <RouterLink to="/" class="search-btn t-center pointer">
                        <div class="search-icon dp-i-block bg-cover bg-center bg-no-repeat v-middle"></div>
                    </RouterLink>
                </div>
            </div>
        </nav>
    </div>
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

.navbar-container .logo-part .logo-img {
    width: 2.16667rem;
    height: 2.16667rem;
    margin-right: .66667rem;
    border-radius: 4px;
    background-image: url('/img/wsicon.png');
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