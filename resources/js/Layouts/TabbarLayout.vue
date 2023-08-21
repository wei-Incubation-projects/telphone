<template>
    <van-tabbar v-model="active">
        <van-tabbar-item icon="home-o"><Link :href="route('dashboard')">工作台</Link></van-tabbar-item>
        <van-tabbar-item icon="search"><Link :href="route('recall')">复播</Link></van-tabbar-item>
        <van-tabbar-item icon="friends-o"><Link :href="route('mine')">我的</Link></van-tabbar-item>
    </van-tabbar>
</template>

<script setup>
import {ref} from "vue";
import { Link } from '@inertiajs/vue3';

const active = ref(0)

const updateActive = (index)=>{
    active.value = index
}
</script>

