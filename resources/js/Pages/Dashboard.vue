<script setup>
import TabbarLayout from '@/Layouts/TabbarLayout.vue'
import { Head } from '@inertiajs/vue3';

const props = defineProps({

})
</script>

<template>
    <Head title="工作台" />
    <div class="w-full min-h-screen pt-4 px-4 bg-gray-200 flex flex-col ">
        <van-search shape="round"
            v-model="value"
            show-action
            placeholder="请输入手机号码"
            @search="onSearch"
        >
            <template #action>
                <div @click="onClickButton">搜索</div>
            </template>
        </van-search>
        <div class="w-full mt-4 text-sm flex flex-wrap">
            <div class="px-1 mr-2 mb-1 rounded-lg bg-blue-400">当日总量：200</div>
            <div class="px-1 mr-2 mb-1 rounded-lg bg-gray-400">已接通：13</div>
            <div class="px-1 mr-2 mb-1 rounded-lg bg-green-400">已同意：1</div>
            <div class="px-1 mr-2 mb-1 rounded-lg bg-red-400">直接挂断: 90</div>
            <div class="px-1 mr-2 mb-1 rounded-lg bg-red-400">拒绝：26</div>
            <div class="px-1 mr-2 mb-1 rounded-lg bg-green-400">未接通(通话中/语音助手/在忙稍后回电): 56</div>
            <div class="px-1 mr-2 mb-1 rounded-lg bg-yellow-400">关机/停机/空号: 14</div>
        </div>
        <div class="w-full mt-8 bg-white flex flex-col justify-evenly items-center">
            <div class="w-full pl-2 text-sm leading-10 border-b-2 text-base">客户数据</div>
            <div class="w-full h-20 border-b-2 pl-8 text-sm text-gray-400 flex flex-col justify-evenly">
                <div>客户手机号：13800001111</div>
                <div>获取数据时间：2023-08-16 09:19:38</div>
            </div>
        </div>
    </div>
<TabbarLayout />
</template>
