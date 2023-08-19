<template>
    <form @submit.prevent="create">
        <div>
            <div>
                <label for="idnumber">ID Number</label>
                <input v-model.number="form.id_number" type="text" />
            </div>

            <div>
                <div>User Type</div>
                <select v-model="form.pat_type">
                    <option disabled value="">Please select one</option>
                    <option>Student</option>
                    <option>Employee</option>
                </select>
            </div>

            <div>
                <label for="fname">First Name</label>
                <input v-model="form.first_name" type="text" />
            </div>

            <div>
                <label for="lname">Last Name</label>
                <input v-model="form.last_name" type="text" />
            </div>

            <div>
                <label for="birth">Date of Birth</label>
                <input v-model="form.birth_date" type="date" />
            </div>

            <div>
                <div>Sex</div>
                <select v-model="form.sex">
                    <option disabled value="">Please select one</option>
                    <option>Male</option>
                    <option>Female</option>
                </select>
            </div>

            <div>
                <label for="address">Complete Address</label>
                <input v-model="form.address" type="text" />
            </div>

            <div>
                <div>Civil Status</div>
                <select v-model="form.civil_status">
                    <option disabled value="">Please select one</option>
                    <option>Single</option>
                    <option>Married</option>
                    <option>Separated</option>
                    <option>Divorced</option>
                    <option>Widowed</option>
                </select>
            </div>

            <div>
                <button type="submit">Save Changes</button>
            </div>
        </div>
    </form>
</template>

<script setup>
import { useForm } from "@inertiajs/vue3";

const form = useForm({
    id_number: 0,
    pat_type: null,
    last_name: null,
    first_name: null,
    birth_date: null,
    address: null,
    sex: null,
    civil_status: null,
});

const create = () => form.post("/patient");
</script>
