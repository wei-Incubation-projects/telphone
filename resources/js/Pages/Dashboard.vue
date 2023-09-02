<script setup>
import TabbarLayout from '@/Layouts/TabbarLayout.vue'
import { Head } from '@inertiajs/vue3';
import {ref} from "vue";
const props = defineProps({

})
const onSearch = (value)=>{
    console.log(value)
}
const phone = ref();
const show = ref(false);
const changeKey = (status)=>{
    show.value = status
}
const deletePhone = ()=>{
    phone.value = phone.value.slice(0,-1)
}
const onClickButton = ()=>{

}
</script>

<template>
    <Head title="工作台" />
    <div class="w-full h-[calc(100vh-50px)] overflow-y-auto pt-4 px-4 pb-6  bg-gray-200 flex-1 flex flex-col ">
        <van-number-keyboard
            v-model="phone"
            :maxlength="11"
            :show="show"
            @blur="changeKey(false)"
            @delete="deletePhone"
        />
        <van-search shape="round"
            v-model="phone"
            show-action
            placeholder="请输入手机号码"
            @search="onSearch"
            @focus="changeKey(true)"
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

        <div class="w-full px-6 py-3 border-b-2 bg-white flex flex-col items-center">
            <div class="w-full mt-1 text-sm leading-8 border-b flex justify-between">
                <div class="text-gray-400">已接通</div>
            </div>
            <div class="w-full mt-1 text-sm leading-8 border-b flex justify-between">
                <div class="text-green-400 ">已同意</div>
            </div>
            <div class="w-full mt-1 text-sm leading-8 border-b flex justify-between">
                <div class="w-4/5  text-blue-400 overflow-hidden whitespace-nowrap overflow-ellipsis ">未接通(通话中/语音助手/在忙稍后回电)</div>
            </div>
            <div class="w-full mt-1 text-sm leading-8 border-b flex justify-between">
                <div class="text-red-400">拒绝</div>
            </div>
            <div class="w-full mt-1 text-sm leading-8 border-b flex justify-between">
                <div class="text-red-400">直接挂断</div>
            </div>
            <div class="w-full mt-1 text-sm leading-8 flex justify-between">
                <div class="text-yellow-400">关机/停机/空号</div>
            </div>
        </div>
        <div class="w-full h-full p-2 bg-white">
            <textarea class="w-full h-30 text-sm border-none focus:border-none placeholder-gray-400"
                      name="remark" cols="30" rows="3" placeholder="请输入备注信息" />
        </div>

        <button class="w-full mt-4 leading-8 text-sm text-gray-100 bg-blue-500 rounded-sm" type="button">确认提交</button>
    </div>
<TabbarLayout  :active="0"/>
</template>
