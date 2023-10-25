import{h as k,i as w,v as x,u as s,o as d,f as h,j as v,P as y,c as i,w as u,a,X as V,t as $,g as c,b as r,k as B,d as f,n as C,e as N}from"./app-4246e884.js";import{_ as R}from"./GuestLayout-c8b4ed87.js";import{_ as p,a as _,b as g}from"./TextInput-cf4d2d03.js";import{_ as S}from"./PrimaryButton-843ae574.js";import"./ApplicationLogo-99fd0dd0.js";const U=["value"],q={__name:"Checkbox",props:{checked:{type:[Array,Boolean],default:!1},value:{default:null}},emits:["update:checked"],setup(l,{emit:e}){const m=l,n=k({get(){return m.checked},set(t){e("update:checked",t)}});return(t,o)=>w((d(),h("input",{type:"checkbox",value:l.value,"onUpdate:modelValue":o[0]||(o[0]=b=>v(n)?n.value=b:null),class:"rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500"},null,8,U)),[[x,s(n)]])}},P={key:0,class:"mb-4 font-medium text-sm text-green-600"},j=["onSubmit"],D={class:"mt-4"},F={class:"block mt-4"},L={class:"flex items-center"},M=r("span",{class:"ml-2 text-sm text-gray-600"},"Remember me",-1),z={class:"flex items-center justify-end mt-4"},H={__name:"Login",props:{canResetPassword:Boolean,status:String},setup(l){const e=y({username:"",password:"",remember:!1}),m=()=>{e.post(route("login"),{onFinish:()=>e.reset("password")})};return(n,t)=>(d(),i(R,null,{default:u(()=>[a(s(V),{title:"Log in"}),l.status?(d(),h("div",P,$(l.status),1)):c("",!0),r("form",{onSubmit:N(m,["prevent"])},[r("div",null,[a(p,{for:"email",value:"账号"}),a(_,{id:"email",type:"text",class:"mt-1 block w-full",modelValue:s(e).username,"onUpdate:modelValue":t[0]||(t[0]=o=>s(e).username=o),required:"",autofocus:"",autocomplete:"username"},null,8,["modelValue"]),a(g,{class:"mt-2",message:s(e).errors.username},null,8,["message"])]),r("div",D,[a(p,{for:"password",value:"密码"}),a(_,{id:"password",type:"password",class:"mt-1 block w-full",modelValue:s(e).password,"onUpdate:modelValue":t[1]||(t[1]=o=>s(e).password=o),required:"",autocomplete:"current-password"},null,8,["modelValue"]),a(g,{class:"mt-2",message:s(e).errors.password},null,8,["message"])]),r("div",F,[r("label",L,[a(q,{name:"remember",checked:s(e).remember,"onUpdate:checked":t[2]||(t[2]=o=>s(e).remember=o)},null,8,["checked"]),M])]),r("div",z,[l.canResetPassword?(d(),i(s(B),{key:0,href:n.route("password.request"),class:"underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"},{default:u(()=>[f(" Forgot your password? ")]),_:1},8,["href"])):c("",!0),a(S,{class:C(["ml-4",{"opacity-25":s(e).processing}]),disabled:s(e).processing},{default:u(()=>[f(" 登录 ")]),_:1},8,["class","disabled"])])],40,j)]),_:1}))}};export{H as default};
