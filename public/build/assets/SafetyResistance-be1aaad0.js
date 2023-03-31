import{r as y,c as l,a as c,u as j,w as p,F as b,o,X as D,b as e,d as v,e as M,v as P,n as A,O as w,t as m}from"./app-b3afb371.js";import{_ as B}from"./AuthenticatedLayout-87c7a967.js";import{_ as F}from"./Pagination-6073d455.js";import{_ as O}from"./ModalDialog-e9a84d70.js";import{c as V}from"./common-68735ce1.js";const E=e("div",{class:"flex justify-between py-2"},[e("div",{class:"text-[25px]"},"Safety Resistance Types"),e("div",{"data-te-toggle":"modal","data-te-target":"#addSafetyResistanceProduct",class:"py-2 px-4 text-sm text-white cursor-pointer hover:bg-blue-600 bg-blue-500 rounded-lg"}," Add New Safety Resistance Type ")],-1),U={class:"flex flex-col overflow-x-auto"},z={class:"sm:-mx-6 lg:-mx-8"},I={class:"inline-block min-w-full py-2 sm:px-6 lg:px-8"},L={class:"overflow-x-auto"},X={class:"min-w-full text-left text-sm font-light"},q=e("thead",null,[e("tr",{class:"border-b whitespace-nowrap bg-gray-50 text-left text-xs font-semibold uppercase tracking-wide text-gray-500"},[e("th",{class:"border-b-2 border-gray-200 bg-gray-100 px-5 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-600"}," #No "),e("th",{class:"border-b-2 border-gray-200 bg-gray-100 px-5 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-600"}," Safety Resistance Type Name "),e("th",{class:"border-b-2 border-gray-200 bg-gray-100 px-5 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-600"}," Action ")])],-1),G={class:"border-b border-gray-200 bg-white px-5 py-5 text-sm"},H={class:"text-gray-900 whitespace-no-wrap"},J={class:"border-b border-gray-200 bg-white px-5 py-5 text-sm"},K={class:"text-gray-900 whitespace-no-wrap"},Q={class:"border-b border-gray-200 bg-white px-5 py-5 text-sm"},W={class:"flex items-center space-x-2 text-white mx-auto"},Y=["onClick"],Z=["onClick"],ee={key:0,class:"flex flex-col items-center border-t bg-white px-5 py-5 xs:flex-row xs:justify-between"},te={key:1,class:"text-lg p-5 text-center"},se={class:"space-y-2 p-4 text-lg"},ae=e("label",null,"Name:",-1),ie={class:"text-red-500 ml-2 text-xs font-bold"},le={class:"flex justify-end p-4"},oe=["disabled"],xe={__name:"SafetyResistance",props:{safeties:Object},setup(f){const{Toast:g,ConfirmToast:k}=V(),r=y({id:"",name:""}),S=y([]),d=y(!1),x=()=>{r.value={id:"",name:""}},R=a=>{a&&axios.get("/safety-resistance/"+a).then(s=>{var i;s.data.success&&(r.value=(i=s==null?void 0:s.data)==null?void 0:i.data,$("#addSafetyResistanceProduct").modal("show"))})},C=a=>{a&&k.fire({}).then(s=>{s.isConfirmed===!0&&axios.delete("/safety-resistance/"+a).then(i=>{i.data.success&&(g.fire({icon:"success",title:"Deleted Successfully!"}),w.visit("/safety-resistance"),x())})})},N=()=>{d.value=!0,axios.post("/safety-resistance",r.value).then(a=>{a.data.success&&($("#addSafetyResistanceProduct").modal("hide"),w.visit("/safety-resistance"),g.fire({icon:"success",title:"Safety Resistance Type Saved!"}),x())}).finally(()=>{d.value=!1})};return(a,s)=>(o(),l(b,null,[c(j(D),{title:"Users"}),c(B,null,{default:p(()=>{var i,u,_,h;return[E,e("div",U,[e("div",z,[e("div",I,[e("div",L,[e("table",X,[q,e("tbody",null,[(o(!0),l(b,null,v((i=f.safeties)==null?void 0:i.data,(t,n)=>(o(),l("tr",{key:t==null?void 0:t.id,class:"text-gray-700"},[e("td",G,[e("p",H,m(n+1),1)]),e("td",J,[e("p",K,m(t==null?void 0:t.name),1)]),e("td",Q,[e("div",W,[e("div",{onClick:T=>R(t==null?void 0:t.id),class:"py-1 rounded px-3 bg-green-500 hover:bg-green-600 cursor-pointer"},"Edit",8,Y),e("div",{onClick:T=>C(t==null?void 0:t.id),class:"py-1 px-3 bg-red-500 rounded hover:bg-red-600 cursor-pointer"},"Delete",8,Z)])])]))),128))])]),((_=(u=f.safeties)==null?void 0:u.data)==null?void 0:_.length)!==0?(o(),l("div",ee,[c(F,{links:(h=f.safeties)==null?void 0:h.links},null,8,["links"])])):(o(),l("div",te," No Safety Resistance Type Available ! "))])])])]),c(O,{ModalId:"addSafetyResistanceProduct",onCloseModal:x},{default:p(()=>{var t;return[e("form",se,[ae,(o(!0),l(b,null,v((t=S.value)==null?void 0:t.name,n=>(o(),l("span",ie,m(n),1))),256)),M(e("input",{"onUpdate:modelValue":s[0]||(s[0]=n=>r.value.name=n),type:"text",class:"w-full rounded",autocomplete:"off",placeholder:"Name"},null,512),[[P,r.value.name]])]),e("div",le,[e("button",{onClick:s[1]||(s[1]=n=>N()),class:A([{"opacity-50":d.value},"px-4 cursor-pointer py-1 bg-green-600 hover:bg-green-700 text-white font-bold rounded-lg"]),disabled:d.value},"Submit",10,oe)])]}),_:1})]}),_:1})],64))}};export{xe as default};