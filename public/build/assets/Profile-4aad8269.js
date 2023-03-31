import{z as _,J as g,g as h,c as b,a,u as o,w as n,F as v,o as x,X as y,p as u,b as e,e as d,k,t as V,y as M,v as p,n as S}from"./app-e6a57f5a.js";import{_ as $}from"./PrimaryButton-686d33fe.js";import{_ as r,a as f}from"./TextInput-674c4b8d.js";import{_ as i}from"./InputError-44959de3.js";import{_ as C}from"./AuthenticatedLayout-6eb44df4.js";const L={class:"rounded-lg bg-white p-4 shadow-xs"},N={class:"mb-4 inline-flex w-full overflow-hidden rounded-lg bg-white shadow-md"},U=e("div",{class:"flex w-12 items-center justify-center bg-green-500"},[e("svg",{class:"h-6 w-6 fill-current text-white",viewBox:"0 0 40 40",xmlns:"http://www.w3.org/2000/svg"},[e("path",{d:"M20 3.33331C10.8 3.33331 3.33337 10.8 3.33337 20C3.33337 29.2 10.8 36.6666 20 36.6666C29.2 36.6666 36.6667 29.2 36.6667 20C36.6667 10.8 29.2 3.33331 20 3.33331ZM16.6667 28.3333L8.33337 20L10.6834 17.65L16.6667 23.6166L29.3167 10.9666L31.6667 13.3333L16.6667 28.3333Z"})])],-1),B={class:"-mx-3 px-4 py-2"},E={class:"mx-3"},T=e("span",{class:"font-semibold text-green-500"},"Success",-1),j={class:"text-sm text-gray-600"},q=["onSubmit"],z={class:"mt-3"},D={class:"mt-3"},F={class:"mt-3"},P={class:"mt-3"},Z={class:"mt-4 flex justify-end"},K={__name:"Profile",setup(J){const s=_({_method:"PUT",name:"",email:"",password:null,password_confirmation:null}),m=g(),w=()=>{s.put(route("profile.update"),{onSuccess:()=>s.reset("password","password_confirmation"),onError:()=>s.reset("password","password_confirmation")})};return h(()=>{s.name=m.props.auth.user.name,s.email=m.props.auth.user.email}),(c,l)=>(x(),b(v,null,[a(o(y),{title:"My profile"}),a(C,null,{header:n(()=>[u(" My profile ")]),default:n(()=>[e("div",L,[d(e("div",N,[U,e("div",B,[e("div",E,[T,e("p",j,V(c.$page.props.flash.success),1)])])],512),[[k,c.$page.props.flash.success]]),e("form",{onSubmit:M(w,["prevent"])},[e("div",z,[a(r,{for:"name",value:"Name"}),d(e("input",{id:"name",disabled:"",type:"text",class:"block mt-1 w-full rounded-full !bg-gray-200 text-black form-input hover:cursor-not-allowed focus:border-indigo-600 mt-1 block w-full","onUpdate:modelValue":l[0]||(l[0]=t=>o(s).name=t),required:""},null,512),[[p,o(s).name]]),a(i,{class:"mt-2",message:o(s).errors.name},null,8,["message"])]),e("div",D,[a(r,{for:"email",value:"Email"}),d(e("input",{id:"email",disabled:"",type:"email",class:"block mt-1 w-full rounded-full !bg-gray-200 hover:cursor-not-allowed text-black form-input focus:border-indigo-600 mt-1 block w-full","onUpdate:modelValue":l[1]||(l[1]=t=>o(s).email=t),required:""},null,512),[[p,o(s).email]]),a(i,{class:"mt-2",message:o(s).errors.email},null,8,["message"])]),e("div",F,[a(r,{for:"password",value:"New password"}),a(f,{id:"password",type:"password",class:"mt-1 block w-full",modelValue:o(s).password,"onUpdate:modelValue":l[2]||(l[2]=t=>o(s).password=t)},null,8,["modelValue"]),a(i,{class:"mt-2",message:o(s).errors.password},null,8,["message"])]),e("div",P,[a(r,{for:"password_confirmation",value:"New password confirmation"}),a(f,{id:"password_confirmation",type:"password",class:"mt-1 block w-full",modelValue:o(s).password_confirmation,"onUpdate:modelValue":l[3]||(l[3]=t=>o(s).password_confirmation=t)},null,8,["modelValue"]),a(i,{class:"mt-2",message:o(s).errors.password_confirmation},null,8,["message"])]),e("div",Z,[a($,{class:S({"opacity-25":o(s).processing}),disabled:o(s).processing},{default:n(()=>[u(" Submit ")]),_:1},8,["class","disabled"])])],40,q)])]),_:1})],64))}};export{K as default};
