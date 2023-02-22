<script lang="ts">
import { defineComponent, reactive } from 'vue';
import axios from 'axios';

export default defineComponent({
  setup() {
    const state = reactive({
      selectedMeal: '' as string,
      recommendation: '' as string,
      error: '' as string,
      loading: false as boolean
    });

    async function selectMeal() {
        state.loading = true;
        try {
            const options = {
            method: state.selectedMeal,
            url: 'https://suggestic1.p.rapidapi.com/api/v1/login',
            headers: {
                'content-type': 'application/json',
                Authorization: 'Bearer 9c1a58e5e2ac2da4c68b7a4c32f4ca8f996029e6',
                'X-RapidAPI-Key': '8e6a59a6ccmshd4e5deac711857fp1cc151jsn50484f2a312d',
                'X-RapidAPI-Host': 'suggestic1.p.rapidapi.com',
            }
            };
            const response = await axios.request(options);
            console.log(response.data);
            state.recommendation = response.data;
        } catch (error) {
            state.error = error as string;
        } finally {
            state.loading = false;
        }
    }

    return {
      selectedMeal: state.selectedMeal,
      recommendation: state.recommendation,
      error: state.error,
      loading: state.loading,
      selectMeal
    };
  }
});
</script>

<template>
  <div>
    <h1>Your food plan for today:</h1>
    <select v-model="selectedMeal" @change="selectMeal">
      <option disabled value="">Please select a meal</option>
      <option>Breakfast</option>
      <option>Lunch</option>
      <option>Dinner</option>
    </select>
    <p v-if="loading">Loading recommendations...</p>
    <p v-else-if="error">An error occurred: {{ error }}</p>
    <p v-else-if="recommendation">We recommend trying {{ recommendation }} for {{ selectedMeal }}.</p>
  </div>
</template>
