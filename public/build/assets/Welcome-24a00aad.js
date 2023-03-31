import{r as _,g as S,c as r,a as c,u,l as V,f as b,b as t,w as f,F as p,o as l,X as E,m as x,p as i,d as k,t as s,n as L,O as N}from"./app-e6a57f5a.js";import{_ as j}from"./UserLayout-cf3a8cad.js";import{c as q}from"./common-432fcaff.js";import{L as P}from"./loading-b141f5b9.js";import"./_plugin-vue_export-helper-c27b6911.js";const F={class:"font-urbanist text-base text-black dark:text-white bg-slate-900"},T=t("span",{class:"fixed blur-[200px] w-[600px] h-[600px] rounded-full top-1/2 -translate-x-1/2 left-1/2 -translate-y-1/2 bg-gradient-to-tl from-red-600/20 to-violet-600/20 dark:from-red-600/40 dark:to-violet-600/40"},null,-1),$={class:"relative md:pt-48 pt-36 overflow-hidden"},A={class:"container"},H={class:"grid grid-cols-1 justify-center text-center mt-10"},M={class:"relative"},Q=t("div",{class:"relative mb-5"},[t("h1",{class:"font-bold lg:leading-snug leading-snug text-4xl lg:text-6xl"},[i("Boot Box "),t("br"),i(" Shoes "),t("span",{class:"bg-gradient-to-l from-red-600 to-violet-600 text-transparent bg-clip-text"},"Collection")]),t("div",{class:"overflow-hidden after:content-[''] after:absolute after:h-10 after:w-10 after:bg-violet-600/10 dark:after:bg-violet-600/30 after:-top-[50px] after:left-[30%] after:-z-1 after:rounded-lg after:animate-[spin_10s_linear_infinite]"}),t("div",{class:"overflow-hidden after:content-[''] after:absolute after:h-10 after:w-10 after:bg-violet-600/20 dark:after:bg-violet-600/40 after:bottom-[0] after:right-[15%] after:-z-1 after:rounded-full after:animate-ping"})],-1),W=t("p",{class:"text-slate-400 dark:text-white/70 text-lg max-w-xl mx-auto"},"We have best boots collection with quality and comfort!",-1),D={class:"mt-8"},G=t("div",{class:"relative animate-[spin_30s_linear_infinite] -z-1"},[t("span",{class:"after:absolute after:left-0 after:bottom-1/2 after:translate-y-1/2 after:h-2 after:w-8 after:rounded-md after:bg-violet-600/20 relative after:z-10"}),t("span",{class:"after:absolute after:left-0 after:bottom-1/2 after:translate-y-1/2 after:rotate-90 after:h-2 after:w-8 after:rounded-md after:bg-violet-600/20 relative after:z-10"})],-1),R={class:"relative md:py-24 py-16"},U={class:"container"},X={class:"grid xl:grid-cols-4 lg:grid-cols-3 md:grid-cols-2 grid-cols-1 mt-10 gap-[30px]"},I=["onClick"],J={class:"relative overflow-hidden"},K={key:0,class:"relative overflow-hidden rounded-lg h-[200px]"},Y=["src"],Z=t("div",{class:"absolute -bottom-20 group-hover:bottom-1/2 group-hover:translate-y-1/2 right-0 left-0 mx-auto text-center transition-all duration-500"},[t("a",{href:"javascript:void(0)",class:"btn btn-sm rounded-full bg-violet-600 hover:bg-violet-700 border-violet-600 hover:border-violet-700 text-white"},[t("i",{class:"mdi mdi-lightning-bolt"}),i(" Buy Now ")])],-1),tt=t("div",{class:"absolute top-2 right-2 opacity-0 group-hover:opacity-100 transition-all duration-500"},[t("a",{href:"javascript:void(0)",class:"btn btn-icon btn-sm rounded-full bg-violet-600 hover:bg-violet-700 border-violet-600 hover:border-violet-700 text-white"},[t("i",{class:"mdi mdi-plus"})])],-1),et={class:"mt-3"},ot={class:"flex items-center"},at={class:"ml-2 text-[15px] font-medium text-slate-400 hover:text-violet-600"},lt={class:"my-3"},st={class:"font-semibold px-2 hover:text-violet-600"},it={class:"flex justify-between p-2 bg-gray-50 dark:bg-slate-800 rounded-lg shadow dark:shadow-gray-700"},rt=t("span",{class:"text-[16px] font-medium text-slate-400 block"},"Price",-1),dt={class:"text-[16px] font-semibold block"},nt=t("div",null,[t("span",{class:"text-[16px] font-medium text-slate-400 block"},"Subscription"),t("span",{class:"text-[16px] font-semibold block"},"Available")],-1),ct={class:"grid grid-cols-1 mt-6"},ut={class:"text-center"},ht=t("i",{class:"uil uil-arrow-right"},null,-1),_t={class:"container md:mt-24 mt-16"},ft={class:"grid grid-cols-1 text-center"},vt=t("h3",{class:"mb-4 md:text-3xl text-2xl md:leading-snug leading-snug font-semibold"},"Q&A",-1),gt={class:"text-slate-400 max-w-xl mx-auto"},mt={id:"accordionExample"},bt={class:"rounded-t-lg bg-transparent dark:border-neutral-600 dark:bg-neutral-800"},pt=["id"],xt=["data-te-target","aria-expanded","aria-controls"],wt=t("span",{class:"ml-auto h-5 w-5 shrink-0 rotate-[-180deg] fill-[#336dec] transition-transform duration-200 ease-in-out group-[[data-te-collapse-collapsed]]:rotate-0 group-[[data-te-collapse-collapsed]]:fill-[#212529] motion-reduce:transition-none dark:fill-blue-300 dark:group-[[data-te-collapse-collapsed]]:fill-white"},[t("i",{class:"fa-sharp fa-solid fa-caret-down"})],-1),yt=["id","aria-labelledby"],kt={class:"py-4 px-5"},Bt={class:"container md:mt-24 mt-16"},Ot={class:"grid grid-cols-1 text-center"},zt=t("h3",{class:"mb-4 md:text-3xl text-2xl md:leading-snug leading-snug font-semibold"},"Have Question ? Get in touch!",-1),Ct={class:"mt-6"},St=t("i",{class:"uil uil-phone"},null,-1),Ft={__name:"Welcome",props:{canLogin:Boolean,canRegister:Boolean,laravelVersion:String,phpVersion:String},setup(Vt){const{Toast:B,ConfirmToast:Et}=q(),h=_({}),w=_({}),y=_({}),O=window.location.origin,v=_(!1),z=()=>{axios.get("/display-products").then(o=>{var g,d,n,e,a,m;h.value=(g=o==null?void 0:o.data)!=null&&g.data1?(d=o==null?void 0:o.data)==null?void 0:d.data1:{},w.value=(n=o==null?void 0:o.data)!=null&&n.data2?(e=o==null?void 0:o.data)==null?void 0:e.data2:{},y.value=(a=o==null?void 0:o.data)!=null&&a.data3?(m=o==null?void 0:o.data)==null?void 0:m.data3:{}}).finally(()=>{v.value=!1,window.location.pathname==="/order=true"&&B.fire({icon:"success",title:"Order Submitted Successfully"})})},C=o=>{N.visit("product-detail/"+o)};return S(()=>{v.value=!0,z()}),(o,g)=>(l(),r(p,null,[c(u(E),{title:"Home"}),v.value?(l(),V(P,{key:0})):b("",!0),t("div",F,[T,c(j,null,{default:f(()=>{var d,n;return[t("section",$,[t("div",A,[t("div",H,[t("div",M,[Q,W,t("div",D,[c(u(x),{href:o.route("show_products_all"),class:"btn bg-gray-700 hover:bg-gray-900 border-white hover:border-white text-white rounded-full"},{default:f(()=>[i("Explore Products")]),_:1},8,["href"])])])]),G]),t("section",R,[t("div",U,[t("div",X,[h.value&&((d=h.value)==null?void 0:d.length)>0?(l(!0),r(p,{key:0},k(h.value,e=>{var a;return l(),r("div",{onClick:m=>C(e==null?void 0:e.product_slug),class:"group cursor-pointer relative overflow-hidden p-2 rounded-lg bg-white dark:bg-slate-900 border border-gray-100 dark:border-gray-800 hover:shadow-md dark:shadow-md hover:dark:shadow-gray-700 transition-all duration-500 hover:-mt-2 h-fit"},[t("div",J,[e?(l(),r("div",K,[t("img",{alt:"image",class:"rounded-lg min-h-[200px] min-h-full shadow-md dark:shadow-gray-700 group-hover:scale-110 transition-all duration-500",src:u(O)+"/storage/images/products/"+((a=e==null?void 0:e.image[0])==null?void 0:a.name)},null,8,Y)])):b("",!0),Z,tt]),t("div",et,[t("div",ot,[t("div",at,s(e==null?void 0:e.category)+"/"+s(e==null?void 0:e.sub_category),1)]),t("div",lt,[t("div",st,s(e==null?void 0:e.product_name),1)]),t("div",it,[t("div",null,[rt,t("span",dt,"$"+s(e==null?void 0:e.price),1)]),nt])])],8,I)}),256)):b("",!0)]),t("div",ct,[t("div",ut,[c(u(x),{href:o.route("show_products_all"),class:"btn btn-link text-[16px] font-medium hover:text-violet-600 after:bg-violet-600 duration-500 ease-in-out"},{default:f(()=>[i("Explore More "),ht]),_:1},8,["href"])])])]),t("div",_t,[t("div",ft,[vt,t("p",gt,s((n=y.value)==null?void 0:n.question_text),1)]),t("div",mt,[(l(!0),r(p,null,k(w.value,(e,a)=>(l(),r("div",bt,[t("h2",{class:"mb-0",id:"headingOne"+e.id},[t("button",{class:"group relative flex w-full items-center rounded-t-[15px] border-0 bg-transparent py-4 px-5 text-left text-base text-neutral-800 transition [overflow-anchor:none] hover:z-[2] focus:z-[3] focus:outline-none dark:bg-neutral-800 dark:text-white [&:not([data-te-collapse-collapsed])]:bg-transparent [&:not([data-te-collapse-collapsed])]:text-primary [&:not([data-te-collapse-collapsed])]:[box-shadow:inset_0_-1px_0_rgba(229,231,235)] dark:[&:not([data-te-collapse-collapsed])]:bg-neutral-800 dark:[&:not([data-te-collapse-collapsed])]:text-primary-400 dark:[&:not([data-te-collapse-collapsed])]:[box-shadow:inset_0_-1px_0_rgba(75,85,99)]",type:"button","data-te-collapse-init":"","data-te-collapse-collapsed":"","data-te-target":"#collapseOne"+e.id,"aria-expanded":a===0,"aria-controls":"collapseOne"+e.id},[i(s(e==null?void 0:e.question)+" ? ",1),wt],8,xt)],8,pt),t("div",{id:"collapseOne"+e.id,class:L(["hidden",{"!visible":a===0}]),"data-te-collapse-item":"","aria-labelledby":"headingOne"+e.id,"data-te-parent":"#accordionExample"},[t("div",kt,s(e==null?void 0:e.answer),1)],10,yt)]))),256))])]),t("div",Bt,[t("div",Ot,[zt,t("div",Ct,[c(u(x),{href:o.route("contact"),class:"btn bg-violet-600 hover:bg-violet-700 border-violet-600 hover:border-violet-700 text-white rounded-full mr-2 mt-2"},{default:f(()=>[St,i(" Contact us ")]),_:1},8,["href"])])])])])])]}),_:1})])],64))}};export{Ft as default};
