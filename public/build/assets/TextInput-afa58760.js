import{o as a,c as l,t as n,j as r,r as c,g as i}from"./app-9cd134ea.js";const p={class:"block text-sm text-gray-700"},d={key:0},m={key:1},b={__name:"InputLabel",props:["value"],setup(t){return(e,o)=>(a(),l("label",p,[t.value?(a(),l("span",d,n(t.value),1)):(a(),l("span",m,[r(e.$slots,"default")]))]))}},_=["value"],k={__name:"TextInput",props:["modelValue"],emits:["update:modelValue"],setup(t){const e=c(null);return i(()=>{e.value.hasAttribute("autofocus")&&e.value.focus()}),(o,s)=>(a(),l("input",{class:"block mt-1 w-full rounded-full bg-white text-black form-input focus:border-indigo-600",value:t.modelValue,onInput:s[0]||(s[0]=u=>o.$emit("update:modelValue",u.target.value)),ref_key:"input",ref:e},null,40,_))}};export{b as _,k as a};