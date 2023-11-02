<script setup>
import TabbarLayout from '@/Layouts/TabbarLayout.vue'
import {Head} from '@inertiajs/vue3';
import {Inertia} from "@inertiajs/inertia";

const logout = () => {
    Inertia.post(route('logout'));
}
const onClickLeft = () => {

}
</script>
<template>
    <Head title="我的"></Head>
    <div class="w-full min-h-screen bg-gray-200 flex flex-col">
        <van-nav-bar
            title="个人中心"
            left-arrow
            @click-left="onClickLeft"
        />
        <van-space class="mt-2" direction="vertical" fill>
            <van-cell title="拨打记录" is-link :url="route('history')"/>

        </van-space>
        <div class="mt-8">
            <van-button class="mt-4" type="danger" @click="logout" block>退出登录</van-button>
        </div>
    </div>
    <TabbarLayout :active="2"/>
</template>
<style scoped>

</style>
