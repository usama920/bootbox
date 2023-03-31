import{r as x,c as r,a as p,u as w,w as k,F as m,o as n,X as C,e as E,v as N,b as e,n as j,d as S,t as _,O as D}from"./app-e6a57f5a.js";import{_ as $}from"./AuthenticatedLayout-6eb44df4.js";import{_ as B}from"./Pagination-23b1c4e7.js";import{c as F}from"./common-432fcaff.js";const O=e("div",{class:"flex justify-between py-2"},[e("div",{class:"text-[25px]"},"Newsletter Email Content")],-1),T={class:"flex justify-end text-white"},V=["disabled"],A=e("div",{class:"flex justify-between py-2"},[e("div",{class:"text-[25px]"},"Send Email")],-1),U={class:"flex flex-col overflow-x-none"},z={class:"sm:-mx-6 lg:-mx-8"},L={class:"inline-block min-w-full py-2 sm:px-6 lg:px-8"},M={class:"overflow-x-none"},X={class:"min-w-full text-left text-sm font-light"},q=e("thead",null,[e("tr",{class:"border-b whitespace-nowrap bg-gray-50 text-left text-xs font-semibold uppercase tracking-wide text-gray-500"},[e("th",{class:"border-b-2 border-gray-200 bg-gray-100 px-5 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-600"}," #No "),e("th",{class:"border-b-2 border-gray-200 bg-gray-100 px-5 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-600"}," Emails "),e("th",{class:"border-b-2 border-gray-200 bg-gray-100 px-5 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-600"}," Action ")])],-1),G={class:"border-b border-gray-200 bg-white px-5 py-5 text-sm"},H={class:"text-gray-900 whitespace-no-wrap"},I={class:"border-b border-gray-200 bg-white px-5 py-5 text-sm"},J={class:"text-gray-900 whitespace-no-wrap"},K={class:"border-b border-gray-200 bg-white px-5 py-5 text-sm"},P={class:"flex items-center space-x-2 text-white mx-auto"},Q=["onClick"],R={key:0,class:"flex flex-col items-center border-t bg-white px-5 py-5 xs:flex-row xs:justify-between"},W={key:1,class:"text-lg p-5 text-center"},oe={__name:"Newsletter",props:{news_letter:Object},setup(c){const{Toast:d,ConfirmToast:g}=F();x([]);const a=x(!1),f=x({newsContent:"",email:""}),y=s=>{s&&g.fire({}).then(o=>{o.isConfirmed===!0&&(a.value=!0,axios.delete("/send-news-email/"+s).then(l=>{l.data.success&&(d.fire({icon:"success",title:"Subscriber Deleted"}),D.visit("/news-letter"))}).finally(()=>{a.value=!1}))})},h=()=>{a.value=!0,axios.post("/send-news-email").then(s=>{s.data.success&&d.fire({icon:"success",title:"Email Sent"})}).finally(()=>{a.value=!1}).catch(s=>{var o,l,i;console.log(s.response),d.fire({icon:"error",title:(i=(l=(o=s==null?void 0:s.response)==null?void 0:o.data)==null?void 0:l.errors)==null?void 0:i.email[0]})})};return(s,o)=>(n(),r(m,null,[p(w(C),{title:"Users"}),p($,null,{default:k(()=>{var l,i,u,b;return[O,E(e("textarea",{"onUpdate:modelValue":o[0]||(o[0]=t=>f.value.newsContent=t),rows:"5",type:"text",class:"w-full rounded",autocomplete:"off",placeholder:""},null,512),[[N,f.value.newsContent]]),e("div",T,[e("button",{class:j([{"opacity-50":a.value},"py-1 rounded px-3 bg-green-500 hover:bg-green-600 cursor-pointer"]),disabled:a.value,onClick:o[1]||(o[1]=t=>h())},"Send Email",10,V)]),A,e("div",U,[e("div",z,[e("div",L,[e("div",M,[e("table",X,[q,e("tbody",null,[(n(!0),r(m,null,S((l=c.news_letter)==null?void 0:l.data,(t,v)=>(n(),r("tr",{key:t==null?void 0:t.id,class:"text-gray-700"},[e("td",G,[e("p",H,_(v+1),1)]),e("td",I,[e("p",J,_(t==null?void 0:t.email),1)]),e("td",K,[e("div",P,[e("button",{onClick:Y=>y(t==null?void 0:t.id),class:"py-1 px-3 bg-red-500 rounded hover:bg-red-600 cursor-pointer"},"Delete",8,Q)])])]))),128))])]),((u=(i=c.news_letter)==null?void 0:i.data)==null?void 0:u.length)!==0?(n(),r("div",R,[p(B,{links:(b=c.news_letter)==null?void 0:b.links},null,8,["links"])])):(n(),r("div",W," No Emails Available ! "))])])])])]}),_:1})],64))}};export{oe as default};
