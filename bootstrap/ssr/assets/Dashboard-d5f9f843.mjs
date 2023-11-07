import { NumberKeyboard, Search } from "vant/es/index.mjs";
import "vant/es/search/style/index.mjs";
import "vant/es/number-keyboard/style/index.mjs";
import { ref, reactive, computed, unref, withCtx, createVNode, withModifiers, useSSRContext } from "vue";
import { ssrRenderComponent, ssrInterpolate, ssrRenderAttr } from "vue/server-renderer";
import { _ as _sfc_main$1 } from "./TabbarLayout-f55925f1.mjs";
import { Head } from "@inertiajs/vue3";
import { showDialog } from "vant";
import "vant/es/dialog/style/index.mjs";
import { _ as _export_sfc } from "./_plugin-vue_export-helper-cc2b3d55.mjs";
import "vant/es/tabbar-item/style/index.mjs";
import "vant/es/tabbar/style/index.mjs";
import "@inertiajs/inertia";
const Dashboard_vue_vue_type_style_index_0_scoped_6143fe0c_lang = "";
const _sfc_main = {
  __name: "Dashboard",
  __ssrInlineRender: true,
  props: {
    status: Array | Object,
    // 统计
    count: Number,
    // 总数
    tel: Object
    // 分配号码
  },
  setup(__props) {
    const props = __props;
    const phone = ref();
    const show = ref(false);
    const tel = reactive(props.tel || {});
    const display = computed(() => {
      return tel && Object.keys(tel).length !== 0;
    });
    const changeKey = (status) => {
      show.value = status;
    };
    const deletePhone = () => {
      phone.value = phone.value.slice(0, -1);
    };
    const onClickButton = () => {
      window.axios.post(route("search"), { phone: phone.value }).then((res) => {
        if (res.data.code === 200 && res.data.data) {
          Object.assign(tel, res.data.data);
        }
        showDialog({
          message: "号码不存在或未获得。"
        }).then(() => {
        });
      }).catch((err) => {
        console.log(err);
        showDialog({
          message: err
        }).then(() => {
        });
      });
      return false;
    };
    return (_ctx, _push, _parent, _attrs) => {
      const _component_van_number_keyboard = NumberKeyboard;
      const _component_van_search = Search;
      _push(`<!--[-->`);
      _push(ssrRenderComponent(unref(Head), { title: "工作台" }, null, _parent));
      _push(`<div class="w-full h-[calc(100vh-50px)] overflow-y-auto pt-4 px-4 pb-6 bg-gray-200 flex flex-col" data-v-6143fe0c>`);
      _push(ssrRenderComponent(_component_van_number_keyboard, {
        modelValue: phone.value,
        "onUpdate:modelValue": ($event) => phone.value = $event,
        maxlength: 11,
        show: show.value,
        onBlur: ($event) => changeKey(false),
        onDelete: deletePhone
      }, null, _parent));
      _push(ssrRenderComponent(_component_van_search, {
        shape: "round",
        class: "input-search",
        modelValue: phone.value,
        "onUpdate:modelValue": ($event) => phone.value = $event,
        "show-action": "",
        placeholder: "请输入手机号码",
        onFocus: ($event) => changeKey(true)
      }, {
        action: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(`<button data-v-6143fe0c${_scopeId}>搜索</button>`);
          } else {
            return [
              createVNode("button", {
                onClick: withModifiers(onClickButton, ["prevent"])
              }, "搜索", 8, ["onClick"])
            ];
          }
        }),
        _: 1
      }, _parent));
      _push(`<div class="w-full mt-4 text-sm flex flex-wrap" data-v-6143fe0c><div class="px-1 mr-2 mb-1 rounded-lg bg-blue-400" data-v-6143fe0c>当日总量：${ssrInterpolate(__props.count)}</div><div class="px-1 mr-2 mb-1 rounded-lg bg-gray-400" data-v-6143fe0c>已接通：${ssrInterpolate(__props.status[1])}</div><div class="px-1 mr-2 mb-1 rounded-lg bg-green-400" data-v-6143fe0c>已同意：${ssrInterpolate(__props.status[2])}</div><div class="px-1 mr-2 mb-1 rounded-lg bg-red-400" data-v-6143fe0c>直接挂断: ${ssrInterpolate(__props.status[5])}</div><div class="px-1 mr-2 mb-1 rounded-lg bg-red-400" data-v-6143fe0c>拒绝：${ssrInterpolate(__props.status[4])}</div><div class="px-1 mr-2 mb-1 rounded-lg bg-green-400" data-v-6143fe0c>未接通(通话中/语音助手/在忙稍后回电): ${ssrInterpolate(__props.status[3])}</div><div class="px-1 mr-2 mb-1 rounded-lg bg-yellow-400" data-v-6143fe0c>关机/停机/空号: ${ssrInterpolate(__props.status[-1])}</div></div>`);
      if (unref(display)) {
        _push(`<div class="w-full" data-v-6143fe0c><div class="w-full mt-8 bg-white flex flex-col justify-evenly items-center" data-v-6143fe0c><div class="w-full pl-2 text-sm leading-10 border-b-2 text-base" data-v-6143fe0c>客户数据</div><div class="w-full h-20 border-b-2 pl-8 text-sm text-gray-400 flex flex-col justify-evenly" data-v-6143fe0c><a${ssrRenderAttr("href", "tel:" + tel.phone)} data-v-6143fe0c>客户手机号：${ssrInterpolate(tel.phone)}</a><div data-v-6143fe0c>获取数据时间：${ssrInterpolate(tel.created_at)}</div></div></div><div class="w-full px-6 py-3 border-b-2 bg-white flex flex-col items-center" data-v-6143fe0c><div class="w-full mt-1 pr-1 text-sm leading-8 border-b flex justify-between" data-v-6143fe0c><div class="text-gray-400" data-v-6143fe0c>已接通</div>`);
        if (tel.status === 1) {
          _push(`<div class="leading-loose text-red-300" data-v-6143fe0c>✔</div>`);
        } else {
          _push(`<!---->`);
        }
        _push(`</div><div class="w-full mt-1 text-sm leading-8 border-b flex justify-between" data-v-6143fe0c><div class="text-green-400" data-v-6143fe0c>已同意</div>`);
        if (tel.status === 2) {
          _push(`<div class="leading-loose text-red-300" data-v-6143fe0c>✔</div>`);
        } else {
          _push(`<!---->`);
        }
        _push(`</div><div class="w-full mt-1 text-sm leading-8 border-b flex justify-between" data-v-6143fe0c><div class="w-4/5 text-blue-400 overflow-hidden whitespace-nowrap overflow-ellipsis" data-v-6143fe0c> 未接通(通话中/语音助手/在忙稍后回电) </div>`);
        if (tel.status === 3) {
          _push(`<div class="leading-loose text-red-300" data-v-6143fe0c>✔</div>`);
        } else {
          _push(`<!---->`);
        }
        _push(`</div><div class="w-full mt-1 text-sm leading-8 border-b flex justify-between" data-v-6143fe0c><div class="text-red-400" data-v-6143fe0c>拒绝</div>`);
        if (tel.status === 4) {
          _push(`<div class="leading-loose text-red-300" data-v-6143fe0c>✔</div>`);
        } else {
          _push(`<!---->`);
        }
        _push(`</div><div class="w-full mt-1 text-sm leading-8 border-b flex justify-between" data-v-6143fe0c><div class="text-red-400" data-v-6143fe0c>直接挂断</div>`);
        if (tel.status === 5) {
          _push(`<div class="leading-loose text-red-300" data-v-6143fe0c>✔</div>`);
        } else {
          _push(`<!---->`);
        }
        _push(`</div><div class="w-full mt-1 text-sm leading-8 flex justify-between" data-v-6143fe0c><div class="text-yellow-400" data-v-6143fe0c>关机/停机/空号</div>`);
        if (tel.status === -1) {
          _push(`<div class="leading-loose text-red-300" data-v-6143fe0c>✔</div>`);
        } else {
          _push(`<!---->`);
        }
        _push(`</div></div><div class="w-full h-auto p-2 bg-white" data-v-6143fe0c><textarea class="w-full h-30 text-sm border-none focus:border-none placeholder-gray-400" name="remark" cols="30" rows="3" placeholder="请输入备注信息" data-v-6143fe0c>${ssrInterpolate(tel.remark)}</textarea></div><button class="w-full mt-4 leading-8 text-sm text-gray-100 bg-blue-500 rounded-sm" type="button" data-v-6143fe0c>确认提交 </button></div>`);
      } else {
        _push(`<!---->`);
      }
      _push(`</div>`);
      _push(ssrRenderComponent(_sfc_main$1, { active: 0 }, null, _parent));
      _push(`<!--]-->`);
    };
  }
};
const _sfc_setup = _sfc_main.setup;
_sfc_main.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/Pages/Dashboard.vue");
  return _sfc_setup ? _sfc_setup(props, ctx) : void 0;
};
const Dashboard = /* @__PURE__ */ _export_sfc(_sfc_main, [["__scopeId", "data-v-6143fe0c"]]);
export {
  Dashboard as default
};
