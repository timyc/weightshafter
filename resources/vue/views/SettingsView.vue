<script setup lang="ts">

</script>


<template>
    <el-container style="min-height: 100vh">
        <el-menu :default-openeds="['1', '3']" style="min-height: 100%; overflow-x: hidden"
                 background-color="rgb(48, 65, 86)"
                 text-color="#fff"
                 active-text-color="#ffd04b"
                 :collapse-transition="false"
        >
            <el-menu-item-group>
              <el-menu-item index="1">Select1</el-menu-item>
              <el-menu-item index="2">Select2</el-menu-item>
              <el-menu-item index="3">Select3</el-menu-item>
              <el-menu-item index="4">Select4</el-menu-item>
              <el-menu-item index="5">Select5</el-menu-item>
              <el-menu-item index="6">Select6</el-menu-item>
            </el-menu-item-group>
        </el-menu>
      <el-container>
        <el-header style="font-size: 12px; border-bottom: 1px solid #ccc; line-height: 60px; display: flex">
          <el-dropdown style="width: 70px; cursor: pointer">
            <span>Setting</span><i class="el-icon-arrow-down" style="margin-left: 5px"></i>
            <el-dropdown-menu slot="dropdown">
              <el-dropdown-item>Profile</el-dropdown-item>
              <el-dropdown-item>Exit</el-dropdown-item>
            </el-dropdown-menu>
          </el-dropdown>
        </el-header>
      </el-container>
    </el-container>
</template>