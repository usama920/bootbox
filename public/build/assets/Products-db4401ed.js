import{r as d,g as x,c as u,a as h,u as m,l as f,f as w,b as e,w as v,F as p,o as c,X as y,t as l,m as k,p as P,d as B,O as V}from"./app-e6a57f5a.js";import{_ as C}from"./UserLayout-cf3a8cad.js";import{L}from"./loading-b141f5b9.js";import"./common-432fcaff.js";import"./_plugin-vue_export-helper-c27b6911.js";const N={class:"font-urbanist text-base text-black dark:text-white dark:bg-slate-900"},S=e("span",{class:"fixed blur-[200px] w-[600px] h-[600px] rounded-full top-1/2 -translate-x-1/2 left-1/2 -translate-y-1/2 bg-gradient-to-tl from-red-600/20 to-violet-600/20 dark:from-red-600/40 dark:to-violet-600/40"},null,-1),A={class:"relative"},M={class:"container py-20"},O={class:"grid grid-cols-1 pb-8 text-center mt-10"},$={class:"md:text-3xl text-2xl md:leading-snug tracking-wide leading-snug font-medium text-white"},F={class:"text-center"},H={class:"breadcrumb tracking-[0.5px] breadcrumb-light mb-0 inline-block"},W={class:"inline breadcrumb-item text-[15px] font-semibold duration-500 ease-in-out text-white/50 hover:text-white"},j={class:"inline breadcrumb-item text-[15px] font-semibold duration-500 ease-in-out text-white"},D={class:"container"},E={class:"grid xl:grid-cols-4 lg:grid-cols-3 md:grid-cols-2 grid-cols-1 gap-[30px]"},R=["onClick"],T={class:"relative overflow-hidden"},U={class:"relative overflow-hidden rounded-lg h-[200px]"},X=["src"],q=e("div",{class:"absolute -bottom-20 group-hover:bottom-1/2 group-hover:translate-y-1/2 right-0 left-0 mx-auto text-center transition-all duration-500"},[e("div",{class:"btn btn-sm rounded-full bg-violet-600 hover:bg-violet-700 border-violet-600 hover:border-violet-700 text-white"}," Buy Now ")],-1),z=e("div",{class:"absolute top-2 right-2 opacity-0 group-hover:opacity-100 transition-all duration-500"},[e("div",{class:"btn btn-icon btn-sm rounded-full bg-violet-600 hover:bg-violet-700 border-violet-600 hover:border-violet-700 text-white"},[e("i",{class:"mdi mdi-plus"})])],-1),G={class:"mt-3"},I={class:"flex items-center"},J={class:"ml-2 text-[15px] font-medium text-slate-400 hover:text-violet-600"},K={class:"my-3"},Q={class:"font-semibold px-2 hover:text-violet-600"},Y={class:"flex justify-between p-2 bg-gray-50 dark:bg-slate-800 rounded-lg shadow dark:shadow-gray-700"},Z=e("span",{class:"text-[16px] font-medium text-slate-400 block"},"Price",-1),ee={class:"text-[16px] font-semibold block"},te=e("div",null,[e("span",{class:"text-[16px] font-medium text-slate-400 block"},"Subscription"),e("span",{class:"text-[16px] font-semibold block"},"Available")],-1),de={__name:"Products",props:{canLogin:Boolean,canRegister:Boolean,laravelVersion:String,phpVersion:String},setup(oe){const r=d({}),_=window.location.origin,n=d(),a=d(),i=d(!1),g=()=>{const o=window.location.href.split("/")[4];o&&o==="men"?(n.value="Products for Men",a.value="Men Products",axios.get("/display-men-products/").then(s=>{r.value=s.data}).finally(()=>{i.value=!1})):o&&o==="women"?(n.value="Products for Women",a.value="Women Products",axios.get("/display-women-products/").then(s=>{r.value=s.data}).finally(()=>{i.value=!1})):(n.value="All Products",a.value="All Products",axios.get("/display-all-products/").then(s=>{r.value=s.data}).finally(()=>{i.value=!1}))},b=o=>{V.visit("/product-detail/"+o)};return x(()=>{g(),i.value=!0}),(o,s)=>(c(),u(p,null,[h(m(y),{title:"Home"}),i.value?(c(),f(L,{key:0})):w("",!0),e("div",N,[S,h(C,null,{default:v(()=>[e("section",A,[e("div",M,[e("div",O,[e("h3",$,l(n.value),1)]),e("div",F,[e("ul",H,[e("li",W,[h(m(k),{href:o.route("welcome-home")},{default:v(()=>[P("Home")]),_:1},8,["href"])]),e("li",j,l(a.value),1)])])]),e("div",D,[e("div",E,[(c(!0),u(p,null,B(r.value,t=>(c(),u("div",{onClick:se=>b(t==null?void 0:t.product_slug),class:"group cursor-pointer my-10 relative overflow-hidden p-2 rounded-lg bg-white dark:bg-slate-900 border border-gray-100 dark:border-gray-800 hover:shadow-md dark:shadow-md hover:dark:shadow-gray-700 transition-all duration-500 hover:-mt-2 h-fit"},[e("div",T,[e("div",U,[e("img",{alt:"image",class:"rounded-lg min-h-[200px] min-h-full shadow-md dark:shadow-gray-700 group-hover:scale-110 transition-all duration-500",src:m(_)+"/storage/images/products/"+t.image[0].name},null,8,X)]),q,z]),e("div",G,[e("div",I,[e("div",J,l(t==null?void 0:t.category)+"/"+l(t==null?void 0:t.sub_category),1)]),e("div",K,[e("div",Q,l(t==null?void 0:t.product_name),1)]),e("div",Y,[e("div",null,[Z,e("span",ee,"$"+l(t==null?void 0:t.price),1)]),te])])],8,R))),256))])])])]),_:1})])],64))}};export{de as default};
