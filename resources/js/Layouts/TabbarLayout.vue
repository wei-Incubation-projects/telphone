<template>
    <van-tabbar v-model="active" @change="changeTab">
        <van-tabbar-item icon="home-o">工作台</van-tabbar-item>
        <van-tabbar-item icon="search">复播</van-tabbar-item>
        <van-tabbar-item icon="friends-o">我的</van-tabbar-item>
    </van-tabbar>
</template>

<script setup>
import {Inertia} from "@inertiajs/inertia";
defineProps({
    active: Number
})
const changeTab = (e)=>{
   console.log(e)
    switch (e){
        case 0:
            Inertia.visit(route('dashboard'));
            break;
        case 1:
            Inertia.visit(route('recall'));
            break;
        case 2:
            Inertia.visit(route('mine'));
            break;
    }
}
</script>

