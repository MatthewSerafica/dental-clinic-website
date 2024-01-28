<template>
    <div v-for="chart in patients.charts">
        {{chart.tooth_code}}
    </div>
    
    <div>
        <h1 class="flex flex-col items-start gap-2 absolute w-[109px] h-[21px] p-0 left-7 top-5 font-medium">
            PATIENTS
        </h1>

    
        <h6 class="absolute w-[900px] sm:w-[1400px] xl:w-[1500px] h-[1000px] text-xs text-gray-400 top-10 left-7">
            <a href="/">Home</a> > <a href="/patient">Patients</a>> 
            Patient Details
        </h6>
    </div>

    <div class="absolute top-6 left-[600px] sm:left-[1080px]">

        <a href="/patient" class="flex items-center gap-2 px-5 py-2 font-bold text-white bg-blue-500 rounded hover:bg-blue-700">
            <ArrowLeft />
            Patient List
        </a>
    </div>

    <div class="relative left-7 top-[70px]">
        <h1 class="text-[1.5rem] font-medium">PATIENT DETAILS </h1>
        <!-- <hr class="h-3 w-[15rem]"> -->
    </div>

    <div class="relative w-[700px] h-[350px] md:w-[1200px] md:h-[200px] left-7 top-[5rem] bg-[#ffffff]">
            <div class="flex flex-wrap md:justify gap-[4rem] relative top-5 left-7">
                <div>
                    <h1 class="deets text-gray-400">ID Number</h1>
                    <h2 class="details"> {{ patients.id }}</h2>
                </div>
                <div>
                    <h1 class="deets text-gray-400">Last Name</h1>
                    <h2 class="details"> {{ patients.last_name }}</h2>
                </div>
                <div>
                    <h1 class="deets text-gray-400">First Name</h1>
                    <h2 class="details"> {{ patients.first_name }}</h2>
                </div>
                <div>
                    <h1 class="deets text-gray-400">Gender</h1>
                    <h2 class="details"> {{ patients.sex }}</h2>
                </div>
                <div>
                    <h1 class="deets text-gray-400">Email</h1>
                    <h2 class="details"> test</h2>
                </div>
                <div>
                    <h1 class="deets text-gray-400">Age</h1>
                    <h2 class="details">test</h2>
                </div>
                <div>
                    <h1 class="deets text-gray-400">Birth Date </h1>
                    <h2 class="details"> {{ patients.birth_date }}</h2>
                </div>
                <div>
                    <h1 class="deets text-gray-400">Civil Status</h1>
                    <h2 class="details"> {{ patients.civil_status }}</h2>
                </div>
                <div></div>
                <div>
                    <h1 class="deets text-gray-400">Address </h1>
                    <h2 class="details"> {{ patients.address }}</h2>
                </div>
            </div>
    </div>
    <div >
        <h1 class="text-[1.5rem] font-medium relative left-[47rem] top-[-19.4rem] md:left-7 md:top-[7rem]"> MEDICAL and DENTAL HISTORY</h1>
        <!-- <hr class="h-3 w-[15rem] relative left-7 top-5"> -->
    </div>

    <div class="relative w-[700px] h-[350px] md:w-[1200px] md:h-[200px] left-[47rem] top-[-19.1rem] md:left-7 md:top-[8rem] bg-[#ffffff] rounded ">
            <div class="flex flex-wrap md:justify gap-[3rem] relative top-5 left-7">
                <div>
                    <h1 class="deets text-gray-400">Allergy </h1>
                    <h2 class="details"> {{ patients.allergy }}</h2>
                </div>
                <div>
                    <h1 class="deets text-gray-400">Diabetes </h1>
                    <h2 class="details"> {{ patients.diabetes }}</h2>
                </div>
                <div>
                    <h1 class="deets text-gray-400">Blood Dyscrasia</h1>
                    <h2 class="details"> {{ patients.blood_dyscrasia }}</h2>
                </div>
                <div>
                    <h1 class="deets text-gray-400">Cardio vascular disease</h1>
                    <h2 class="details"> {{ patients.cardiovascular_disease }}</h2>
                </div>
                <div>
                    <h1 class="deets text-gray-400">Disorder</h1>
                    <h2 class="details"> {{ patients.cns_disorder }}</h2>
                </div>
                <div>
                    <h1 class="deets text-gray-400">Other</h1>
                    <h2 class="details"> {{ patients.other }}</h2>
                </div>
                <div>
                    <h1 class="deets text-gray-400"> Dental Related disease</h1>
                    <h2 class="details"> {{ patients.other }}</h2>
                </div>


            </div>
    </div>

    <div class="flex items-center relative top-[5rem]">
        <div>
            <button
            @click="addNewRecord"
            class="relative left-[66.6rem] top-[-22rem] md:top-[6rem] bg-green-500 hover:bg-green-700 rounded px-5 py-2 flex items-center text-white font-medium">
                Add New Record
        </button>
        <h1 class="relative left-[2rem] top-[-25rem] md:top-[3rem] text-[1.5rem] font-medium"> TREATMENT RECORD </h1>
        </div>
        

        <Modal :show="showAddNewRecordModal" @close="closeModal">
            <div class="grid h-full grid-rows-2 p-10 my-10 gap-y-36">
                <form @submit.prevent="create">
                    <div class="absolute left-0 w-full h-full top-5">
                        <div class="grid grid-rows-1">
                            <div
                                class="grid grid-cols-3 px-8 mx-10 gap-x-20 gap-y-5"
                            >
                                <div>
                                    <div for="date" class="text-slate-300">
                                        Date
                                    </div>
                                    <input
                                        class="rounded"
                                        v-model="form.date"
                                        type="date"
                                    />
                                    <div
                                        v-if="form.errors.date"
                                        class="text-red-600"
                                    >
                                        {{ form.errors.date }}
                                    </div>
                                </div>

                                <div>
                                    <div for="time_in" class="text-slate-300">
                                        Time In
                                    </div>
                                    <input
                                        class="rounded"
                                        v-model="form.time_in"
                                        type="time"
                                    />
                                    <div
                                        v-if="form.errors.time_in"
                                        class="text-red-600"
                                    >
                                        {{ form.errors.time_in }}
                                    </div>
                                </div>

                                <div>
                                    <div
                                        for="service_rendered"
                                        class="text-slate-300"
                                    >
                                        Service Rendered
                                    </div>
                                    <input
                                        class="rounded"
                                        v-model="form.service_rendered"
                                        type="text"
                                    />
                                    <div
                                        v-if="form.errors.service_rendered"
                                        class="text-red-600"
                                    >
                                        {{ form.errors.service_rendered }}
                                    </div>
                                </div>

                                <div>
                                    <div
                                        for="finding_diagnosis"
                                        class="text-slate-300"
                                    >
                                        Findings/Diagnosis/Prescription
                                    </div>
                                    <input
                                        class="rounded"
                                        type="text"
                                        v-model="form.finding_diagnosis"
                                    />
                                    <div
                                        v-if="form.errors.finding_diagnosis"
                                        class="text-red-600"
                                    >
                                        {{ form.errors.finding_diagnosis }}
                                    </div>
                                </div>

                                <div>
                                    <div for="remarks" class="text-slate-300">
                                        Remarks
                                    </div>
                                    <input
                                        class="rounded"
                                        type="text"
                                        v-model="form.remarks"
                                    />
                                    <div
                                        v-if="form.errors.remarks"
                                        class="text-red-600"
                                    >
                                        {{ form.errors.remarks }}
                                    </div>
                                </div>

                                <div>
                                    <div for="time_out" class="text-slate-300">
                                        Time Out
                                    </div>
                                    <input
                                        class="rounded"
                                        v-model.number="form.time_out"
                                        type="time"
                                    />
                                    <div
                                        v-if="form.errors.time_out"
                                        class="text-red-600"
                                    >
                                        {{ form.errors.time_out }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="grid grid-cols-4 px-20 py-4 mx-2 gap-x-80">
                            <div class="col-span-2 row-start-1"></div>
                            <div class="col-span-4 row-start-1">
                                <PrimaryButton type="submit" as="button"
                                    >Save Changes</PrimaryButton
                                >
                                <PrimaryButton @click="closeModal"
                                    >Cancel</PrimaryButton
                                >
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </Modal>
    </div>
    <table class="md:w-[1200px] text-sm text-center text-gray-500 relative top-[-300px] left-7 md:top-[150px]">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
            <tr class="text-sm text-center text-black relative left-0 md:top-[1px]">
                <th>Date</th>
                <th>Time-in</th>
                <th>Service Rendered</th>
                <th>Clinical Findings/Diagnosis/Presrcription</th>
                <th>Remarks</th>
                <th>Time-out</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <tr
                v-for="treatment in patients.treatments"
                :key="treatment.id"
                class="bg-white border-b relative md:top-[5px]"
            >
                <th>
                    {{ treatment.date }}
                </th>
                <th>
                    {{ treatment.time_in }}
                </th>
                <th>
                    {{ treatment.service_rendered }}
                </th>
                <th>{{ treatment.finding_diagnosis }}</th>
                <th>{{ treatment.remarks }}</th>
                <th>{{ treatment.time_out }}</th>
                <th>
                    <Link
                        :href="`/treatment/${treatment.id}/edit`"
                        as="button"
                        class=" bg-blue-500 hover:bg-blue-700 rounded px-4 py-2 text-white font-medium">
                    <!--<editicon></editicon>-->
                        EDIT
                    </Link>
                 </th>
                 <th>  
                    


                <!--Delete Button
                    <Link
                        :href="`/treatment/${treatment.id}`"
                        method="DELETE"
                        as="button"
                        class="px-5 py-2 font-bold text-white bg-red-500 rounded gap-x-2 hover:bg-red-700"
                    >
                        DELETE
                    </Link>
                -->



                </th>
            </tr>
        </tbody>
    </table>

    <div class="relative  left-7 top-[70px] md:left-7 md:top-[280px]">
        <h1 class="text-[1.5rem] font-medium"> DENTAL CHART</h1>
        <div class="h-[1000px] w-[1200px] bg-white">

            <div class="flex justify-center gap-3 relative top-[2rem]">
                <div class="flex items-center justify-center">
                    <input type="text" class="w-[4rem]">
                    <input type="text" class="w-[4rem]">
                    <input type="text" class="w-[4rem]">
                    <input type="text" class="w-[4rem]">
                    <input type="text" class="w-[4rem]">
                </div>
                <div class="absolute flex gap-12 items-center left-[18rem] top-12">
                    <h1>55</h1>
                    <h1>54</h1>
                    <h1>53</h1>
                    <h1>52</h1>
                    <h1>51</h1>
                </div>
                <div class="flex items-center justify-center">
                    <input type="text" class="w-[4rem]">
                    <input type="text" class="w-[4rem]">
                    <input type="text" class="w-[4rem]">
                    <input type="text" class="w-[4rem]">
                    <input type="text" class="w-[4rem]">
                </div>
                <div class="absolute flex gap-12 items-center left-[39rem] top-12">
                    <h1>61</h1>
                    <h1>62</h1>
                    <h1>63</h1>
                    <h1>64</h1>
                    <h1>65</h1>
                </div>
            </div>
            <!-- 55 to 51 circle -->
            <div class="flex justify-center gap-4 relative top-[5rem] left-1">
                <div class="flex items-center justify-center gap-4">
                    <FiveCircles></FiveCircles>
                </div>

                <!-- 61 to 65 circle -->
                <div class="flex items-center justify-center gap-4">
                    <FiveCircles></FiveCircles>
                </div>
            </div>

            <div class="flex justify-center gap-3 relative top-[8rem]">
                <div class="flex items-center justify-center">
                    <input type="text" class="w-[4rem]">
                    <input type="text" class="w-[4rem]">
                    <input type="text" class="w-[4rem]">
                    <input type="text" class="w-[4rem]">
                    <input type="text" class="w-[4rem]">
                    <input type="text" class="w-[4rem]">
                    <input type="text" class="w-[4rem]">
                    <input type="text" class="w-[4rem]">
                </div>
                <div class="absolute flex gap-12 items-center left-[6.5rem] top-[11rem]">
                    <hr class="absolute bg-black h-1 w-[490px] opacity-10 left-[-5px]">
                    <h1>18</h1>
                    <h1>17</h1>
                    <h1>16</h1>
                    <h1>15</h1>
                    <h1>14</h1>
                    <h1>13</h1>
                    <h1>12</h1>
                    <h1>11</h1>
                </div>
                <div class="flex items-center justify-center">
                    <input type="text" class="w-[4rem]">
                    <input type="text" class="w-[4rem]">
                    <input type="text" class="w-[4rem]">
                    <input type="text" class="w-[4rem]">
                    <input type="text" class="w-[4rem]">
                    <input type="text" class="w-[4rem]">
                    <input type="text" class="w-[4rem]">
                    <input type="text" class="w-[4rem]">
                </div>
                <div class="absolute flex gap-12 items-center left-[39rem] top-[11rem]">
                    <hr class="absolute bg-black h-1 w-[490px] opacity-10 left-[-5px]">
                    <h1>21</h1>
                    <h1>22</h1>
                    <h1>23</h1>
                    <h1>24</h1>
                    <h1>25</h1>
                    <h1>26</h1>
                    <h1>27</h1>
                    <h1>28</h1>
                </div>
            </div>
            <div class="flex justify-center gap-3 relative top-[8rem]">
                <div class="flex items-center justify-center">
                    <input type="text" class="w-[4rem]">
                    <input type="text" class="w-[4rem]">
                    <input type="text" class="w-[4rem]">
                    <input type="text" class="w-[4rem]">
                    <input type="text" class="w-[4rem]">
                    <input type="text" class="w-[4rem]">
                    <input type="text" class="w-[4rem]">
                    <input type="text" class="w-[4rem]">
                </div>
                <div class="flex items-center justify-center">
                    <input type="text" class="w-[4rem]">
                    <input type="text" class="w-[4rem]">
                    <input type="text" class="w-[4rem]">
                    <input type="text" class="w-[4rem]">
                    <input type="text" class="w-[4rem]">
                    <input type="text" class="w-[4rem]">
                    <input type="text" class="w-[4rem]">
                    <input type="text" class="w-[4rem]">
                </div>
            </div>
            <!-- LABIAL -->
            <!-- 18 to 11 circle -->
            <div class="flex justify-center gap-4 relative top-[10rem] left-1">
                <div class="flex items-center justify-center gap-4">
                    <EightCircles></EightCircles>
                </div>

                <!-- 21 to 28 cricle -->
                <div class="flex items-center justify-center gap-4">
                    <EightCircles></EightCircles>
                </div>
            </div>
            <!-- LINGUAL -->
            <div class="flex justify-center gap-4 relative top-[10rem] left-1 mt-[7rem]">
                <div class="flex items-center justify-center gap-4">
                    <EightCircles></EightCircles>
                </div>
                
                <div class="flex items-center justify-center gap-4">
                    <EightCircles></EightCircles>
                </div>
            </div>

            <div class="flex justify-center gap-3 relative top-[16rem] mt-[-4rem]">
                <div class="flex items-center justify-center">
                    <input type="text" class="w-[4rem]">
                    <input type="text" class="w-[4rem]">
                    <input type="text" class="w-[4rem]">
                    <input type="text" class="w-[4rem]">
                    <input type="text" class="w-[4rem]">
                    <input type="text" class="w-[4rem]">
                    <input type="text" class="w-[4rem]">
                    <input type="text" class="w-[4rem]">
                </div>
                <div class="flex items-center justify-center">
                    <input type="text" class="w-[4rem]">
                    <input type="text" class="w-[4rem]">
                    <input type="text" class="w-[4rem]">
                    <input type="text" class="w-[4rem]">
                    <input type="text" class="w-[4rem]">
                    <input type="text" class="w-[4rem]">
                    <input type="text" class="w-[4rem]">
                    <input type="text" class="w-[4rem]">
                </div>
            </div>
            <div class="flex justify-center gap-3 relative top-[16rem]">
                <div class="flex items-center justify-center">
                    <input type="text" class="w-[4rem]">
                    <input type="text" class="w-[4rem]">
                    <input type="text" class="w-[4rem]">
                    <input type="text" class="w-[4rem]">
                    <input type="text" class="w-[4rem]">
                    <input type="text" class="w-[4rem]">
                    <input type="text" class="w-[4rem]">
                    <input type="text" class="w-[4rem]">
                </div>
                <div class="flex items-center justify-center">
                    <input type="text" class="w-[4rem]">
                    <input type="text" class="w-[4rem]">
                    <input type="text" class="w-[4rem]">
                    <input type="text" class="w-[4rem]">
                    <input type="text" class="w-[4rem]">
                    <input type="text" class="w-[4rem]">
                    <input type="text" class="w-[4rem]">
                    <input type="text" class="w-[4rem]">
                </div>
            </div>

            <div class="flex justify-center gap-4 relative top-[17rem] left-1">
                <div class="flex items-center justify-center gap-4">
                    <FiveCircles></FiveCircles>
                </div>
                <div class="flex items-center justify-center gap-4">
                    <FiveCircles></FiveCircles>
                </div>
            </div>

            <div class="flex justify-center gap-3 relative top-[20rem]">
                <div class="flex items-center justify-center">
                    <input type="text" class="w-[4rem]">
                    <input type="text" class="w-[4rem]">
                    <input type="text" class="w-[4rem]">
                    <input type="text" class="w-[4rem]">
                    <input type="text" class="w-[4rem]">
                </div>
                <div class="flex items-center justify-center">
                    <input type="text" class="w-[4rem]">
                    <input type="text" class="w-[4rem]">
                    <input type="text" class="w-[4rem]">
                    <input type="text" class="w-[4rem]">
                    <input type="text" class="w-[4rem]">
                </div>
            </div>
            
        </div>
    </div>

    
</template>

<script setup>
import EightCircles from "@/Components/EightCircles.vue"
import FiveCircles from "@/Components/FiveCircles.vue";
import { useForm } from "@inertiajs/vue3";
import { Link } from "@inertiajs/vue3";
import { ref } from "vue";
import Modal from "@/Components/Modal.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import editicon from '@/Components/EditIcon.vue';
import ArrowLeft from "@/Components/ArrowLeft.vue";

const props = defineProps({
    patients: Object,
});

const showAddNewRecordModal = ref(false);

const addNewRecord = () => {
    showAddNewRecordModal.value = true;
};

const closeModal = () => {
    showAddNewRecordModal.value = false;
};

const form = useForm({
    date: null,
    time_in: null,
    service_rendered: null,
    finding_diagnosis: null,
    remarks: null,
    time_out: null,
});

const create = () =>
    form.post(
        route("patient.treatment.store", { patient: props.patients.id }),
        { preserveScroll: true, preserveState: false }
    );
</script>
