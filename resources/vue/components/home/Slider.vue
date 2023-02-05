<script setup lang="ts">
import { ref } from 'vue';
import axios from 'axios';
import { Swiper, SwiperSlide } from 'swiper/vue';
import { Pagination, Autoplay } from 'swiper';
import 'swiper/css';
import 'swiper/css/pagination';

interface Slide {
    id: number;
    image: string;
    href: string;
}

const modules = [Pagination, Autoplay];
const loading = ref(true);
const slides = ref([] as Slide[]);

axios.get('/home/slides').then((response) => {
    loading.value = false;
    slides.value = response.data;
});
</script>

<template>
    <div class="top-slider">
        <el-skeleton style="width: 100%" :loading="loading" animated>
            <template #template>
                <el-skeleton-item variant="image" style="max-width:100%; height: 240px" />
            </template>
            <template #default>
                <swiper class="swiper-container p-relative swiper-container-horizontal" :spaceBetween="30"
                    :pagination="true" :modules="modules" :loop="true"
                    :autoplay="{ delay: 2500, disableOnInteraction: false, }">
                    <swiper-slide class="swiper-wrapper banner-item p-relative ts-dot-4 border-box over-hidden" v-for="slide of slides" :index="slide.id">
                        <div class="banner-container bg-no-repeat bg-cover bg-center p-relative">
                            <a :href="slide.href">
                                <div class="banner-img w-100 h-100 p-absolute p-zero bg-cover bg-center"
                                    :style="`background-image: url(/img/banners/${slide.image});`"></div>
                            </a>
                        </div>
                    </swiper-slide>
                </swiper>
            </template>
        </el-skeleton>
    </div>
</template>

<style scoped>
.top-slider {
    padding: 1.33333rem 0;
    filter: drop-shadow(0 8px 8px rgba(0, 0, 0, .12));
}

.top-slider .swiper-container {
    z-index: 0;
}

.top-slider .swiper-wrapper {
    transition-timing-function: cubic-bezier(.22, .58, .12, .98) !important;
}

.top-slider .swiper-wrapper .banner-item .banner-container {
    padding-top: 50%;
    background-color: #0b0b0b;
    background-size: 30%;
    border-radius: .66667rem;
}

.top-slider .swiper-wrapper .banner-item .banner-img {
    border-radius: .66667rem;
}
</style>