import{c as h,e as C,G as D,n as c,m as w,h as $,w as P,z as A,A as V,o as q,u as g,k as m,I as y}from"./TabbarLayout-96f9dc38.js";import{a as l,p as k,h as N}from"./app-4ebb1adc.js";const[R,o]=h("loading"),T=Array(12).fill(null).map((e,n)=>l("i",{class:o("line",String(n+1))},null)),G=l("svg",{class:o("circular"),viewBox:"25 25 50 50"},[l("circle",{cx:"50",cy:"50",r:"20",fill:"none"},null)]),U={size:c,type:w("circular"),color:String,vertical:Boolean,textSize:c,textColor:String};var j=k({name:R,props:U,setup(e,{slots:n}){const s=N(()=>C({color:e.color},D(e.size))),u=()=>{const a=e.type==="spinner"?T:G;return l("span",{class:o("spinner",e.type),style:s.value},[n.icon?n.icon():a])},d=()=>{var a;if(n.default)return l("span",{class:o("text"),style:{fontSize:$(e.textSize),color:(a=e.textColor)!=null?a:e.color}},[n.default()])};return()=>{const{type:a,vertical:f}=e;return l("div",{class:o([a,{vertical:f}]),"aria-live":"polite","aria-busy":!0},[u(),d()])}}});const O=P(j),[E,r]=h("cell"),F={tag:w("div"),icon:String,size:String,title:c,value:c,label:c,center:Boolean,isLink:Boolean,border:q,required:Boolean,iconPrefix:String,valueClass:g,labelClass:g,titleClass:g,titleStyle:null,arrowDirection:String,clickable:{type:Boolean,default:null}},H=C({},F,A);var J=k({name:E,props:H,setup(e,{slots:n}){const s=V(),u=()=>{if(n.label||m(e.label))return l("div",{class:[r("label"),e.labelClass]},[n.label?n.label():e.label])},d=()=>{var t;if(n.title||m(e.title)){const i=(t=n.title)==null?void 0:t.call(n);return Array.isArray(i)&&i.length===0?void 0:l("div",{class:[r("title"),e.titleClass],style:e.titleStyle},[i||l("span",null,[e.title]),u()])}},a=()=>{const t=n.value||n.default;if(t||m(e.value))return l("div",{class:[r("value"),e.valueClass]},[t?t():l("span",null,[e.value])])},f=()=>{if(n.icon)return n.icon();if(e.icon)return l(y,{name:e.icon,class:r("left-icon"),classPrefix:e.iconPrefix},null)},z=()=>{if(n["right-icon"])return n["right-icon"]();if(e.isLink){const t=e.arrowDirection&&e.arrowDirection!=="right"?`arrow-${e.arrowDirection}`:"arrow";return l(y,{name:t,class:r("right-icon")},null)}};return()=>{var t;const{tag:i,size:v,center:I,border:L,isLink:_,required:B}=e,b=(t=e.clickable)!=null?t:_,S={center:I,required:B,clickable:b,borderless:!L};return v&&(S[v]=!!v),l(i,{class:r(S),role:b?"button":void 0,tabindex:b?0:void 0,onClick:s},{default:()=>{var x;return[f(),d(),a(),z(),(x=n.extra)==null?void 0:x.call(n)]}})}}});const Q=P(J);export{Q as C,O as L,F as c};
