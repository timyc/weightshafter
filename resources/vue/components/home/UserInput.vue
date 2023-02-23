<script setup lang="ts">
import { useRouter } from 'vue-router';
</script>


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

function getBMI(ht: number, wt: number){
    var temp = ht / 100;
    return wt / (temp*temp);
}

function assessBMI(bmi: number){
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

</script>

<template>
    <div class="user-input-container">
        <p>Enter your height(cm): <input v-model="ht" /></p>
        <p>Enter your weight(kg): <input v-model="wt" /></p>
        <p>Your BMI is: {{getBMI(ht, wt)}}</p>
        <p>You are considered to be: {{assessBMI(getBMI(ht, wt))}}</p>
        <button @click="$router.push({ name: 'foods' });" >Get Food Recommendations</button>
    </div>
</template>
