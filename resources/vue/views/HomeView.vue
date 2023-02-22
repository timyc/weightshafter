<script setup lang="ts">
import { useRouter } from 'vue-router';
import { onMounted } from 'vue';
import Navbar from '@/components/Navbar.vue';
import Tabbar from '@/components/Tabbar.vue';
import Slider from '@/components/home/Slider.vue';
import DailyHealth from '@/components/home/DailyHealth.vue';
import { useUserStore } from '@/stores/user';
const userStore = useUserStore();
const router = useRouter();
onMounted(() => {
    if (!userStore.loggedIn) {
        router.push('/auth');
    }
});
</script>

<!-- whoever wrote this, put this in another component because views should not have logic
<script lang="ts">
export default{
  data() 
  {
    return {
      ht:0,
      wt:0,
    };
  },
}

function getBMI(ht, wt){
    var temp = ht / 100;
    return wt / (temp*temp);
}

function assessBMI(bmi){
    if (bmi < 18.5)
    {
        return "Underweight";
    }
    else if (bmi < 25)
    {
        return "Healthy";
    }
    else if (bmi < 30)
    {
        return "Overweight";
    }
    else
    {
        return "Obese";
    }
}
</script>-->

<template>
    <div class="app-container with-navbar">
        <div class="home-container">
            <Navbar />
            <Slider />
            <DailyHealth />
            <Tabbar />
        </div>
    </div>

    <!--<div>
        <p>Enter your height(cm): <input v-model="ht" /></p>
        <p>Enter your weight(kg): <input v-model="wt" /></p>
        <p>Your BMI is: {{getBMI(ht, wt)}}</p>
        <p>You are considered to be: {{assessBMI(getBMI(ht, wt))}}</p>
        <button @click="$router.push({ name: 'foods' });" >Get Food Recommendations</button>
    </div>-->

</template>

<style scoped>
.home-container {
    padding: 0 10px;
}
</style>