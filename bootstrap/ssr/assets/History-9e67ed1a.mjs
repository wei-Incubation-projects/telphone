import { NavBar, Space, CellGroup, Cell } from "vant/es/index.mjs";
import "vant/es/cell/style/index.mjs";
import "vant/es/cell-group/style/index.mjs";
import "vant/es/space/style/index.mjs";
import "vant/es/nav-bar/style/index.mjs";
import { ref, unref, withCtx, openBlock, createBlock, Fragment, renderList, createVNode, useSSRContext } from "vue";
import { ssrRenderComponent, ssrRenderList } from "vue/server-renderer";
import { Head } from "@inertiajs/vue3";
import { Inertia } from "@inertiajs/inertia";
const _sfc_main = {
  __name: "History",
  __ssrInlineRender: true,
  props: {
    telHistory: Array
  },
  setup(__props) {
    const props = __props;
    const title = ref("拨打历史");
    const onClickLeft = () => {
      Inertia.get(route("mine"));
    };
    console.log(props.telHistory);
    return (_ctx, _push, _parent, _attrs) => {
      const _component_van_nav_bar = NavBar;
      const _component_van_space = Space;
      const _component_van_cell_group = CellGroup;
      const _component_van_cell = Cell;
      _push(`<!--[-->`);
      _push(ssrRenderComponent(unref(Head), { title: title.value }, null, _parent));
      _push(`<div class="w-full min-h-screen bg-gray-200 flex flex-col">`);
      _push(ssrRenderComponent(_component_van_nav_bar, {
        title: title.value,
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
            _push2(ssrRenderComponent(_component_van_cell_group, { inset: "" }, {
              default: withCtx((_2, _push3, _parent3, _scopeId2) => {
                if (_push3) {
                  _push3(`<!--[-->`);
                  ssrRenderList(__props.telHistory, (item, key) => {
                    _push3(ssrRenderComponent(_component_van_cell, {
                      title: item.phone,
                      value: item.status,
                      label: item.remark,
                      key
                    }, null, _parent3, _scopeId2));
                  });
                  _push3(`<!--]-->`);
                } else {
                  return [
                    (openBlock(true), createBlock(Fragment, null, renderList(__props.telHistory, (item, key) => {
                      return openBlock(), createBlock(_component_van_cell, {
                        title: item.phone,
                        value: item.status,
                        label: item.remark,
                        key
                      }, null, 8, ["title", "value", "label"]);
                    }), 128))
                  ];
                }
              }),
              _: 1
            }, _parent2, _scopeId));
          } else {
            return [
              createVNode(_component_van_cell_group, { inset: "" }, {
                default: withCtx(() => [
                  (openBlock(true), createBlock(Fragment, null, renderList(__props.telHistory, (item, key) => {
                    return openBlock(), createBlock(_component_van_cell, {
                      title: item.phone,
                      value: item.status,
                      label: item.remark,
                      key
                    }, null, 8, ["title", "value", "label"]);
                  }), 128))
                ]),
                _: 1
              })
            ];
          }
        }),
        _: 1
      }, _parent));
      _push(`</div><!--]-->`);
    };
  }
};
const _sfc_setup = _sfc_main.setup;
_sfc_main.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/Pages/History.vue");
  return _sfc_setup ? _sfc_setup(props, ctx) : void 0;
};
export {
  _sfc_main as default
};
