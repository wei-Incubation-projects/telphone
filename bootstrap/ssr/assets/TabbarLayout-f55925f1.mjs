import { Tabbar, TabbarItem } from "vant/es/index.mjs";
import "vant/es/tabbar-item/style/index.mjs";
import "vant/es/tabbar/style/index.mjs";
import { mergeProps, isRef, withCtx, createTextVNode, createVNode, useSSRContext } from "vue";
import { ssrRenderComponent } from "vue/server-renderer";
import { Inertia } from "@inertiajs/inertia";
const _sfc_main = {
  __name: "TabbarLayout",
  __ssrInlineRender: true,
  props: {
    active: Number
  },
  setup(__props) {
    const changeTab = (e) => {
      console.log(e);
      switch (e) {
        case 0:
          Inertia.visit(route("dashboard"));
          break;
        case 1:
          Inertia.visit(route("recall"));
          break;
        case 2:
          Inertia.visit(route("mine"));
          break;
      }
    };
    return (_ctx, _push, _parent, _attrs) => {
      const _component_van_tabbar = Tabbar;
      const _component_van_tabbar_item = TabbarItem;
      _push(ssrRenderComponent(_component_van_tabbar, mergeProps({
        modelValue: __props.active,
        "onUpdate:modelValue": ($event) => isRef(active) ? active.value = $event : null,
        onChange: changeTab
      }, _attrs), {
        default: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(ssrRenderComponent(_component_van_tabbar_item, { icon: "home-o" }, {
              default: withCtx((_2, _push3, _parent3, _scopeId2) => {
                if (_push3) {
                  _push3(`工作台`);
                } else {
                  return [
                    createTextVNode("工作台")
                  ];
                }
              }),
              _: 1
            }, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_van_tabbar_item, { icon: "search" }, {
              default: withCtx((_2, _push3, _parent3, _scopeId2) => {
                if (_push3) {
                  _push3(`复播`);
                } else {
                  return [
                    createTextVNode("复播")
                  ];
                }
              }),
              _: 1
            }, _parent2, _scopeId));
            _push2(ssrRenderComponent(_component_van_tabbar_item, { icon: "friends-o" }, {
              default: withCtx((_2, _push3, _parent3, _scopeId2) => {
                if (_push3) {
                  _push3(`我的`);
                } else {
                  return [
                    createTextVNode("我的")
                  ];
                }
              }),
              _: 1
            }, _parent2, _scopeId));
          } else {
            return [
              createVNode(_component_van_tabbar_item, { icon: "home-o" }, {
                default: withCtx(() => [
                  createTextVNode("工作台")
                ]),
                _: 1
              }),
              createVNode(_component_van_tabbar_item, { icon: "search" }, {
                default: withCtx(() => [
                  createTextVNode("复播")
                ]),
                _: 1
              }),
              createVNode(_component_van_tabbar_item, { icon: "friends-o" }, {
                default: withCtx(() => [
                  createTextVNode("我的")
                ]),
                _: 1
              })
            ];
          }
        }),
        _: 1
      }, _parent));
    };
  }
};
const _sfc_setup = _sfc_main.setup;
_sfc_main.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/Layouts/TabbarLayout.vue");
  return _sfc_setup ? _sfc_setup(props, ctx) : void 0;
};
export {
  _sfc_main as _
};
