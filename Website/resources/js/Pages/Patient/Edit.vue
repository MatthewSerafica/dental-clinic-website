<template>
<form @submit.prevent="form.put(route('patient.update', patient.id))">
     <div class="absolute w-[1550px] h-[1100px] left-80 top-20 bg-[#f1f2f2]">
            <h1 class="absolute font-medium top-5 left-7">PATIENTS</h1>

            <h6 class="absolute text-xs text-gray-400 top-10 left-7">
                <a href="/">Home</a> > <a href="/patient">Patients</a> > Edit Patient
            </h6>

            <div class="absolute w-[900px] xl:w-[1300px] h-[750px] left-7 top-20 bg-[#ffffff]" >

                <div>
                    <h1 style="font-size: 1.5rem;" class="absolute font-medium top-7 left-10">Edit Patient</h1>
                    <hr class="h-px my-20 bg-gray-200 border-1 dark:bg-gray-700" />
                </div>



                <div class="absolute top-6 left-[600px] sm:left-[1124px]">

                    <a href="/patient" class="flex items-center gap-2 px-5 py-2 font-bold text-white bg-blue-500 rounded hover:bg-blue-700">
                        <ArrowLeft />
                        Patient List
                    </a>
                </div>

                <div class="md:flex">
                    
                    <div class="absolute top-[150px] left-10">
                        <h1 class="text-gray-400">BASIC INFORMATION</h1>
                    </div>
                    
                    <div
                        class="absolute top-[12rem] left-10 grid gap-x-[1rem] gap-y-4 grid-cols-2 sm:grid-cols-3"
                    >
                    <div>
                        <InputLabel for="id" value="ID Number" />
                        <TextInput id="id" v-model="form.id" type="text" class="textbox" autofocus/>
                        <InputError class="mt-2" :message="form.errors.id" />
                    </div>
                    <div>
                        <InputLabel for="user_type" value="User Type" />
                        <TextInput id="user_type" v-model="form.pat_type" type="text" class="textbox"/>
                        <InputError class="mt-2" :message="form.errors.pat_type" />

                    </div>
                    <div>
                        <InputLabel for="first_name" value="First Name" />
                        <TextInput id="first_name" v-model="form.first_name" type="text" class="textbox"/>
                        <InputError class="mt-2" :message="form.errors.first_name" />
                    </div>
                    <div>
                        <InputLabel for="last_name" value="Last Name" />
                        <TextInput id="last_name" v-model="form.last_name" type="text" class="textbox"/>
                        <InputError class="mt-2" :message="form.errors.last_name" />
                    </div>
                    <div>
                        <InputLabel for="birth_date" value="Date of Birth" />
                        <TextInput id="birth_date" v-model="form.birth_date" type="date" class="textbox"/>
                        <InputError class="mt-2" :message="form.errors.birth_date" />
                    </div>
                    <div>
                        <InputLabel for="sex" value="Sex" />
                        <TextInput id="sex" v-model="form.sex" type="text" class="textbox"/>
                        <InputError class="mt-2" :message="form.errors.sex" />
                    </div>
                    <div>
                        <InputLabel for="address" value="Complete Address" />
                        <TextInput id="address" v-model="form.address" type="text" class="textbox"/>
                        <InputError class="mt-2" :message="form.errors.address" />
                    </div>
                    <div>
                        <InputLabel for="civil_status" value="Civil Status" />
                        <TextInput id="civil_status" v-model="form.civil_status" type="text" class="textbox"/>
                        <InputError class="mt-2" :message="form.errors.civil_status" />
                    </div>
                </div>

                <div  style="padding-top: 100px;">

                    <div class="absolute top-[450px] left-10">
                        <h1 class="text-gray-400">MEDICAL AND DENTAL HISTORY</h1>
                        <p class="text-gray-400">NOTE: Just put the negative sign ( - ) if none and write the specific disease in case of presence</p>
                    </div>
                    
                    <div
                        class="absolute top-[510px] left-10 grid gap-x-[1rem] gap-y-4 grid-cols-2 sm:grid-cols-3"
                    >                
                    
                    <div>
                        <InputLabel for="allergy" value="Allergy" />
                        <TextInput id="allergy" v-model="form.allergy" type="text" class="textbox"/>
                        <InputError class="mt-2" :message="form.errors.allergy" />
                    </div>
                    <div>
                        <InputLabel for="diabetes" value="Diabetes" />
                        <TextInput id="diabetes" v-model="form.diabetes" type="text" class="textbox"/>
                        <InputError class="mt-2" :message="form.errors.diabetes" />
                    </div>
                    <div>
                        <InputLabel for="blood_dyscrasia" value="Blood Dyscrasia" />
                        <TextInput id="blood_dyscrasia" v-model="form.blood_dyscrasia" type="text" class="textbox"/>
                        <InputError class="mt-2" :message="form.errors.blood_dyscrasia" />
                    </div>
                    <div>
                        <InputLabel for="cns_disorder" value="CNS Disorder" />
                        <TextInput id="cns_disorder" v-model="form.cns_disorder" type="text" class="textbox"/>
                        <InputError class="mt-2" :message="form.errors.cns_disorder" />
                    </div>
                    <div>
                        <InputLabel for="cardiovascular_disease" value="
                        Cardiovascular Disease" />
                        <TextInput id="lcardiovascular_disease" v-model="form.cardiovascular_disease" type="text" class="textbox"/>
                        <InputError class="mt-2" :message="form.errors.cardiovascular_disease" />
                    </div>
                    <div>
                        <InputLabel for="other" value="Other" />
                        <TextInput id="other" v-model="form.other" type="text" class="textbox"/>
                        <InputError class="mt-2" :message="form.errors.other" />
                    </div>
                    <div>
                        <InputLabel for=" other_related_dental_surgery" value="Other Related Dental Surgery" />
                        <TextInput id=" other_related_dental_surgery" v-model="form. other_related_dental_surgery" type="text" class="textbox"/>
                        <InputError class="mt-2" :message="form.errors.other_related_dental_surgery" />
                    </div>
                       <div>
                            <div class="absolute bottom-[0vh] right-[28rem] sm:right-[6em]">
                            <button
                                class="px-4 py-2 font-bold text-white bg-blue-500 rounded hover:bg-blue-700"
                                type="submit"
                                as="button"
                            >
                                Save Changes
                            </button>
                        </div>

                        <div class="absolute bottom-[0vh] right-[22rem] sm:right-[0em]">
                            <button
                                class="px-4 py-2 font-bold text-black bg-gray-200 rounded hover:bg-gray-400"
                                as="button"
                                onclick="history.back()"
                            >
                                Cancel
                            </button>
                        </div>
                        
                  </div>
                </div>
               </div>
              </div>
            </div>
            </div>
          
        
     </form>        
</template>

<script setup>
import PrimaryButton from '@/Components/PrimaryButton.vue'
import InputError from '@/Components/InputError.vue'
import InputLabel from '@/Components/InputLabel.vue'
import TextInput from '@/Components/TextInput.vue'
import { useForm } from '@inertiajs/vue3';
import ArrowLeft from "@/Components/ArrowLeft.vue";


const props = defineProps({
    patient:Object,
})
const form = useForm({
    id: props.patient.id,
    pat_type: props.patient.pat_type,
    first_name: props.patient.first_name,
    last_name: props.patient.last_name,
    birth_date: props.patient.birth_date,
    sex: props.patient.sex,
    address: props.patient.address,
    civil_status: props.patient.civil_status,
    allergy: props.patient.allergy,
    diabetes: props.patient.diabetes,
    blood_dyscrasia: props.patient.blood_dyscrasia,
    cns_disorder: props.patient.cns_disorder,
    cardiovascular_disease: props.patient.cardiovascular_disease,
    other: props.patient.other,
    other_related_dental_surgery: props.patient.other_related_dental_surgery
})
</script>