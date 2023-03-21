<script lang="ts">
import { useRouter } from 'vue-router';
import { onMounted } from 'vue';
import { useUserStore } from '@/stores/user';
const userStore = useUserStore();
const router = useRouter();
onMounted(() => {
    if (!userStore.loggedIn) {
        router.push('/auth');
    }
});

export default {
  data () {
    return {
      info: {
        user: '' as string,
        email: '' as string,
        height: '' as string,
        weight: '' as string,
        date: '' as string,
      },
      tableData: [{
        height: '',
        weight: '',
        date: ''
      },{
        height: '',
        weight: '',
        date: ''
      },{
        height: '',
        weight: '',
        date: ''
      },{
        height: '',
        weight: '',
        date: ''
      },{
        height: '',
        weight: '',
        date: ''
      },{
        height: '',
        weight: '',
        date: ''
      },{
        height: '',
        weight: '',
        date: ''
      },{
        height: '',
        weight: '',
        date: ''
      },{
        height: '',
        weight: '',
        date: ''
      },{
        height: '',
        weight: '',
        date: ''
      }],
      num:{
        count: 0
      }
    };
  },
  methods: {
    add(ht: string, wt: string, dt: string){
      if (this.num.count < 10){
        this.tableData[this.num.count] = Object.assign({}, this.tableData[this.num.count], {height:ht, weight:wt, date:dt});
        this.num.count++;
      }
      console.log(this.tableData)
    },
    clear(){
      this.tableData[0] = Object.assign({}, this.tableData[0], {height:'', weight:'', date:''});
      this.tableData[1] = Object.assign({}, this.tableData[0], {height:'', weight:'', date:''});
      this.tableData[2] = Object.assign({}, this.tableData[0], {height:'', weight:'', date:''});
      this.tableData[3] = Object.assign({}, this.tableData[0], {height:'', weight:'', date:''});
      this.tableData[4] = Object.assign({}, this.tableData[0], {height:'', weight:'', date:''});
      this.tableData[5] = Object.assign({}, this.tableData[0], {height:'', weight:'', date:''});
      this.tableData[6] = Object.assign({}, this.tableData[0], {height:'', weight:'', date:''});
      this.tableData[7] = Object.assign({}, this.tableData[0], {height:'', weight:'', date:''});
      this.tableData[8] = Object.assign({}, this.tableData[0], {height:'', weight:'', date:''});
      this.tableData[9] = Object.assign({}, this.tableData[0], {height:'', weight:'', date:''});
      this.num.count = 0;
    }
    /*
    yo(){
      this.tableData = Object.assign({}, this.tableData, {height:10, weight:20});
      console.log(this.tableData);
    }
    */
  }
};
</script>

<template>
  <div>
    <el-breadcrumb separator="/" style="padding-left: 0px;padding-bottom: 30px;font-size: 20px">
      <el-breadcrumb-item><a href="/">Home</a></el-breadcrumb-item>
      <el-breadcrumb-item>Settings</el-breadcrumb-item>
    </el-breadcrumb>
    <el-card class="box-card">
      <el-form :inline="true" :model="info" class="demo-form-inline">
        <el-form-item label="height" label-width="50px">
          <el-input clearable v-model="info.height" placeholder="input height"></el-input>
        </el-form-item>
        <el-form-item label="weight" label-width="50px">
          <el-input clearable v-model="info.weight" placeholder="input weight"></el-input>
        </el-form-item>
        <el-form-item label="date" label-width="50px">
          <el-input clearable v-model="info.date" placeholder="input date"></el-input>
        </el-form-item>
        <el-form-item style="margin-left: 0px">
          <el-button type="primary" icon="el-icon-submit" @click="add(info.height, info.weight, info.date)"> SUBMIT </el-button>
          <el-button type="primary" icon="el-icon-clear" @click="clear()"> CLEAR </el-button>
        </el-form-item>
      </el-form>
      <el-table
        :data="tableData"
        border
        style="width: 100%; height: 500px">
        <el-table-column
          prop="date"
          label="date">
        </el-table-column>
        <el-table-column
          prop="height"
          label="height">
        </el-table-column>
        <el-table-column
          prop="weight"
          label="weight">
        </el-table-column>
      </el-table>
    </el-card>
  </div>
</template>