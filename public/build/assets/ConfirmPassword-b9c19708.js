import{z as c,c as m,a as s,u as o,w as t,F as d,o as u,X as f,d as a,n as p,b as _,A as w,l as b}from"./app-85d7689a.js";import{G as g,A as h}from"./ApplicationLogo-41bd6cf0.js";import{_ as x,a as y,b as v}from"./TextInput-4ceddd6b.js";import{_ as C}from"./PrimaryButton-b74a3d96.js";import"./_plugin-vue_export-helper-c27b6911.js";const V=a("div",{class:"mb-4 text-sm text-gray-600"}," This is a secure area of the application. Please confirm your password before continuing. ",-1),k=["onSubmit"],L={class:"mt-4 flex justify-end"},z={__name:"ConfirmPassword",setup(P){const e=c({password:""}),n=()=>{e.post(route("password.confirm"),{onFinish:()=>e.reset()})};return($,r)=>{const i=b("Link");return u(),m(d,null,[s(o(f),{title:"Confirm Password"}),s(g,null,{default:t(()=>[s(i,{href:"/",class:"mb-4 flex items-center justify-center"},{default:t(()=>[s(h,{class:"h-10 w-10 fill-current text-gray-500"})]),_:1}),V,a("form",{onSubmit:w(n,["prevent"])},[a("div",null,[s(x,{for:"password",value:"Password"}),s(y,{id:"password",type:"password",class:"mt-1 block w-full",modelValue:o(e).password,"onUpdate:modelValue":r[0]||(r[0]=l=>o(e).password=l),required:"",autocomplete:"current-password",autofocus:""},null,8,["modelValue"]),s(v,{class:"mt-2",message:o(e).errors.password},null,8,["message"])]),a("div",L,[s(C,{class:p(["w-full",{"opacity-25":o(e).processing}]),disabled:o(e).processing},{default:t(()=>[_(" Confirm ")]),_:1},8,["class","disabled"])])],40,k)]),_:1})],64)}}};export{z as default};
