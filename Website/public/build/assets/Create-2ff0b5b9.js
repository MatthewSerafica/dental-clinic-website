import{T as _,o as d,a,b as t,l as u,e as c,f as h,m as l,v as i,u as e,t as n,d as p,B as x}from"./app-b4ce430c.js";import w from"./MainLayout-6cdefecb.js";import{A as f}from"./ArrowLeft-904c05fa.js";import"./SideBar-a0ceb092.js";import"./SluDentalLogo-fe187267.js";import"./_plugin-vue_export-helper-c27b6911.js";import"./DentistLinks-7d5fe479.js";import"./SideBarLinks-64ab4153.js";import"./DashboardIcon-8610b4cf.js";import"./UsersIcon-eed6ce0f.js";import"./PatientLinks-5b541d90.js";import"./Header-afb0ca39.js";const v={class:"flex flex-col h-screen"},b={class:"absolute rounded top-16 left-64"},g=x('<div class="relative flex flex-col top-4 left-16"><h1 class="w-56 h-8 text-xl font-medium"> CREATE DENTIST </h1><h6 class="h-1 text-xs text-gray-400"><a href="/">Home</a> &gt; <a href="/user">User</a> &gt; <a>Add Dentists</a></h6></div>',1),y={class:"relative laptop:w-[75rem] laptop:h-[36rem] left-10 desktop:top-16 laptop:top-10 desktop:w-[99rem]"},k=["onSubmit"],V={class:"grid desktop:grid-rows-14 bg-[#ffffff] rounded-xl desktop:h-[50rem] desktop:w-[90rem] desktop:px-6 drop-shadow-lg"},N={class:"grid laptop:grid-cols-8 desktop:col-span-2 desktop:grid-cols-6"},U=t("h1",{class:"row-start-1 p-6 font-medium text-l"}," ADD DENTIST ",-1),P={class:"py-4 laptop:col-start-7 desktop:col-start-6 right-2 w-44"},T={href:"/user",class:"flex items-center gap-2 px-6 py-2 font-bold text-white bg-blue-500 rounded hover:bg-blue-700"},C=t("hr",{class:"h-0.5 bg-gray-20 border-1 dark:bg-gray-700 desktop:col-span-6 laptop:col-span-8"},null,-1),D=t("div",{class:"row-start-3 py-5"},[t("h1",{class:"px-6 text-gray-400"},"BASIC INFORMATION")],-1),S={class:"row-start-4 px-14"},A={class:"grid grid-cols-3 left-10 gap-y-4"},E={class:""},B=t("div",null,"User Type",-1),I={key:0,class:"text-red-600"},M={class:"row-start-4"},R=t("div",{for:"lname"},"Last Name",-1),L={key:0,class:"text-red-600"},O={class:"row-start-4"},z=t("div",{for:"fname"},"First Name",-1),F={key:0,class:"text-red-600"},j={class:"row-start-4"},H=t("div",{for:"mname"},"Middle Name",-1),J={key:0,class:"text-red-600"},W={class:"row-start-5"},$=t("div",{for:"id_number"},"Dentist ID",-1),q={key:0,class:"text-red-600"},G={class:"row-start-5"},K=t("div",null,"Email",-1),Q={key:0,class:"text-red-600"},X={class:"row-start-5"},Y=t("div",null,"Contact Number",-1),Z={key:0,class:"text-red-600"},tt=t("div",{class:"row-start-7 pt-2"},[t("h1",{class:"px-6 text-gray-400"},"CREATE PASSWORD")],-1),st={class:"row-start-8 py-3 px-14 pb-10"},et=t("div",null,"Password",-1),ot={key:0,class:"text-red-600"},rt=t("div",{class:"mt-4"},"Confirm Password",-1),dt={key:1,class:"text-red-600"},at=t("div",{class:"grid grid-cols-2 row-start-12 gap-x-2 pb-11"},[t("div",{class:"col-start-8 justify-stretch"},[t("button",{class:"font-bold text-white bg-blue-500 rounded laptop:w-40 hover:bg-blue-700 h-10",type:"submit",as:"button"}," Save Changes ")]),t("div",{class:"laptop:col-start-10 desktop:col-start-9"},[t("button",{class:"px-4 py-2 font-bold text-black bg-gray-200 rounded hover:bg-gray-400",as:"button",onclick:"history.back()"}," Cancel ")])],-1),gt={__name:"Create",setup(lt){const s=_({dentist_id:null,last_name:null,first_name:null,middle_name:null,user_type:"dentist",email:null,contact_number:null,password:null,confirmPassword:null}),m=()=>{s.password!==s.confirmPassword?s.errors.confirmPassword=["Password do not match"]:s.post(route("dentist.store"))};return(it,o)=>(d(),a("div",v,[t("div",b,[g,t("div",y,[t("form",{onSubmit:u(m,["prevent"])},[t("div",V,[t("div",N,[U,t("div",P,[t("a",T,[c(f),h(" User List ")])]),C]),D,t("div",S,[t("div",A,[t("div",E,[B,l(t("input",{class:"capitalize textbox laptop:w-80 rounded-md drop-shadow-lg",type:"text","onUpdate:modelValue":o[0]||(o[0]=r=>e(s).user_type=r),disabled:""},null,512),[[i,e(s).user_type]]),e(s).errors.user_type?(d(),a("div",I,n(e(s).errors.user_type),1)):p("",!0)]),t("div",M,[R,l(t("input",{class:"textbox laptop:w-80 rounded-md drop-shadow-lg","onUpdate:modelValue":o[1]||(o[1]=r=>e(s).last_name=r),type:"text",placeholder:"dela Cruz"},null,512),[[i,e(s).last_name]]),e(s).errors.last_name?(d(),a("div",L,n(e(s).errors.last_name),1)):p("",!0)]),t("div",O,[z,l(t("input",{class:"textbox laptop:w-80 rounded-md drop-shadow-lg","onUpdate:modelValue":o[2]||(o[2]=r=>e(s).first_name=r),type:"text",placeholder:"Juan"},null,512),[[i,e(s).first_name]]),e(s).errors.first_name?(d(),a("div",F,n(e(s).errors.first_name),1)):p("",!0)]),t("div",j,[H,l(t("input",{class:"textbox laptop:w-80 rounded-md drop-shadow-lg","onUpdate:modelValue":o[3]||(o[3]=r=>e(s).middle_name=r),type:"text",placeholder:"Bautista"},null,512),[[i,e(s).middle_name]]),e(s).errors.middle_name?(d(),a("div",J,n(e(s).errors.middle_name),1)):p("",!0)]),t("div",W,[$,l(t("input",{class:"laptop:w-80 textbox rounded-md drop-shadow-lg","onUpdate:modelValue":o[4]||(o[4]=r=>e(s).dentist_id=r),type:"text",placeholder:"2201401"},null,512),[[i,e(s).dentist_id,void 0,{number:!0}]]),e(s).errors.dentist_id?(d(),a("div",q,n(e(s).errors.dentist_id),1)):p("",!0)]),t("div",G,[K,l(t("input",{class:"textbox laptop:w-80 rounded-md drop-shadow-lg","onUpdate:modelValue":o[5]||(o[5]=r=>e(s).email=r),type:"email"},null,512),[[i,e(s).email]]),e(s).errors.email?(d(),a("div",Q,n(e(s).errors.email),1)):p("",!0)]),t("div",X,[Y,l(t("input",{class:"textbox laptop:w-80","onUpdate:modelValue":o[6]||(o[6]=r=>e(s).contact_number=r),type:"text",placeholder:"09123456789"},null,512),[[i,e(s).contact_number]]),e(s).errors.contact_number?(d(),a("div",Z,n(e(s).errors.contact_number),1)):p("",!0)])])]),tt,t("div",st,[et,l(t("input",{class:"textbox laptop:w-80 rounded-md drop-shadow-lg","onUpdate:modelValue":o[7]||(o[7]=r=>e(s).password=r),type:"password"},null,512),[[i,e(s).password]]),e(s).errors.password?(d(),a("div",ot,n(e(s).errors.password),1)):p("",!0),rt,l(t("input",{class:"textbox laptop:w-80 rounded-md drop-shadow-lg","onUpdate:modelValue":o[8]||(o[8]=r=>e(s).confirmPassword=r),type:"password"},null,512),[[i,e(s).confirmPassword]]),e(s).errors.confirmPassword?(d(),a("div",dt,n(e(s).errors.confirmPassword[0]),1)):p("",!0)]),at])],40,k)])]),c(w)]))}};export{gt as default};
