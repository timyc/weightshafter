<script setup lang="ts">
import FoodPlan from '@/components/food/FoodPlan.vue';
import { getOffsetTopDistance } from 'element-plus/es/utils';
import { useRouter } from 'vue-router';
import axios from 'axios';
const router = useRouter();
function getFood(){
    router.push('/foods');
}
</script>


<script lang="ts">
export default{
    // setup(){
    
    // },
    // name: "UserInput",
    data() 
    {
        return {
        ht:0,
        wt:0,
        // BMI: 0,
        };
    },
    // components: {
    //     FoodPlan
    // }
};

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
function sentBMI(ht: number, wt: number){
  // var temp = axios.get('/user/info') 
  //, {params: {weight: '88', height: '97'}}
  let url: string = "/user/put/weightandheight/" + wt + "/" + ht/100;
  axios.put(url);
}

</script>

<template>
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">BMI Calculator</h3>
      </div>
      <div class="card-body">
        <div class="form-group">
          <label for="height">Enter your height(cm):</label>
          <input id="height" v-model="ht" class="form-control" />
        </div>
        <div class="form-group">
          <label for="weight">Enter your weight(kg):</label>
          <input id="weight" v-model="wt" class="form-control" />
        </div>
        <div class="result" v-if="ht && wt">
          <p class="result-text">
            Your BMI is: <span class="result-value">{{getBMI(ht, wt).toFixed(2)}}</span>
          </p>
          <p class="result-text">
            You are considered to be: <span class="result-value">{{assessBMI(getBMI(ht, wt))}}</span>
          </p>
        </div>
        <button @click="sentBMI(ht, wt); getFood();" :disabled="!(ht && wt)">Get Food Recommendations</button>
      </div>
    </div>
</template>

<style scoped>
  .form-group {
    margin-bottom: 10px;
    padding: 15px;
  }

  label {
    font-weight: bold;
    display: block;
    margin-bottom: 5px;
  }

  .form-control {
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
    width: 100%;
  }

  .result {
    padding: 20px;
    border: 1px solid #ccc;
    border-radius: 4px;
    margin-bottom: 20px;
  }

  .result-text {
    margin: 0;
    font-size: 18px;
    font-weight: bold;
  }

  .result-value {
    font-weight: normal;
    color: #4CAF50;
  }

  button {
    background-color: #215248;
    border: none;
    color: white;
    padding: 10px 20px;
    text-align: center;
    text-decoration: none;
    display: flex;
    font-size: 16px;
    border-radius: 4px;
    cursor: pointer;
    margin: auto;
  }

  button:disabled {
    opacity: 0.5;
    cursor: not-allowed;
  }

  .card {
    background-color: #FFFFFF;
    border-radius: 4px;
    box-shadow: 0px 0px 4px rgba(0, 0, 0, 0.3);
    margin: 20px;

  }

  .card-header {
    background-color: #124e48;
    border-bottom: 1px solid #CCCCCC;
    padding: 20px;
  }

  .card-title {
    margin: 0;
    font-size: 24px;
    font-weight: bold;
  }

  .card-body {
    padding: 20px;
  }
</style>