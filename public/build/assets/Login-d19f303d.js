import{g as x,i as b,B as k,u as s,o as m,c as d,C as y,z as v,a as t,w as i,F as V,X as B,k as c,t as C,y as p,d as l,j as $,b as f,n as L,A}from"./app-85d7689a.js";import{G as F,A as N}from"./ApplicationLogo-41bd6cf0.js";import{_,a as g,b as w}from"./TextInput-4ceddd6b.js";import{_ as R}from"./PrimaryButton-b74a3d96.js";import"./_plugin-vue_export-helper-c27b6911.js";const S=["value"],U={__name:"Checkbox",props:{checked:{type:[Array,Boolean],default:!1},value:{default:null}},emits:["update:checked"],setup(r,{emit:e}){const u=r,n=x({get(){return u.checked},set(a){e("update:checked",a)}});return(a,o)=>b((m(),d("input",{type:"checkbox",value:r.value,"onUpdate:modelValue":o[0]||(o[0]=h=>y(n)?n.value=h:null),class:"text-indigo-600"},null,8,S)),[[k,s(n)]])}},j={key:0,class:"mb-4 text-sm font-medium text-green-600"},q=["onSubmit"],P={class:"mt-3"},z={class:"mt-4 flex justify-between"},D={class:"inline-flex items-center"},E=l("span",{class:"mx-2 text-sm text-gray-600"},"Remember me",-1),G={class:"mt-6"},J={__name:"Login",props:{canResetPassword:Boolean,status:String},setup(r){const e=v({email:"",password:"",remember:!1}),u=()=>{e.post(route("login"),{onFinish:()=>e.reset("password")})};return(n,a)=>(m(),d(V,null,[t(s(B),{title:"Log in"}),t(F,null,{default:i(()=>[t(s(c),{href:"/",class:"flex items-center justify-center"},{default:i(()=>[t(N,{class:"h-20 w-20 fill-current text-gray-500"})]),_:1}),r.status?(m(),d("div",j,C(r.status),1)):p("",!0),l("form",{onSubmit:A(u,["prevent"])},[l("div",null,[t(_,{for:"email",value:"Email"}),t(g,{id:"email",type:"email",class:"mt-1 block w-full",modelValue:s(e).email,"onUpdate:modelValue":a[0]||(a[0]=o=>s(e).email=o),required:"",autofocus:"",autocomplete:"username"},null,8,["modelValue"]),t(w,{class:"mt-2",message:s(e).errors.email},null,8,["message"])]),l("div",P,[t(_,{for:"password",value:"Password"}),t(g,{id:"password",type:"password",class:"mt-1 block w-full",modelValue:s(e).password,"onUpdate:modelValue":a[1]||(a[1]=o=>s(e).password=o),required:"",autocomplete:"current-password"},null,8,["modelValue"]),t(w,{class:"mt-2",message:s(e).errors.password},null,8,["message"])]),l("div",z,[l("label",D,[t(U,{name:"remember",checked:s(e).remember,"onUpdate:checked":a[2]||(a[2]=o=>s(e).remember=o)},null,8,["checked"]),E]),r.canResetPassword?(m(),$(s(c),{key:0,href:n.route("password.request"),class:"text-sm text-gray-600 underline hover:text-gray-900"},{default:i(()=>[f(" Forgot your password? ")]),_:1},8,["href"])):p("",!0)]),l("div",G,[t(R,{class:L(["w-full",{"opacity-25":s(e).processing}]),disabled:s(e).processing},{default:i(()=>[f(" Log in ")]),_:1},8,["class","disabled"])])],40,q)]),_:1})],64))}};export{J as default};
