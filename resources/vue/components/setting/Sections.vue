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
        date: '' as string
      },
      tableData: [{
        date: '2023-01-01',
        user: 'shaq',
        height: '175',
        weight: '71'
      }, {
        date: '2023-01-02',
        user: 'shaq',
        height: '175',
        weight: '72'
      }, {
        date: '2023-01-03',
        user: 'shaq',
        height: '175',
        weight: '73'
      }, {
        date: '2023-01-04',
        user: 'shaq',
        height: '175',
        weight: '74'
      }],
    }
  },
  methods: {
    submit(){
      console.log('submit')
    }
  }
}
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
          <el-button type="primary" icon="el-icon-submit"> SUBMIT </el-button>
        </el-form-item>
      </el-form>
      <el-table
        :data="tableData"
        border
        style="width: 100%; height: 400px">
        <el-table-column
          prop="date"
          label="date">
        </el-table-column>
        <el-table-column
          prop="height"
          label="height">
          <!-- el-input clearable v-model="formInline.height" placeholder="height" --><!-- /el-input -->
        </el-table-column>
        <el-table-column
          prop="weight"
          label="weight">
          <!-- el-input clearable v-model="formInline.weight" placeholder="weight" --><!-- /el-input -->
        </el-table-column>
      </el-table>
    </el-card>
  </div>
</template>