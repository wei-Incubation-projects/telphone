<script setup>
import TabbarLayout from '@/Layouts/TabbarLayout.vue'
import {Head} from '@inertiajs/vue3';
import {computed, reactive, ref} from "vue";
import {showDialog} from 'vant';
import 'vant/es/dialog/style';

const props = defineProps({
    status: Array | Object, // 统计
    count: Number, // 总数
    tel: Object, // 分配号码
})
const phone = ref();
const show = ref(false);
const tel = reactive(props.tel || {});
const display = computed(() => {
    return tel && Object.keys(tel).length !== 0;
})
const changeKey = (status) => {
    show.value = status
}
const deletePhone = () => {
    phone.value = phone.value.slice(0, -1)
}
const onClickButton = () => {
    window.axios.post(route('search'), {phone: phone.value})
        .then(res => {
            if (res.data.code === 200 && res.data.data) {
                Object.assign(tel, res.data.data)
            }
            showDialog({
                message: '号码不存在或未获得。',
            }).then(() => {
                // on close
            });
        }).catch(err => {
        console.log(err)
        showDialog({
            message: err,
        }).then(() => {
            // on close
        });
    });
    return false;
}

const selectStatus = (val) => {
    props.tel.status = val;
}

const onClickSubmit = () => {
    window.axios.post(route('telphone'), tel)
        .then(res => {
            if (res.data.code === 200) {
                showDialog({
                    message: '提交成功。',
                }).then(() => {
                    // on close
                    Object.assign(tel, {})
                });
            } else {
                showDialog({
                    message: '提交失败。',
                })
            }
            Object.keys(tel).forEach(key => delete tel[key])
        }).catch(err => {
        showDialog({
            message: err,
        })
    });
    return false;
}
</script>

<template>
    <Head title="工作台"/>
    <div class="w-full h-[calc(100vh-50px)] overflow-y-auto pt-4 px-4 pb-6 bg-gray-200 flex flex-col ">
        <van-number-keyboard
            v-model="phone"
            :maxlength="11"
            :show="show"
            @blur="changeKey(false)"
            @delete="deletePhone"
        />
        <van-search shape="round" class="input-search"
                    v-model="phone"
                    show-action
                    placeholder="请输入手机号码"
                    @focus="changeKey(true)"
        >
            <template #action>
                <button @click.prevent="onClickButton">搜索</button>
            </template>
        </van-search>
        <div class="w-full mt-4 text-sm flex flex-wrap">
            <div class="px-1 mr-2 mb-1 rounded-lg bg-blue-400">当日总量：{{ count }}</div>
            <div class="px-1 mr-2 mb-1 rounded-lg bg-gray-400">已接通：{{ status[1] }}</div>
            <div class="px-1 mr-2 mb-1 rounded-lg bg-green-400">已同意：{{ status[2] }}</div>
            <div class="px-1 mr-2 mb-1 rounded-lg bg-red-400">直接挂断: {{ status[5] }}</div>
            <div class="px-1 mr-2 mb-1 rounded-lg bg-red-400">拒绝：{{ status[4] }}</div>
            <div class="px-1 mr-2 mb-1 rounded-lg bg-green-400">未接通(通话中/语音助手/在忙稍后回电): {{ status[3] }}
            </div>
            <div class="px-1 mr-2 mb-1 rounded-lg bg-yellow-400">关机/停机/空号: {{ status[-1] }}</div>
        </div>
        <div class="w-full" v-if="display">
            <div class="w-full mt-8 bg-white flex flex-col justify-evenly items-center">
                <div class="w-full pl-2 text-sm leading-10 border-b-2 text-base">客户数据</div>
                <div class="w-full h-20 border-b-2 pl-8 text-sm text-gray-400 flex flex-col justify-evenly">
                    <!--                <div @click.prevent="onTelPhone(props.tel.phone)">客户手机号：{{ tel.phone }}</div>-->
                    <a :href="'tel:'+ tel.phone">客户手机号：{{ tel.phone }}</a>
                    <div>获取数据时间：{{ tel.created_at }}</div>
                </div>
            </div>

            <div class="w-full px-6 py-3 border-b-2 bg-white flex flex-col items-center">
                <div class="w-full mt-1 pr-1 text-sm leading-8 border-b flex justify-between" @click="selectStatus(1)">
                    <div class="text-gray-400">已接通</div>
                    <div class="leading-loose text-red-300" v-if="tel.status === 1">✔</div>
                </div>
                <div class="w-full mt-1 text-sm leading-8 border-b flex justify-between" @click="selectStatus(2)">
                    <div class="text-green-400 ">已同意</div>
                    <div class="leading-loose text-red-300" v-if="tel.status === 2">✔</div>
                </div>
                <div class="w-full mt-1 text-sm leading-8 border-b flex justify-between" @click="selectStatus(3)">
                    <div class="w-4/5  text-blue-400 overflow-hidden whitespace-nowrap overflow-ellipsis ">
                        未接通(通话中/语音助手/在忙稍后回电)
                    </div>
                    <div class="leading-loose text-red-300" v-if="tel.status === 3">✔</div>
                </div>
                <div class="w-full mt-1 text-sm leading-8 border-b flex justify-between" @click="selectStatus(4)">
                    <div class="text-red-400">拒绝</div>
                    <div class="leading-loose text-red-300" v-if="tel.status === 4">✔</div>
                </div>
                <div class="w-full mt-1 text-sm leading-8 border-b flex justify-between" @click="selectStatus(5)">
                    <div class="text-red-400">直接挂断</div>
                    <div class="leading-loose text-red-300" v-if="tel.status === 5">✔</div>
                </div>
                <div class="w-full mt-1 text-sm leading-8 flex justify-between" @click="selectStatus(-1)">
                    <div class="text-yellow-400">关机/停机/空号</div>
                    <div class="leading-loose text-red-300" v-if="tel.status === -1">✔</div>
                </div>
            </div>
            <div class="w-full h-auto p-2 bg-white">
            <textarea class="w-full h-30 text-sm border-none focus:border-none placeholder-gray-400"
                      name="remark" cols="30" rows="3" placeholder="请输入备注信息" v-model="tel.remark"/>
            </div>

            <button class="w-full mt-4 leading-8 text-sm text-gray-100 bg-blue-500 rounded-sm" type="button"
                    @click.prevent="onClickSubmit">确认提交
            </button>
        </div>
    </div>
    <TabbarLayout :active="0"/>
</template>
<style scoped>
.input-search /deep/ > input {
    outline: none;
}
</style>
