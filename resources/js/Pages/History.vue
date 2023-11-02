<script setup>
import {Head} from '@inertiajs/vue3';
import {ref} from "vue";
import {Inertia} from "@inertiajs/inertia";

const props = defineProps({
    telHistory: Array
})
const title = ref('拨打历史')
const onClickLeft = () => {
    Inertia.get(route('mine'))
}
console.log(props.telHistory)
</script>
<template>
    <Head :title="title"/>
    <div class="w-full min-h-screen bg-gray-200 flex flex-col">
        <van-nav-bar
            :title="title"
            left-arrow
            @click-left="onClickLeft"
        />
        <van-space class="mt-2" direction="vertical" fill>
            <van-cell-group inset>
                <van-cell :title="item.phone" :value="item.status" :label="item.remark" v-for="(item,key) in telHistory"
                          :key="key"/>

            </van-cell-group>
        </van-space>
    </div>
</template>
