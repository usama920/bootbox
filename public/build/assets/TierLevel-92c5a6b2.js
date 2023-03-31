import{r as b,c as i,a as c,u as j,w as y,F as m,o,X as D,b as e,d as p,e as M,v as P,n as A,O as w,t as _}from"./app-e6a57f5a.js";import{_ as B}from"./AuthenticatedLayout-6eb44df4.js";import{_ as F}from"./Pagination-23b1c4e7.js";import{_ as O}from"./ModalDialog-65ae0309.js";import{c as V}from"./common-432fcaff.js";const E=e("div",{class:"flex justify-between py-2"},[e("div",{class:"text-[25px]"},"Tier Levels"),e("div",{"data-te-toggle":"modal","data-te-target":"#addTierProduct",class:"py-2 px-4 text-sm text-white cursor-pointer hover:bg-blue-600 bg-blue-500 rounded-lg"}," Add New Tier Level ")],-1),U={class:"flex flex-col overflow-x-auto"},z={class:"sm:-mx-6 lg:-mx-8"},I={class:"inline-block min-w-full py-2 sm:px-6 lg:px-8"},X={class:"overflow-x-auto"},q={class:"min-w-full text-left text-sm font-light"},G=e("thead",null,[e("tr",{class:"border-b whitespace-nowrap bg-gray-50 text-left text-xs font-semibold uppercase tracking-wide text-gray-500"},[e("th",{class:"border-b-2 border-gray-200 bg-gray-100 px-5 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-600"}," #No "),e("th",{class:"border-b-2 border-gray-200 bg-gray-100 px-5 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-600"}," Tier Level Name "),e("th",{class:"border-b-2 border-gray-200 bg-gray-100 px-5 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-600"}," Action ")])],-1),H={class:"border-b border-gray-200 bg-white px-5 py-5 text-sm"},J={class:"text-gray-900 whitespace-no-wrap"},K={class:"border-b border-gray-200 bg-white px-5 py-5 text-sm"},Q={class:"text-gray-900 whitespace-no-wrap"},R={class:"border-b border-gray-200 bg-white px-5 py-5 text-sm"},W={class:"flex items-center space-x-2 text-white mx-auto"},Y=["onClick"],Z=["onClick"],ee={key:0,class:"flex flex-col items-center border-t bg-white px-5 py-5 xs:flex-row xs:justify-between"},te={key:1,class:"text-lg p-5 text-center"},se={class:"space-y-2 p-4 text-lg"},ae=e("label",null,"Name:",-1),le={class:"text-red-500 ml-2 text-xs font-bold"},ie={class:"flex justify-end p-4"},oe=["disabled"],fe={__name:"TierLevel",props:{tier_levels:Object},setup(x){const{Toast:g,ConfirmToast:k}=V(),n=b({id:"",name:""}),T=b([]),d=b(!1),f=()=>{n.value={id:"",name:""}},C=a=>{a&&axios.get("/tier/"+a).then(s=>{var l;s.data.success&&(n.value=(l=s==null?void 0:s.data)==null?void 0:l.data,$("#addTierProduct").modal("show"))})},N=a=>{a&&k.fire({}).then(s=>{s.isConfirmed===!0&&axios.delete("/tier/"+a).then(l=>{l.data.success&&(g.fire({icon:"success",title:"Deleted Successfully!"}),w.visit("/tier"),f())})})},S=()=>{d.value=!0,axios.post("/tier",n.value).then(a=>{a.data.success&&($("#addTierProduct").modal("hide"),w.visit("/tier"),g.fire({icon:"success",title:"Tier Saved!"}),f())}).finally(()=>{d.value=!1})};return(a,s)=>(o(),i(m,null,[c(j(D),{title:"Users"}),c(B,null,{default:y(()=>{var l,u,h,v;return[E,e("div",U,[e("div",z,[e("div",I,[e("div",X,[e("table",q,[G,e("tbody",null,[(o(!0),i(m,null,p((l=x.tier_levels)==null?void 0:l.data,(t,r)=>(o(),i("tr",{key:t==null?void 0:t.id,class:"text-gray-700"},[e("td",H,[e("p",J,_(r+1),1)]),e("td",K,[e("p",Q,_(t==null?void 0:t.name),1)]),e("td",R,[e("div",W,[e("div",{onClick:L=>C(t==null?void 0:t.id),class:"py-1 rounded px-3 bg-green-500 hover:bg-green-600 cursor-pointer"},"Edit",8,Y),e("div",{onClick:L=>N(t==null?void 0:t.id),class:"py-1 px-3 bg-red-500 rounded hover:bg-red-600 cursor-pointer"},"Delete",8,Z)])])]))),128))])]),((h=(u=x.tier_levels)==null?void 0:u.data)==null?void 0:h.length)!==0?(o(),i("div",ee,[c(F,{links:(v=x.tier_levels)==null?void 0:v.links},null,8,["links"])])):(o(),i("div",te," No Style Available ! "))])])])]),c(O,{ModalId:"addTierProduct",onCloseModal:f},{default:y(()=>{var t;return[e("form",se,[ae,(o(!0),i(m,null,p((t=T.value)==null?void 0:t.name,r=>(o(),i("span",le,_(r),1))),256)),M(e("input",{"onUpdate:modelValue":s[0]||(s[0]=r=>n.value.name=r),type:"text",class:"w-full rounded",autocomplete:"off",placeholder:"Name"},null,512),[[P,n.value.name]])]),e("div",ie,[e("button",{onClick:s[1]||(s[1]=r=>S()),class:A([{"opacity-50":d.value},"px-4 cursor-pointer py-1 bg-green-600 hover:bg-green-700 text-white font-bold rounded-lg"]),disabled:d.value},"Submit",10,oe)])]}),_:1})]}),_:1})],64))}};export{fe as default};
