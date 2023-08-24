<script setup>
import TabbarLayout from '@/Layouts/TabbarLayout.vue'
import { Head } from '@inertiajs/vue3';
</script>

<template>
    <Head title="复播"/>
    <div class="w-full min-h-screen px-3 bg-gray-200 flex flex-col">
        <div class="mt-4">
            <span class="px-1 bg-blue-400 text-sm rounded-md">可复播总量：0</span>
        </div>
        <div class="w-full mt-4 text-sm">
            复播数据是上一次拨打后标记为<span class="text-blue-500">未接通(通话中/语言助手/在忙稍后回电)</span>
            状态的数据。复播后，不再提供该标记。
        </div>
        <div class="w-full h-full flex-1 ">
            <div class="w-full h-full flex-1 flex justify-center items-center">
                <van-empty image="search" description="暂无复播数据" />
            </div>
        </div>
    </div>
    <TabbarLayout  :active="1"/>
</template>


