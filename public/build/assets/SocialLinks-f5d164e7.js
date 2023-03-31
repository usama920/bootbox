import{r as m,g,c,a as v,u as h,w as q,F as _,o as r,X as y,b as e,e as s,v as n,d as V,n as C,f as U}from"./app-e6a57f5a.js";import{_ as k}from"./AuthenticatedLayout-6eb44df4.js";import{c as A}from"./common-432fcaff.js";const S=e("div",{class:"flex justify-between px-4 pb-2"},[e("div",{class:"text-[25px]"},"Social Links and Home Page Content")],-1),F={class:"px-4 text-lg"},Q={class:"lg:grid-cols-2 lg:grid"},T={class:"border-gray-400 rounded p-4 bg-white border-2"},j=e("div",{class:"font-bold"},"Footer Social Accounts",-1),N=e("label",{class:"font-normal text-base"},"Facebook Account:",-1),$=e("label",{class:"font-normal text-base"},"Instagram Account:",-1),B=e("label",{class:"font-normal text-base"},"Twitter Account:",-1),E=e("label",{class:"font-normal text-base"},"Email Account:",-1),L={class:"border-gray-400 rounded p-4 bg-white border-2"},D=e("div",{class:"font-bold"},"Footer Contact Detail",-1),I=e("label",{class:"font-normal text-base"},"Contact Email:",-1),M=e("label",{class:"font-normal text-base"},"Contact Number:",-1),z={class:"border-gray-400 rounded p-4 lg:w-1/2 bg-white border-2"},H=e("div",{class:"font-bold"},"Text before Question & Answers",-1),P=e("div",{class:"font-bold"},"Question & Answers",-1),X={class:"flex justify-between items-center my-1"},G=e("label",{class:"font-normal text-base"},"Question:",-1),J=["onClick"],K=["onUpdate:modelValue"],O=e("label",{class:"font-normal text-base"},"Answer:",-1),R=["onUpdate:modelValue"],W={class:"flex justify-end"},Y={class:"flex justify-end p-4"},Z=["disabled"],se={__name:"SocialLinks",setup(ee){const{Toast:p,ConfirmToast:te}=A(),t=m({contact_email:"",contact_number:"",social_facebook:"",social_instagram:"",social_twitter:"",social_email:"",question_text:"",questions:[{question:"",answer:"",id:""}]}),u=m(!1),b=()=>{t.value.questions.push({question:"",answer:"",id:""})},x=a=>{t.value.questions.splice(a,1)},w=()=>{u.value=!0,axios.post("/save-social",t.value).then(a=>{a.data.success&&(p.fire({icon:"success",title:"Information Saved!"}),f())}).finally(()=>{u.value=!1})},f=()=>{axios.get("/save-social").then(a=>{var o,l,i;(o=a==null?void 0:a.data)!=null&&o.data1&&(t.value=a.data.data1),(l=a==null?void 0:a.data)!=null&&l.data2&&(t.value.questions=(i=a==null?void 0:a.data)==null?void 0:i.data2)})};return g(()=>{f()}),(a,o)=>(r(),c(_,null,[v(h(y),{title:"Users"}),v(k,null,{default:q(()=>[S,e("form",F,[e("div",Q,[e("div",T,[j,e("div",null,[N,s(e("input",{"onUpdate:modelValue":o[0]||(o[0]=l=>t.value.social_facebook=l),type:"text",class:"w-full rounded",autocomplete:"off",placeholder:"/facebook"},null,512),[[n,t.value.social_facebook]])]),e("div",null,[$,s(e("input",{"onUpdate:modelValue":o[1]||(o[1]=l=>t.value.social_instagram=l),type:"text",class:"w-full rounded",autocomplete:"off",placeholder:"/instagram"},null,512),[[n,t.value.social_instagram]])]),e("div",null,[B,s(e("input",{"onUpdate:modelValue":o[2]||(o[2]=l=>t.value.social_twitter=l),type:"text",class:"w-full rounded",autocomplete:"off",placeholder:"/twitter"},null,512),[[n,t.value.social_twitter]])]),e("div",null,[E,s(e("input",{"onUpdate:modelValue":o[3]||(o[3]=l=>t.value.social_email=l),type:"text",class:"w-full rounded",autocomplete:"off",placeholder:"example@example.com"},null,512),[[n,t.value.social_email]])])]),e("div",L,[D,e("div",null,[I,s(e("input",{"onUpdate:modelValue":o[4]||(o[4]=l=>t.value.contact_email=l),type:"text",class:"w-full rounded",autocomplete:"off",placeholder:"example@example.com"},null,512),[[n,t.value.contact_email]])]),e("div",null,[M,s(e("input",{"onUpdate:modelValue":o[5]||(o[5]=l=>t.value.contact_number=l),type:"text",class:"w-full rounded",autocomplete:"off",placeholder:" (02) 123-4567"},null,512),[[n,t.value.contact_number]])])])]),e("div",z,[H,s(e("textarea",{"onUpdate:modelValue":o[6]||(o[6]=l=>t.value.question_text=l),rows:"5",type:"text",class:"w-full rounded",autocomplete:"off",placeholder:"......."},null,512),[[n,t.value.question_text]]),P,(r(!0),c(_,null,V(t.value.questions,(l,i)=>(r(),c("div",null,[e("div",null,[e("div",X,[G,t.value.questions.length>1?(r(),c("i",{key:0,onClick:d=>x(i),class:"font-bold p-2 cursor-pointer rounded text-center text-[20px] bg-red-500 hover:bg-red-600 fas fa-minus text-white"},null,8,J)):U("",!0)]),s(e("input",{"onUpdate:modelValue":d=>t.value.questions[i].question=d,type:"text",class:"w-full rounded",autocomplete:"off",placeholder:"??"},null,8,K),[[n,t.value.questions[i].question]])]),e("div",null,[O,s(e("textarea",{"onUpdate:modelValue":d=>t.value.questions[i].answer=d,rows:"5",type:"text",class:"w-full rounded",autocomplete:"off",placeholder:"............."},null,8,R),[[n,t.value.questions[i].answer]])])]))),256)),e("div",W,[e("i",{onClick:o[7]||(o[7]=l=>b()),class:"font-bold p-2 cursor-pointer rounded text-[20px] bg-green-500 hover:bg-green-600 fas fa-plus text-white"})])]),e("div",Y,[e("button",{onClick:o[8]||(o[8]=l=>w()),class:C([{"opacity-50":u.value},"px-4 cursor-pointer py-1 bg-green-600 hover:bg-green-700 text-white font-bold rounded-lg"]),disabled:u.value},"Submit",10,Z)])])]),_:1})],64))}};export{se as default};
