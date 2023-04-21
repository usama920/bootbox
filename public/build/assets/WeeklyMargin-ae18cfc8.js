import{r as l,g as _,c as r,a as u,u as g,w as p,F as v,o as c,X as x,b as e,t as b,f as y,e as h,v as k,n as w}from"./app-ec377eaf.js";import{_ as M}from"./AuthenticatedLayout-a1990e0d.js";import{c as C}from"./common-6a76473d.js";const F=e("div",{class:"flex justify-between py-2"},[e("div",{class:"text-[25px]"},"Weekly Margin of Subscription")],-1),S={class:"flex flex-col overflow-x-auto"},V={class:"space-y-2 p-4 text-lg"},B=e("label",null,"Weekly Margin:",-1),N={key:0,class:"text-red-500 ml-2 text-xs font-bold"},T={class:"flex justify-end p-4"},W=["disabled"],z={__name:"WeeklyMargin",setup(j){const{Toast:d,ConfirmToast:D}=C(),s=l({margin_amount:""}),n=l(),i=l(!1),m=()=>{s.value.margin_amount?axios.post("/weekly-margin",s.value).then(t=>{t.data.success&&d.fire({icon:"success",title:"Saved!"})}):n.value="Field is Required"},f=()=>{axios.get("/weekly-margin").then(t=>{var a,o;t.data.success&&(s.value.margin_amount=(o=(a=t==null?void 0:t.data)==null?void 0:a.data)==null?void 0:o.margin_amount)})};return _(()=>{f()}),(t,a)=>(c(),r(v,null,[u(g(x),{title:"Users"}),u(M,null,{default:p(()=>[F,e("div",S,[e("div",V,[B,n.value?(c(),r("span",N,b(n.value),1)):y("",!0),h(e("input",{"onUpdate:modelValue":a[0]||(a[0]=o=>s.value.margin_amount=o),type:"number",class:"w-full rounded",autocomplete:"off",placeholder:"Amount"},null,512),[[k,s.value.margin_amount]]),e("div",T,[e("button",{onClick:a[1]||(a[1]=o=>m()),class:w([{"opacity-50":i.value},"px-4 cursor-pointer py-1 bg-green-600 hover:bg-green-700 text-white font-bold rounded-lg"]),disabled:i.value},"Submit",10,W)])])])]),_:1})],64))}};export{z as default};