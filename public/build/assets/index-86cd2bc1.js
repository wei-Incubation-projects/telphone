import{S as $,Q as Y,h as w,m as p,G as D,q as H,j as oe,x as O,p as S,C as W,A as G,z as A,B as K,u as B,U as se,a as g,l as F,s as re,V as ue,E as ie}from"./app-f5719aea.js";function Xe(){}const ae=Object.assign,Z=typeof window<"u",R=e=>e!==null&&typeof e=="object",E=e=>e!=null,T=e=>typeof e=="function",et=e=>R(e)&&T(e.then)&&T(e.catch),q=e=>typeof e=="number"||/^\d+(\.\d+)?$/.test(e),ce=()=>Z?/ios|iphone|ipad|ipod/.test(navigator.userAgent.toLowerCase()):!1;function k(e,t){const n=t.split(".");let o=e;return n.forEach(s=>{var r;o=R(o)&&(r=o[s])!=null?r:""}),o}function tt(e,t,n){return t.reduce((o,s)=>((!n||e[s]!==void 0)&&(o[s]=e[s]),o),{})}const nt=e=>Array.isArray(e)?e:[e],ot=null,h=[Number,String],le={type:Boolean,default:!0},st=e=>({type:h,default:e}),v=e=>({type:String,default:e});var x=typeof window<"u",de=e=>e===window,N=(e,t)=>({top:0,left:0,right:e,bottom:t,width:e,height:t}),fe=e=>{const t=B(e);if(de(t)){const n=t.innerWidth,o=t.innerHeight;return N(n,o)}return t!=null&&t.getBoundingClientRect?t.getBoundingClientRect():N(0,0)};function rt(e){const t=$(e,null);if(t){const n=S(),{link:o,unlink:s,internalChildren:r}=t;o(n),Y(()=>s(n));const c=w(()=>r.indexOf(n));return{parent:t,index:c}}return{parent:null,index:p(-1)}}function me(e){const t=[],n=o=>{Array.isArray(o)&&o.forEach(s=>{var r;se(s)&&(t.push(s),(r=s.component)!=null&&r.subTree&&(t.push(s.component.subTree),n(s.component.subTree.children)),s.children&&n(s.children))})};return n(e),t}var I=(e,t)=>{const n=e.indexOf(t);return n===-1?e.findIndex(o=>t.key!==void 0&&t.key!==null&&o.type===t.type&&o.key===t.key):n};function ge(e,t,n){const o=me(e.subTree.children);n.sort((r,c)=>I(o,r.vnode)-I(o,c.vnode));const s=n.map(r=>r.proxy);t.sort((r,c)=>{const u=s.indexOf(r),i=s.indexOf(c);return u-i})}function ut(e){const t=D([]),n=D([]),o=S();return{children:t,linkChildren:r=>{W(e,Object.assign({link:i=>{i.proxy&&(n.push(i),t.push(i.proxy),ge(o,t,n))},unlink:i=>{const a=n.indexOf(i);t.splice(a,1),n.splice(a,1)},children:t,internalChildren:n},r))}}}function pe(e){let t;G(()=>{e(),A(()=>{t=!0})}),K(()=>{t&&e()})}function Ee(e,t,n={}){if(!x)return;const{target:o=window,passive:s=!1,capture:r=!1}=n;let c=!1,u;const i=l=>{if(c)return;const d=B(l);d&&!u&&(d.addEventListener(e,t,{capture:r,passive:s}),u=!0)},a=l=>{if(c)return;const d=B(l);d&&u&&(d.removeEventListener(e,t,r),u=!1)};Y(()=>a(o)),H(()=>a(o)),pe(()=>i(o));let m;return oe(o)&&(m=O(o,(l,d)=>{a(d),i(l)})),()=>{m==null||m(),a(o),c=!0}}function it(e,t,n={}){if(!x)return;const{eventName:o="click"}=n;Ee(o,r=>{(Array.isArray(e)?e:[e]).every(i=>{const a=B(i);return a&&!a.contains(r.target)})&&t(r)},{target:document})}var b,C;function he(){if(!b&&(b=p(0),C=p(0),x)){const e=()=>{b.value=window.innerWidth,C.value=window.innerHeight};e(),window.addEventListener("resize",e,{passive:!0}),window.addEventListener("orientationchange",e,{passive:!0})}return{width:b,height:C}}var ve=/scroll|auto|overlay/i,ye=x?window:void 0;function be(e){return e.tagName!=="HTML"&&e.tagName!=="BODY"&&e.nodeType===1}function at(e,t=ye){let n=e;for(;n&&n!==t&&be(n);){const{overflowY:o}=window.getComputedStyle(n);if(ve.test(o))return n;n=n.parentNode}return t}var ct=Symbol("van-field");function L(e,t){"scrollTop"in e?e.scrollTop=t:e.scrollTo(e.scrollX,t)}function Be(){return window.pageYOffset||document.documentElement.scrollTop||document.body.scrollTop||0}function we(e){L(window,e),L(document.body,e)}const Oe=ce();function lt(){Oe&&we(Be())}const xe=e=>e.stopPropagation();function dt(e,t){(typeof e.cancelable!="boolean"||e.cancelable)&&e.preventDefault(),t&&xe(e)}const{width:Ce,height:De}=he();function f(e){if(E(e))return q(e)?`${e}px`:String(e)}function ft(e){if(E(e)){if(Array.isArray(e))return{width:f(e[0]),height:f(e[1])};const t=f(e);return{width:t,height:t}}}function mt(e){const t={};return e!==void 0&&(t.zIndex=+e),t}const Ae=/-(\w)/g,J=e=>e.replace(Ae,(t,n)=>n.toUpperCase()),Te=e=>e.replace(/([A-Z])/g,"-$1").toLowerCase().replace(/^-/,"");function j(e,t,n){const o=e.indexOf(t);return o===-1?e:t==="-"&&o!==0?e.slice(0,o):e.slice(0,o+1)+e.slice(o).replace(n,"")}function gt(e,t=!0,n=!0){t?e=j(e,".",/\./g):e=e.split(".")[0],n?e=j(e,"-",/-/g):e=e.replace(/-/,"");const o=t?/[^-0-9.]/g:/[^-0-9]/g;return e.replace(o,"")}const{hasOwnProperty:Pe}=Object.prototype;function $e(e,t,n){const o=t[n];E(o)&&(!Pe.call(e,n)||!R(o)?e[n]=o:e[n]=Q(Object(e[n]),o))}function Q(e,t){return Object.keys(t).forEach(n=>{$e(e,t,n)}),e}var Se={name:"姓名",tel:"电话",save:"保存",clear:"清空",cancel:"取消",confirm:"确认",delete:"删除",loading:"加载中...",noCoupon:"暂无优惠券",nameEmpty:"请填写姓名",addContact:"添加联系人",telInvalid:"请填写正确的电话",vanCalendar:{end:"结束",start:"开始",title:"日期选择",weekdays:["日","一","二","三","四","五","六"],monthTitle:(e,t)=>`${e}年${t}月`,rangePrompt:e=>`最多选择 ${e} 天`},vanCascader:{select:"请选择"},vanPagination:{prev:"上一页",next:"下一页"},vanPullRefresh:{pulling:"下拉即可刷新...",loosing:"释放即可刷新..."},vanSubmitBar:{label:"合计:"},vanCoupon:{unlimited:"无门槛",discount:e=>`${e}折`,condition:e=>`满${e}元可用`},vanCouponCell:{title:"优惠券",count:e=>`${e}张可用`},vanCouponList:{exchange:"兑换",close:"不使用",enable:"可用",disabled:"不可用",placeholder:"输入优惠码"},vanAddressEdit:{area:"地区",areaEmpty:"请选择地区",addressEmpty:"请填写详细地址",addressDetail:"详细地址",defaultAddress:"设为默认收货地址"},vanAddressList:{add:"新增地址"}};const V=p("zh-CN"),M=D({"zh-CN":Se}),Fe={messages(){return M[V.value]},use(e,t){V.value=e,this.add({[e]:t})},add(e={}){Q(M,e)}};var Re=Fe;function _e(e){const t=J(e)+".";return(n,...o)=>{const s=Re.messages(),r=k(s,t+n)||k(s,n);return T(r)?r(...o):r}}function P(e,t){return t?typeof t=="string"?` ${e}--${t}`:Array.isArray(t)?t.reduce((n,o)=>n+P(e,o),""):Object.keys(t).reduce((n,o)=>n+(t[o]?P(e,o):""),""):""}function ke(e){return(t,n)=>(t&&typeof t!="string"&&(n=t,t=""),t=t?`${e}__${t}`:e,`${t}${P(t,n)}`)}function _(e){const t=`van-${e}`;return[t,ke(t),_e(t)]}const y="van-hairline",pt=`${y}--top`,Et=`${y}--left`,ht=`${y}--bottom`,vt=`${y}--surround`,yt=`${y}--top-bottom`,bt="van-haptics-feedback",Bt=Symbol("van-form"),wt=5;function X(e){return e.install=t=>{const{name:n}=e;n&&(t.component(n,e),t.component(J(`-${n}`),e))},e}const Ne=Symbol();function Ie(e){const t=$(Ne,null);t&&O(t,n=>{n&&e()})}const Le=(e,t)=>{const n=p(),o=()=>{n.value=fe(e).height};return G(()=>{if(A(o),t)for(let s=1;s<=3;s++)setTimeout(o,100*s)}),Ie(()=>A(o)),O([Ce,De],o),n};function Ot(e,t){const n=Le(e,!0);return o=>g("div",{class:t("placeholder"),style:{height:n.value?`${n.value}px`:void 0}},[o()])}const xt={to:[String,Object],url:String,replace:Boolean};function je({to:e,url:t,replace:n,$router:o}){e&&o?o[n?"replace":"push"](e):t&&(n?location.replace(t):location.href=t)}function Ct(){const e=S().proxy;return()=>je(e)}const[Ve,z]=_("badge"),Me={dot:Boolean,max:h,tag:v("div"),color:String,offset:Array,content:h,showZero:le,position:v("top-right")};var ze=F({name:Ve,props:Me,setup(e,{slots:t}){const n=()=>{if(t.content)return!0;const{content:u,showZero:i}=e;return E(u)&&u!==""&&(i||u!==0&&u!=="0")},o=()=>{const{dot:u,max:i,content:a}=e;if(!u&&n())return t.content?t.content():E(i)&&q(a)&&+a>+i?`${i}+`:a},s=u=>u.startsWith("-")?u.replace("-",""):`-${u}`,r=w(()=>{const u={background:e.color};if(e.offset){const[i,a]=e.offset,{position:m}=e,[l,d]=m.split("-");t.default?(typeof a=="number"?u[l]=f(l==="top"?a:-a):u[l]=l==="top"?f(a):s(a),typeof i=="number"?u[d]=f(d==="left"?i:-i):u[d]=d==="left"?f(i):s(i)):(u.marginTop=f(a),u.marginLeft=f(i))}return u}),c=()=>{if(n()||e.dot)return g("div",{class:z([e.position,{dot:e.dot,fixed:!!t.default}]),style:r.value},[o()])};return()=>{if(t.default){const{tag:u}=e;return g(u,{class:z("wrapper")},{default:()=>[t.default(),c()]})}return c()}}});const Ue=X(ze);let ee=2e3;const Dt=()=>++ee,Ye=e=>{ee=e},[te,He]=_("config-provider"),ne=Symbol(te),We={tag:v("div"),theme:v("light"),zIndex:Number,themeVars:Object,themeVarsDark:Object,themeVarsLight:Object,iconPrefix:String};function Ge(e){const t={};return Object.keys(e).forEach(n=>{t[`--van-${Te(n)}`]=e[n]}),t}F({name:te,props:We,setup(e,{slots:t}){const n=w(()=>Ge(ae({},e.themeVars,e.theme==="dark"?e.themeVarsDark:e.themeVarsLight)));if(Z){const o=()=>{document.documentElement.classList.add(`van-theme-${e.theme}`)},s=(r=e.theme)=>{document.documentElement.classList.remove(`van-theme-${r}`)};O(()=>e.theme,(r,c)=>{c&&s(c),o()},{immediate:!0}),K(o),H(s),re(s)}return W(ne,e),ue(()=>{e.zIndex!==void 0&&Ye(e.zIndex)}),()=>g(e.tag,{class:He(),style:n.value},{default:()=>{var o;return[(o=t.default)==null?void 0:o.call(t)]}})}});const[Ke,U]=_("icon"),Ze=e=>e==null?void 0:e.includes("/"),qe={dot:Boolean,tag:v("i"),name:String,size:h,badge:h,color:String,badgeProps:Object,classPrefix:String};var Je=F({name:Ke,props:qe,setup(e,{slots:t}){const n=$(ne,null),o=w(()=>e.classPrefix||(n==null?void 0:n.iconPrefix)||U());return()=>{const{tag:s,dot:r,name:c,size:u,badge:i,color:a}=e,m=Ze(c);return g(Ue,ie({dot:r,tag:s,class:[o.value,m?"":`${o.value}-${c}`],style:{color:a,fontSize:f(u)},content:i},e.badgeProps),{default:()=>{var l;return[(l=t.default)==null?void 0:l.call(t),m&&g("img",{class:U("image"),src:c},null)]}})}}});const At=X(Je);export{nt as A,gt as B,ct as C,lt as D,tt as E,Bt as F,Xe as G,bt as H,At as I,Et as J,pt as K,Z as L,it as M,xe as N,yt as O,Ne as P,ft as Q,vt as R,ht as S,wt as T,Ue as U,ut as a,Ct as b,_ as c,rt as d,ae as e,ot as f,at as g,Ee as h,mt as i,E as j,Dt as k,Be as l,v as m,h as n,pe as o,dt as p,et as q,xt as r,we as s,le as t,Ot as u,T as v,X as w,R as x,st as y,f as z};
