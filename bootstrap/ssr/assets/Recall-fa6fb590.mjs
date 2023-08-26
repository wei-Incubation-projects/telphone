import { Empty } from "vant/es/index.mjs";
import "vant/es/empty/style/index.mjs";
import { unref, useSSRContext } from "vue";
import { ssrRenderComponent } from "vue/server-renderer";
import { _ as _sfc_main$1 } from "./TabbarLayout-cb0a3281.mjs";
import { Head } from "@inertiajs/vue3";
import "vant/es/tabbar-item/style/index.mjs";
import "vant/es/tabbar/style/index.mjs";
const _sfc_main = {
  __name: "Recall",
  __ssrInlineRender: true,
  setup(__props) {
    return (_ctx, _push, _parent, _attrs) => {
      const _component_van_empty = Empty;
      _push(`<!--[-->`);
      _push(ssrRenderComponent(unref(Head), { title: "复播" }, null, _parent));
      _push(`<div class="w-full min-h-screen px-3 bg-gray-200 flex flex-col"><div class="mt-4"><span class="px-1 bg-blue-400 text-sm rounded-md">可复播总量：0</span></div><div class="w-full mt-4 text-sm"> 复播数据是上一次拨打后标记为<span class="text-blue-500">未接通(通话中/语言助手/在忙稍后回电)</span> 状态的数据。复播后，不再提供该标记。 </div><div class="w-full h-full flex-1"><div class="w-full h-full flex-1 flex justify-center items-center">`);
      _push(ssrRenderComponent(_component_van_empty, {
        image: "search",
        description: "暂无复播数据"
      }, null, _parent));
      _push(`</div></div></div>`);
      _push(ssrRenderComponent(_sfc_main$1, { active: 1 }, null, _parent));
      _push(`<!--]-->`);
    };
  }
};
const _sfc_setup = _sfc_main.setup;
_sfc_main.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/Pages/Recall.vue");
  return _sfc_setup ? _sfc_setup(props, ctx) : void 0;
};
export {
  _sfc_main as default
};
