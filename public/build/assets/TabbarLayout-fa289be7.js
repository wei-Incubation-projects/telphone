import{q as $,G as w,c as k,t as C,n as g,y as N,a as R,u as j,i as E,O as M,w as V,e as z,r as q,b as D,d as F,V as G,x as K,I as L,Q as _}from"./index-bf6d7aab.js";import{l as T,m as Q,a as u,p as U,h as Y,E as Z,o as H,c as J,w as v,d as p,j as W}from"./app-5ed735bf.js";function X(e,{args:i=[],done:a,canceled:t}){if(e){const n=e.apply(null,i);$(n)?n.then(s=>{s?a():t&&t()}).catch(w):n?a():t&&t()}else a()}const[y,B]=k("tabbar"),ee={route:Boolean,fixed:C,border:C,zIndex:g,placeholder:Boolean,activeColor:String,beforeChange:Function,inactiveColor:String,modelValue:N(0),safeAreaInsetBottom:{type:Boolean,default:null}},A=Symbol(y);var ae=T({name:y,props:ee,emits:["change","update:modelValue"],setup(e,{emit:i,slots:a}){const t=Q(),{linkChildren:n}=R(A),s=j(t,B),d=()=>{var o;return(o=e.safeAreaInsetBottom)!=null?o:e.fixed},c=()=>{var o;const{fixed:r,zIndex:l,border:f}=e;return u("div",{ref:t,role:"tablist",style:E(l),class:[B({fixed:r}),{[M]:f,"van-safe-area-bottom":d()}]},[(o=a.default)==null?void 0:o.call(a)])};return n({props:e,setActive:(o,r)=>{X(e.beforeChange,{args:[o],done(){i("update:modelValue",o),i("change",o),r()}})}}),()=>e.fixed&&e.placeholder?s(c):c()}});const te=V(ae),[ne,x]=k("tabbar-item"),oe=z({},q,{dot:Boolean,icon:String,name:g,badge:g,badgeProps:Object,iconPrefix:String});var re=T({name:ne,props:oe,emits:["click"],setup(e,{emit:i,slots:a}){const t=D(),n=U().proxy,{parent:s,index:d}=F(A);if(!s)return;const c=Y(()=>{var r;const{route:l,modelValue:f}=s.props;if(l&&"$route"in n){const{$route:h}=n,{to:b}=e,m=K(b)?b:{path:b};return!!h.matched.find(I=>{const O="path"in m&&m.path===I.path,S="name"in m&&m.name===I.name;return O||S})}return((r=e.name)!=null?r:d.value)===f}),P=r=>{var l;c.value||s.setActive((l=e.name)!=null?l:d.value,t),i("click",r)},o=()=>{if(a.icon)return a.icon({active:c.value});if(e.icon)return u(L,{name:e.icon,classPrefix:e.iconPrefix},null)};return()=>{var r;const{dot:l,badge:f}=e,{activeColor:h,inactiveColor:b}=s.props,m=c.value?h:b;return u("div",{role:"tab",class:x({active:c.value}),style:{color:m},tabindex:0,"aria-selected":c.value,onClick:P},[u(G,Z({dot:l,class:x("icon"),content:f},e.badgeProps),{default:o}),u("div",{class:x("text")},[(r=a.default)==null?void 0:r.call(a,{active:c.value})])])}}});const se=V(re);const le={__name:"TabbarLayout",props:{active:Number},setup(e){const i=a=>{switch(console.log(a),a){case 0:_.Inertia.visit(route("dashboard"));break;case 1:_.Inertia.visit(route("recall"));break;case 2:_.Inertia.visit(route("mine"));break}};return(a,t)=>{const n=se,s=te;return H(),J(s,{modelValue:e.active,"onUpdate:modelValue":t[0]||(t[0]=d=>W(active)?active.value=d:null),onChange:i},{default:v(()=>[u(n,{icon:"home-o"},{default:v(()=>[p("工作台")]),_:1}),u(n,{icon:"search"},{default:v(()=>[p("复播")]),_:1}),u(n,{icon:"friends-o"},{default:v(()=>[p("我的")]),_:1})]),_:1},8,["modelValue"])}}};export{le as _,X as c};
