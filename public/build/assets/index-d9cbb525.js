import{c as y,u as R,n as I,t as g,i as $,H as h,S as C,I as P,w as x}from"./index-86cd2bc1.js";import{l as A,m as _,a,h as L,F as m,L as N,M as E}from"./app-f5719aea.js";const[M,i]=y("nav-bar"),F={title:String,fixed:Boolean,zIndex:I,border:g,leftText:String,rightText:String,leftArrow:Boolean,placeholder:Boolean,safeAreaInsetTop:Boolean,clickable:g};var O=A({name:M,props:F,emits:["clickLeft","clickRight"],setup(e,{emit:r,slots:t}){const l=_(),d=R(l,i),n=f=>r("clickLeft",f),c=f=>r("clickRight",f),o=()=>t.left?t.left():[e.leftArrow&&a(P,{class:i("arrow"),name:"arrow-left"},null),e.leftText&&a("span",{class:i("text")},[e.leftText])],s=()=>t.right?t.right():a("span",{class:i("text")},[e.rightText]),u=()=>{const{title:f,fixed:T,border:k,zIndex:w}=e,S=$(w),b=e.leftArrow||e.leftText||t.left,z=e.rightText||t.right;return a("div",{ref:l,style:S,class:[i({fixed:T}),{[C]:k,"van-safe-area-top":e.safeAreaInsetTop}]},[a("div",{class:i("content")},[b&&a("div",{class:[i("left"),e.clickable?h:""],onClick:n},[o()]),a("div",{class:[i("title"),"van-ellipsis"]},[t.title?t.title():f]),z&&a("div",{class:[i("right"),e.clickable?h:""],onClick:c},[s()])])])};return()=>e.fixed&&e.placeholder?d(u):u()}});const j=x(O),[v,D]=y("space"),H={align:String,direction:{type:String,default:"horizontal"},size:{type:[Number,String,Array],default:8},wrap:Boolean,fill:Boolean};function B(e=[]){const r=[];return e.forEach(t=>{Array.isArray(t)?r.push(...t):t.type===m?r.push(...B(t.children)):r.push(t)}),r.filter(t=>{var l;return!(t&&(t.type===N||t.type===m&&((l=t.children)==null?void 0:l.length)===0||t.type===E&&t.children.trim()===""))})}var K=A({name:v,props:H,setup(e,{slots:r}){const t=L(()=>{var n;return(n=e.align)!=null?n:e.direction==="horizontal"?"center":""}),l=n=>typeof n=="number"?n+"px":n,d=n=>{const c={},o=`${l(Array.isArray(e.size)?e.size[0]:e.size)}`,s=`${l(Array.isArray(e.size)?e.size[1]:e.size)}`;return n?e.wrap?{marginBottom:s}:{}:(e.direction==="horizontal"&&(c.marginRight=o),(e.direction==="vertical"||e.wrap)&&(c.marginBottom=s),c)};return()=>{var n;const c=B((n=r.default)==null?void 0:n.call(r));return a("div",{class:[D({[e.direction]:e.direction,[`align-${t.value}`]:t.value,wrap:e.wrap,fill:e.fill})]},[c.map((o,s)=>a("div",{key:`item-${s}`,class:`${v}-item`,style:d(s===c.length-1)},[o]))])}}});const q=x(K);export{j as N,q as S};
