 <script setup lang="ts">
 import axios from 'axios';
import { List } from 'lodash';
 </script>
 
 
<script lang="ts">
export default{

    data() 
    {
        return {
            ht:0,
            wt:0,
            foodList: [['', 0]],
        };
     },

    methods: {
        getUserHeightAndWeight() {
            // console.log("hello");
            axios.get('/user/info')
                .then(response => {
                    this.ht = response.data.height;
                    this.wt = response.data.weight;
                });
            // return temp;
            // return "hello";
        },

        getFoodList(uc) {
            //[Math.floor(uc-1), Math.ceil(uc+1)]
            var calStr = Math.floor(uc-30) + '-' + Math.ceil(uc+30);
            // var calStr = 255 + '-' + 267;
            axios
                .get('https://api.edamam.com/api/food-database/v2/parser', {
                    params: {
                        app_id: '7b3ffbde',
                        app_key: 'c52858e7b9b21ef870e285d24051ecb1',
                        calories: calStr,
                        category: 'generic-meals',
                    }
                })
                .then(response => {
                    //this.foodList = response.data.hints;//.hints.label;
                    // for (var i of response.data) {
                    //     console.log(i)
                    // }
                    // console.log(response.data.hints);
                    // console.log("XXTEST");
                    // this.foodList = []
                    for (var i of response.data.hints) {
                        // console.log(i.food.label);
                        this.foodList.push([i.food.label, i.food.nutrients.ENERC_KCAL])
                    }
                    // console.log("TTTEST");
                })
                .catch(() => {
                    this.foodList = [['Error', -1]];
                });
            // console.log("TEST::FOODLIST::");
            // console.log(this.foodList);
            // console.log("ENDTEST::FOODLIST::");
        }
    }
 };
 
function getUserCalories(ht, wt) {
    var bmi = wt / (ht*ht);
    var sbmi = 21.7; // standard healthy BMI
    var scpd = 1833; // standard calories per day
    var scpm = scpd / 3; // standard calories per meal
    // uc::how much calories the user should consume per meal
    var uc = (1 - (bmi/sbmi)) * scpm + scpm; 
    return uc;
}

// function getFoodList(uc) {

// }
// function getUserHeightAndWeight() {
//     // console.log("hello");
//     let temp = 0;
//     let res = axios.get('/user/info')
//                     .then(response => {
//                         // response = response.data;
//                         temp = response.data.height;
//                         console.log(temp);
//                     })
//                     .catch(() => {
//                         temp = 99;
//                     });
//     // return temp;
//     // return "hello";
//     // console.log(temp);
//     return temp;
// }

// function getUserHeightAndWeight() {
//     let temp = 0;
//     const getData = async () => {
//         var answer = await axios.get('/user/info').then(function (response) {
//             return response.data.height
//         });
//         temp = answer;
//         console.log(answer);
//         // temp = data.data.height;
//         // return data;
//     }
//     getData();
//     // console.log(temp);
//     // const res = await axios.get('/user/info');
//     // temp = res.data.height;
//     // console.log(temp);
//     return temp;
// }

// const login = async () => {
//     // let data = {
//     //     email: email.value,
//     //     password: password.value
//     // };
//     let temph = 0;
//     let tempw = 0;
//     axios.get('/user/info')
//         .then(response => {
//             if (response.data) {
//                 // window["userID"] = response.data.id;
//                 temph = response.data.height;
//                 tempw = response.data.weight;
//                 // setTimeout(() => {
//                 //     userStore.initEcho();
//                 //     router.push('/');
//                 // }, 1000);
//             }
//         });
//     return temph;
// };
</script>
 
 <template>
     <div>
        <!-- <button @click="getUserCalories();">hello</button> -->
        <p>{{ getUserHeightAndWeight() }}</p>
        <p>Your optimal calorie intake for this meal: {{ getUserCalories(ht, wt) }}</p>
        <p>Your height: {{ ht }} m</p>
        <p>Your weight: {{ wt }} kg</p>
        <button @click="getFoodList(getUserCalories(ht, wt));">GetFoodRecommendation</button>
        <!-- <p>{{getFoodList(getUserCalories(ht, wt))}}</p> -->
        <ul>
            <li v-for="food in foodList">
                <li v-if="food[1]!=0">
                    Food: {{ food[0] }}, Calories: {{ Math.round(food[1]) }}
                </li>
            </li>
        </ul>
        
        <!-- {{ login }} -->
        <!-- <p>{{ ht }}</p>
        <p>{{ wt }}</p> -->
     </div>
 </template>
 


