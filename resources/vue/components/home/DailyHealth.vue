<template>
    <el-card>
        <template #header>
            <div class="card-header">
                <span>Daily Goals</span>
            </div>
        </template>
        <el-row :gutter="10">
            <el-col :span="12">
                <el-progress type="circle" :percentage="25" />
            </el-col>
            <el-col :span="12">
                <el-row>
                    <el-col class="t-center">
                        <div id="calCount">12345</div>
                        <div>Calories</div>
                    </el-col>
                </el-row>
                <el-row>
                    <el-col class="t-center">
                        <div id="streakCount"><span>12</span> <span>Day</span></div>
                        <div>Streak</div>
                    </el-col>
                </el-row>
            </el-col>
        </el-row>
    </el-card>
</template>

<style scoped>
.card-header {
    display: flex;
    justify-content: space-between;
    font-weight: bold;
    align-items: center;
}

#calCount {
    font-size: 30px;
    font-weight: bold;
    color: green;
}

#streakCount>span:first-child {
    font-size: 30px;
    font-weight: bold;
    color: purple;
}

#streakCount>span:nth-child(2) {
    font-size: 20px;
    font-weight: bold;
    color: purple;
}
</style>