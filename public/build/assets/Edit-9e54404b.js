import{A as E}from"./ApplicationLogo-fb3c38c2.js";import{A as B,Q as D,h as v,m as L,o as d,f as h,b as e,r as f,i as $,y as k,a as o,w as a,n as c,u as r,T as M,c as y,k as _,d as u,t as x,g as N,F as V,X as S}from"./app-f6549e92.js";import j from"./DeleteUserForm-aa2c4c5e.js";import z from"./UpdatePasswordForm-d2861cc1.js";import A from"./UpdateProfileInformationForm-7226877c.js";import"./TextInput-9905761f.js";import"./PrimaryButton-424eaa8d.js";const P={class:"relative"},O={__name:"Dropdown",props:{align:{default:"right"},width:{default:"48"},contentClasses:{default:()=>["py-1","bg-white"]}},setup(n){const s=n,t=g=>{l.value&&g.key==="Escape"&&(l.value=!1)};B(()=>document.addEventListener("keydown",t)),D(()=>document.removeEventListener("keydown",t));const i=v(()=>({48:"w-48"})[s.width.toString()]),p=v(()=>s.align==="left"?"origin-top-left left-0":s.align==="right"?"origin-top-right right-0":"origin-top"),l=L(!1);return(g,m)=>(d(),h("div",P,[e("div",{onClick:m[0]||(m[0]=w=>l.value=!l.value)},[f(g.$slots,"trigger")]),$(e("div",{class:"fixed inset-0 z-40",onClick:m[1]||(m[1]=w=>l.value=!1)},null,512),[[k,l.value]]),o(M,{"enter-active-class":"transition ease-out duration-200","enter-from-class":"transform opacity-0 scale-95","enter-to-class":"transform opacity-100 scale-100","leave-active-class":"transition ease-in duration-75","leave-from-class":"transform opacity-100 scale-100","leave-to-class":"transform opacity-0 scale-95"},{default:a(()=>[$(e("div",{class:c(["absolute z-50 mt-2 rounded-md shadow-lg",[r(i),r(p)]]),style:{display:"none"},onClick:m[2]||(m[2]=w=>l.value=!1)},[e("div",{class:c(["rounded-md ring-1 ring-black ring-opacity-5",n.contentClasses])},[f(g.$slots,"content")],2)],2),[[k,l.value]])]),_:3})]))}},C={__name:"DropdownLink",setup(n){return(s,t)=>(d(),y(r(_),{class:"block w-full px-4 py-2 text-left text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out"},{default:a(()=>[f(s.$slots,"default")]),_:3}))}},T={__name:"NavLink",props:["href","active"],setup(n){const s=n,t=v(()=>s.active?"inline-flex items-center px-1 pt-1 border-b-2 border-indigo-400 text-sm font-medium leading-5 text-gray-900 focus:outline-none focus:border-indigo-700 transition duration-150 ease-in-out":"inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out");return(i,p)=>(d(),y(r(_),{href:n.href,class:c(r(t))},{default:a(()=>[f(i.$slots,"default")]),_:3},8,["href","class"]))}},b={__name:"ResponsiveNavLink",props:["href","active"],setup(n){const s=n,t=v(()=>s.active?"block w-full pl-3 pr-4 py-2 border-l-4 border-indigo-400 text-left text-base font-medium text-indigo-700 bg-indigo-50 focus:outline-none focus:text-indigo-800 focus:bg-indigo-100 focus:border-indigo-700 transition duration-150 ease-in-out":"block w-full pl-3 pr-4 py-2 border-l-4 border-transparent text-left text-base font-medium text-gray-600 hover:text-gray-800 hover:bg-gray-50 hover:border-gray-300 focus:outline-none focus:text-gray-800 focus:bg-gray-50 focus:border-gray-300 transition duration-150 ease-in-out");return(i,p)=>(d(),y(r(_),{href:n.href,class:c(r(t))},{default:a(()=>[f(i.$slots,"default")]),_:3},8,["href","class"]))}},F={class:"min-h-screen bg-gray-100"},Q={class:"bg-white border-b border-gray-100"},R={class:"max-w-7xl mx-auto px-4 sm:px-6 lg:px-8"},U={class:"flex justify-between h-16"},X={class:"flex"},q={class:"shrink-0 flex items-center"},G={class:"hidden space-x-8 sm:-my-px sm:ml-10 sm:flex"},H={class:"hidden sm:flex sm:items-center sm:ml-6"},I={class:"ml-3 relative"},J={class:"inline-flex rounded-md"},K={type:"button",class:"inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150"},W=e("svg",{class:"ml-2 -mr-0.5 h-4 w-4",xmlns:"http://www.w3.org/2000/svg",viewBox:"0 0 20 20",fill:"currentColor"},[e("path",{"fill-rule":"evenodd",d:"M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z","clip-rule":"evenodd"})],-1),Y={class:"-mr-2 flex items-center sm:hidden"},Z={class:"h-6 w-6",stroke:"currentColor",fill:"none",viewBox:"0 0 24 24"},ee={class:"pt-2 pb-3 space-y-1"},te={class:"pt-4 pb-1 border-t border-gray-200"},se={class:"px-4"},oe={class:"font-medium text-base text-gray-800"},ae={class:"font-medium text-sm text-gray-500"},ne={class:"mt-3 space-y-1"},re={key:0,class:"bg-white shadow"},ie={class:"max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8"},le={__name:"AuthenticatedLayout",setup(n){const s=L(!1);return(t,i)=>(d(),h("div",null,[e("div",F,[e("nav",Q,[e("div",R,[e("div",U,[e("div",X,[e("div",q,[o(r(_),{href:t.route("dashboard")},{default:a(()=>[o(E,{class:"block h-9 w-auto fill-current text-gray-800"})]),_:1},8,["href"])]),e("div",G,[o(T,{href:t.route("dashboard"),active:t.route().current("dashboard")},{default:a(()=>[u(" Dashboard ")]),_:1},8,["href","active"])])]),e("div",H,[e("div",I,[o(O,{align:"right",width:"48"},{trigger:a(()=>[e("span",J,[e("button",K,[u(x(t.$page.props.auth.user.name)+" ",1),W])])]),content:a(()=>[o(C,{href:t.route("profile.edit")},{default:a(()=>[u(" Profile ")]),_:1},8,["href"]),o(C,{href:t.route("logout"),method:"post",as:"button"},{default:a(()=>[u(" Log Out ")]),_:1},8,["href"])]),_:1})])]),e("div",Y,[e("button",{onClick:i[0]||(i[0]=p=>s.value=!s.value),class:"inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out"},[(d(),h("svg",Z,[e("path",{class:c({hidden:s.value,"inline-flex":!s.value}),"stroke-linecap":"round","stroke-linejoin":"round","stroke-width":"2",d:"M4 6h16M4 12h16M4 18h16"},null,2),e("path",{class:c({hidden:!s.value,"inline-flex":s.value}),"stroke-linecap":"round","stroke-linejoin":"round","stroke-width":"2",d:"M6 18L18 6M6 6l12 12"},null,2)]))])])])]),e("div",{class:c([{block:s.value,hidden:!s.value},"sm:hidden"])},[e("div",ee,[o(b,{href:t.route("dashboard"),active:t.route().current("dashboard")},{default:a(()=>[u(" Dashboard ")]),_:1},8,["href","active"])]),e("div",te,[e("div",se,[e("div",oe,x(t.$page.props.auth.user.name),1),e("div",ae,x(t.$page.props.auth.user.email),1)]),e("div",ne,[o(b,{href:t.route("profile.edit")},{default:a(()=>[u(" Profile ")]),_:1},8,["href"]),o(b,{href:t.route("logout"),method:"post",as:"button"},{default:a(()=>[u(" Log Out ")]),_:1},8,["href"])])])],2)]),t.$slots.header?(d(),h("header",re,[e("div",ie,[f(t.$slots,"header")])])):N("",!0),e("main",null,[f(t.$slots,"default")])])]))}},de=e("h2",{class:"font-semibold text-xl text-gray-800 leading-tight"},"Profile",-1),ue={class:"py-12"},ce={class:"max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6"},fe={class:"p-4 sm:p-8 bg-white shadow sm:rounded-lg"},me={class:"p-4 sm:p-8 bg-white shadow sm:rounded-lg"},he={class:"p-4 sm:p-8 bg-white shadow sm:rounded-lg"},we={__name:"Edit",props:{mustVerifyEmail:Boolean,status:String},setup(n){return(s,t)=>(d(),h(V,null,[o(r(S),{title:"Profile"}),o(le,null,{header:a(()=>[de]),default:a(()=>[e("div",ue,[e("div",ce,[e("div",fe,[o(A,{"must-verify-email":n.mustVerifyEmail,status:n.status,class:"max-w-xl"},null,8,["must-verify-email","status"])]),e("div",me,[o(z,{class:"max-w-xl"})]),e("div",he,[o(j,{class:"max-w-xl"})])])])]),_:1})],64))}};export{we as default};
