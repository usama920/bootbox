import{r,c as m,a as o,u as d,w as c,F as _,o as p,X as v,b as t,y as V,n as x,p as b,O as n}from"./app-62563c6d.js";import{_ as g}from"./UserLayout-b2e314bf.js";import{_ as h,a as y}from"./TextInput-010a0998.js";import{_ as w}from"./PrimaryButton-1d44a963.js";import{c as S}from"./common-574032ff.js";const $={class:"max-w-lg mx-auto flex-1 my-40"},k=["onSubmit"],B={class:"mt-6"},z={__name:"AccountVerify",setup(C){const{Toast:i,ConfirmToast:F}=S(),a=r(""),s=r(!1),u=()=>{a.value&&a.value.length===6?(s.value=!0,axios.post("/account-verify",{code:a.value}).then(e=>{e.data.success&&(i.fire({icon:"Success",title:"Email Verified"}),n.visit("/"))}).finally(()=>{s.value=!1}).catch(e=>{console.log(e.response.data.error),e.response.data.error&&(i.fire({icon:"error",title:e.response.data.error}),n.visit("/register"))})):(s.value=!1,i.fire({icon:"error",title:"Six digits Verification code required"}))};return(e,l)=>(p(),m(_,null,[o(d(v),{title:"Log in"}),o(g,null,{default:c(()=>[t("div",$,[t("form",{onSubmit:V(u,["prevent"])},[t("div",null,[o(h,{for:"Verification",value:"Verification code"}),o(y,{id:"Verification",type:"text",class:"mt-1 block w-full",modelValue:a.value,"onUpdate:modelValue":l[0]||(l[0]=f=>a.value=f)},null,8,["modelValue"])]),t("div",B,[o(w,{class:x(["w-full",{"opacity-25":s.value}]),disabled:s.value},{default:c(()=>[b(" Submit ")]),_:1},8,["class","disabled"])])],40,k)])]),_:1})],64))}};export{z as default};