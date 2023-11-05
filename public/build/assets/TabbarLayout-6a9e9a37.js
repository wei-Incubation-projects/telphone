import{q as N,G as R,c as k,t as I,n as P,y as w,a as j,u as E,i as M,O as z,w as y,e as U,r as q,b as D,d as F,U as G,x as K,I as L}from"./index-edc88e3e.js";import{l as T,m as Y,a as r,p as Z,h as H,E as J,o as Q,c as W,w as d,u as _,k as p,d as x,j as X}from"./app-f6549e92.js";function ee(e,{args:s=[],done:a,canceled:t}){if(e){const c=e.apply(null,s);N(c)?c.then(l=>{l?a():t&&t()}).catch(R):c?a():t&&t()}else a()}const[A,V]=k("tabbar"),ae={route:Boolean,fixed:I,border:I,zIndex:P,placeholder:Boolean,activeColor:String,beforeChange:Function,inactiveColor:String,modelValue:w(0),safeAreaInsetBottom:{type:Boolean,default:null}},O=Symbol(A);var te=T({name:A,props:ae,emits:["change","update:modelValue"],setup(e,{emit:s,slots:a}){const t=Y(),{linkChildren:c}=j(O),l=E(t,V),v=()=>{var n;return(n=e.safeAreaInsetBottom)!=null?n:e.fixed},i=()=>{var n;const{fixed:o,zIndex:u,border:m}=e;return r("div",{ref:t,role:"tablist",style:M(u),class:[V({fixed:o}),{[z]:m,"van-safe-area-bottom":v()}]},[(n=a.default)==null?void 0:n.call(a)])};return c({props:e,setActive:(n,o)=>{ee(e.beforeChange,{args:[n],done(){s("update:modelValue",n),s("change",n),o()}})}}),()=>e.fixed&&e.placeholder?l(i):i()}});const ne=y(te),[oe,g]=k("tabbar-item"),re=U({},q,{dot:Boolean,icon:String,name:P,badge:P,badgeProps:Object,iconPrefix:String});var se=T({name:oe,props:re,emits:["click"],setup(e,{emit:s,slots:a}){const t=D(),c=Z().proxy,{parent:l,index:v}=F(O);if(!l)return;const i=H(()=>{var o;const{route:u,modelValue:m}=l.props;if(u&&"$route"in c){const{$route:h}=c,{to:b}=e,f=K(b)?b:{path:b};return!!h.matched.find(C=>{const S="path"in f&&f.path===C.path,$="name"in f&&f.name===C.name;return S||$})}return((o=e.name)!=null?o:v.value)===m}),B=o=>{var u;i.value||l.setActive((u=e.name)!=null?u:v.value,t),s("click",o)},n=()=>{if(a.icon)return a.icon({active:i.value});if(e.icon)return r(L,{name:e.icon,classPrefix:e.iconPrefix},null)};return()=>{var o;const{dot:u,badge:m}=e,{activeColor:h,inactiveColor:b}=l.props,f=i.value?h:b;return r("div",{role:"tab",class:g({active:i.value}),style:{color:f},tabindex:0,"aria-selected":i.value,onClick:B},[r(G,J({dot:u,class:g("icon"),content:m},e.badgeProps),{default:n}),r("div",{class:g("text")},[(o=a.default)==null?void 0:o.call(a,{active:i.value})])])}}});const ce=y(se);const ue={__name:"TabbarLayout",props:{active:Number},setup(e){return(s,a)=>{const t=ce,c=ne;return Q(),W(c,{modelValue:e.active,"onUpdate:modelValue":a[0]||(a[0]=l=>X(active)?active.value=l:null)},{default:d(()=>[r(t,{icon:"home-o"},{default:d(()=>[r(_(p),{href:s.route("dashboard")},{default:d(()=>[x("工作台")]),_:1},8,["href"])]),_:1}),r(t,{icon:"search"},{default:d(()=>[r(_(p),{href:s.route("recall")},{default:d(()=>[x("复播")]),_:1},8,["href"])]),_:1}),r(t,{icon:"friends-o"},{default:d(()=>[r(_(p),{href:s.route("mine")},{default:d(()=>[x("我的")]),_:1},8,["href"])]),_:1})]),_:1},8,["modelValue"])}}};export{ue as _,ee as c};
