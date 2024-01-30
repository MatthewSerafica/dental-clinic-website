import{r as N,K as P,c as y,T,n as c,b as h,w,o as l,d as t,u as e,g as d,t as n,h as i,e as x,f as A,m,v as p,i as u,B as g}from"./app-cdbf4484.js";import U from"./MainLayout-ff052132.js";import{A as S}from"./ArrowLeft-3b486ccb.js";import{h as k}from"./flowbite-vue-62d8acb5.js";import{m as q}from"./module.esm-66530135.js";import"./SideBar-ddd0ab5f.js";import"./SluDentalLogo-a4fb04a6.js";import"./_plugin-vue_export-helper-c27b6911.js";import"./DentistLinks-aebae790.js";import"./SideBarLinks-b569a21a.js";import"./DashboardIcon-abe5f48e.js";import"./UsersIcon-3089db95.js";import"./PatientIcon-56da3996.js";import"./PatientLinks-2a5a06a3.js";import"./AssistantLinks-c53c5408.js";import"./AdminLinks-fd8c5b60.js";import"./Header-33526c7b.js";import"./SideBarMobileView-d1951852.js";const D={class:"relative flex flex-col"},$={class:"rounded top-16"},B={class:"absolute right-0 w-80"},E=t("div",{class:"flex flex-col ml-2 max-sm:px-5"},[t("h1",{class:"w-full h-8 text-2xl font-bold text-gray-700 max-sm:ml-4"}," Create Dentist"),t("h6",{class:"h-1 text-xs text-gray-400 max-sm:ml-4"},[t("a",{href:"/admin"},"Home"),d(" > "),t("a",{href:"/admin/users"},"User"),d(" > "),t("a",null,"Add Dentists")])],-1),F={class:"relative laptop:w-[75rem] laptop:h-[36rem] mt-8 desktop:w-[99rem]"},L=["onSubmit"],V={class:"grid desktop:grid-rows-14 bg-[#ffffff] rounded-xl desktop:h-[50rem] desktop:w-[90rem] desktop:px-6 drop-shadow-lg"},M={class:"grid laptop:grid-cols-8 desktop:col-span-2 desktop:grid-cols-6"},R=t("h1",{class:"row-start-1 p-6 font-medium text-l"}," ADD DENTIST ",-1),z={class:"py-4 laptop:col-start-7 desktop:col-start-6 right-2 w-44"},I={href:"/admin/users",class:"flex items-center gap-2 px-6 py-2 font-bold text-white bg-blue-500 rounded hover:bg-blue-700"},K=t("hr",{class:"h-0.5 bg-gray-20 border-1 dark:bg-gray-700 desktop:col-span-6 laptop:col-span-8"},null,-1),j=t("div",{class:"row-start-3 py-5"},[t("h1",{class:"px-6 text-gray-400"},"BASIC INFORMATION")],-1),O={class:"row-start-4 px-14"},Z={class:"grid grid-cols-3 left-10 gap-y-4"},H={class:""},J=t("div",null,"User Type",-1),W={class:"row-start-4"},G=t("div",{for:"lname"},[d("Last Name "),t("label",{class:"text-[red]"},"*")],-1),Q={key:0,class:"text-red-600"},X={class:"row-start-4"},Y=t("div",{for:"fname"},[d("First Name "),t("label",{class:"text-[red]"},"*")],-1),tt={key:0,class:"text-red-600"},st={class:"row-start-4"},et=t("div",{for:"mname"},"Middle Name ",-1),ot={key:0,class:"text-red-600"},rt={class:"row-start-5"},at=t("div",null,[d("Email Address "),t("label",{class:"text-[red]"},"*")],-1),dt={key:0,class:"text-red-600"},lt={class:"row-start-5"},nt=t("div",null,[d("Contact Number "),t("label",{class:"text-[red]"},"*")],-1),it={key:0,class:"text-red-600"},mt=t("div",{class:"row-start-7 pt-2"},[t("h1",{class:"px-6 text-gray-400"},"CREATE PASSWORD")],-1),pt={class:"py-3 pb-10 row-start-8 px-14"},ut=t("div",null,[d("Password "),t("label",{class:"text-[red]"},"*")],-1),ct={key:0,class:"text-red-600"},_t=t("div",{class:"mt-4"},[d("Confirm Password "),t("label",{class:"text-[red]"},"*")],-1),ht={key:1,class:"text-red-600"},wt=t("div",{class:"flex flex-row justify-end md:w-[72rem] laptop:w-[72rem] lg:w-[85rem] desktop:w-[85rem] gap-2 row-start-10 pb-10"},[t("div",{class:"justify-stretch"},[t("button",{class:"h-10 font-bold text-white bg-blue-500 rounded laptop:w-40 hover:bg-blue-700",type:"submit",as:"button"}," Save ")]),t("div",{class:""},[t("button",{class:"px-4 py-2 font-bold text-black bg-gray-200 rounded hover:bg-gray-400",as:"button",onclick:"history.back()"}," Cancel ")])],-1),Ft={__name:"Create",setup(xt){q.start();const _=N(!1),f=P(),b=y(()=>f.props.flash.success,_.value=!0),v=y(()=>f.props.flash.error,_.value=!0),s=T({dentist_id:null,last_name:null,first_name:null,middle_name:null,user_type:"dentist",email:null,contact_number:null,password:null,confirmPassword:null});c(()=>s.password,r=>{/^(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*()_+])[A-Za-z\d!@#$%^&*()_+]{8,}$/.test(r)?s.errors.password=null:s.errors.password="Password must have at least 1 uppercase letter, 1 number, 1 special character, and be at least 8 characters long"}),c(()=>s.last_name,r=>{s.errors.last_name=r?/^\d+$/.test(r)?"Last name should only contain letters":/^\s/.test(r)?"Last name must start with a letter":"":"Last name is required"}),c(()=>s.first_name,r=>{s.errors.first_name=r?/^\d+$/.test(r)?"First name should only contain letters":/^\s/.test(r)?"First name must start with a letter":"":"First name is required"}),c(()=>s.middle_name,r=>{s.errors.middle_name=/^\s/.test(r)?"Middle name must start with a letter":""}),c(()=>s.contact_number,r=>{s.errors.contact_number=r?/^[09]\d{10}$/.test(r)?/^\D+$/.test(r)?"Contact number should only contain numbers":"":"Contact number should start with 09 and be exactly 11 digits":"Contact Number is required"});const C=()=>{s.password!==s.confirmPassword?s.errors.confirmPassword=["Password do not match"]:s.post(route("admin.dentist.store"))};return(r,o)=>(l(),h(U,null,{mainContent:w(()=>[t("div",D,[t("div",$,[t("div",B,[b.value&&_.value?(l(),h(e(k),{key:0,"x-data":"{shown: false, timeout:null}","x-init":"clearTimeout(timeout); shown = true; timeout = setTimeout(() => { shown = false }, 5000);","x-show.transition.opacity.out.duration.5000ms":"shown",closable:"",type:"success"},{default:w(()=>[d(n(b.value),1)]),_:1})):i("",!0),v.value&&_.value?(l(),h(e(k),{key:1,"x-data":"{shown: false, timeout:null}","x-init":"clearTimeout(timeout); shown = true; timeout = setTimeout(() => { shown = false }, 5000);","x-show.transition.opacity.out.duration.5000ms":"shown",closable:"",type:"danger"},{default:w(()=>[d(n(v.value),1)]),_:1})):i("",!0)]),E,t("div",F,[t("form",{onSubmit:x(C,["prevent"])},[t("div",V,[t("div",M,[R,t("div",z,[t("a",I,[A(S),d(" User List ")])]),K]),j,t("div",O,[t("div",Z,[t("div",H,[J,m(t("input",{class:"capitalize rounded-md textbox laptop:w-80 drop-shadow-lg",type:"text","onUpdate:modelValue":o[0]||(o[0]=a=>e(s).user_type=a),disabled:""},null,512),[[p,e(s).user_type]])]),t("div",W,[G,m(t("input",{class:"rounded-md textbox laptop:w-80 drop-shadow-lg","onUpdate:modelValue":o[1]||(o[1]=a=>e(s).last_name=a),type:"text",placeholder:"dela Cruz",required:""},null,512),[[p,e(s).last_name]]),e(s).errors.last_name?(l(),u("div",Q,n(e(s).errors.last_name),1)):i("",!0)]),t("div",X,[Y,m(t("input",{class:"rounded-md textbox laptop:w-80 drop-shadow-lg","onUpdate:modelValue":o[2]||(o[2]=a=>e(s).first_name=a),type:"text",placeholder:"Juan",required:""},null,512),[[p,e(s).first_name]]),e(s).errors.first_name?(l(),u("div",tt,n(e(s).errors.first_name),1)):i("",!0)]),t("div",st,[et,m(t("input",{class:"rounded-md textbox laptop:w-80 drop-shadow-lg","onUpdate:modelValue":o[3]||(o[3]=a=>e(s).middle_name=a),type:"text",placeholder:"Bautista"},null,512),[[p,e(s).middle_name]]),e(s).errors.middle_name?(l(),u("div",ot,n(e(s).errors.middle_name),1)):i("",!0)]),t("div",rt,[at,m(t("input",{onKeydown:o[4]||(o[4]=g(x(()=>{},["prevent"]),["space"])),class:"rounded-md textbox laptop:w-80 drop-shadow-lg","onUpdate:modelValue":o[5]||(o[5]=a=>e(s).email=a),type:"email",placeholder:"jbdelacruz@slu.edu.ph",required:""},null,544),[[p,e(s).email]]),e(s).errors.email?(l(),u("div",dt,n(e(s).errors.email),1)):i("",!0)]),t("div",lt,[nt,m(t("input",{onKeydown:o[6]||(o[6]=g(x(()=>{},["prevent"]),["space"])),class:"rounded-md textbox laptop:w-80 drop-shadow-lg",type:"text","onUpdate:modelValue":o[7]||(o[7]=a=>e(s).contact_number=a),placeholder:"09123456789",required:""},null,544),[[p,e(s).contact_number]]),e(s).errors.contact_number?(l(),u("div",it,n(e(s).errors.contact_number),1)):i("",!0)])])]),mt,t("div",pt,[ut,m(t("input",{class:"rounded-md textbox laptop:w-80 drop-shadow-lg","onUpdate:modelValue":o[8]||(o[8]=a=>e(s).password=a),type:"password",required:""},null,512),[[p,e(s).password]]),e(s).errors.password?(l(),u("div",ct,n(e(s).errors.password),1)):i("",!0),_t,m(t("input",{class:"rounded-md textbox laptop:w-80 drop-shadow-lg","onUpdate:modelValue":o[9]||(o[9]=a=>e(s).confirmPassword=a),type:"password",required:""},null,512),[[p,e(s).confirmPassword]]),e(s).errors.confirmPassword?(l(),u("div",ht,n(e(s).errors.confirmPassword[0]),1)):i("",!0)]),wt])],40,L)])])])]),_:1}))}};export{Ft as default};