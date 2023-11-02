import { NavBar, Space, Cell, Button } from "vant/es/index.mjs";
import "vant/es/button/style/index.mjs";
import "vant/es/cell/style/index.mjs";
import "vant/es/space/style/index.mjs";
import "vant/es/nav-bar/style/index.mjs";
import { unref, withCtx, createVNode, createTextVNode, useSSRContext } from "vue";
import { ssrRenderComponent } from "vue/server-renderer";
import { _ as _sfc_main$1 } from "./TabbarLayout-cb0a3281.mjs";
import { Head } from "@inertiajs/vue3";
import { Inertia } from "@inertiajs/inertia";
import "vant/es/tabbar-item/style/index.mjs";
import "vant/es/tabbar/style/index.mjs";
const _sfc_main = {
  __name: "Mine",
  __ssrInlineRender: true,
  setup(__props) {
    const logout = () => {
      Inertia.post(route("logout"));
    };
    const onClickLeft = () => {
    };
    return (_ctx, _push, _parent, _attrs) => {
      const _component_van_nav_bar = NavBar;
      const _component_van_space = Space;
      const _component_van_cell = Cell;
      const _component_van_button = Button;
      _push(`<!--[-->`);
      _push(ssrRenderComponent(unref(Head), { title: "我的" }, null, _parent));
      _push(`<div class="w-full min-h-screen bg-gray-200 flex flex-col">`);
      _push(ssrRenderComponent(_component_van_nav_bar, {
        title: "个人中心",
        "left-arrow": "",
        onClickLeft
      }, null, _parent));
      _push(ssrRenderComponent(_component_van_space, {
        class: "mt-2",
        direction: "vertical",
        fill: ""
      }, {
        default: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(ssrRenderComponent(_component_van_cell, {
              title: "拨打记录",
              "is-link": "",
              url: _ctx.route("history")
            }, null, _parent2, _scopeId));
          } else {
            return [
              createVNode(_component_van_cell, {
                title: "拨打记录",
                "is-link": "",
                url: _ctx.route("history")
              }, null, 8, ["url"])
            ];
          }
        }),
        _: 1
      }, _parent));
      _push(`<div class="mt-8">`);
      _push(ssrRenderComponent(_component_van_button, {
        class: "mt-4",
        type: "danger",
        onClick: logout,
        block: ""
      }, {
        default: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(`退出登录`);
          } else {
            return [
              createTextVNode("退出登录")
            ];
          }
        }),
        _: 1
      }, _parent));
      _push(`</div></div>`);
      _push(ssrRenderComponent(_sfc_main$1, { active: 2 }, null, _parent));
      _push(`<!--]-->`);
    };
  }
};
const _sfc_setup = _sfc_main.setup;
_sfc_main.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/Pages/Mine.vue");
  return _sfc_setup ? _sfc_setup(props, ctx) : void 0;
};
export {
  _sfc_main as default
};
