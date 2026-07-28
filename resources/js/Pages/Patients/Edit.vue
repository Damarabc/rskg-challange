<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, useForm, Link } from '@inertiajs/vue3';

const props = defineProps({ patient: Object });

const form = useForm({
    name: props.patient.name,
    nik: props.patient.nik,
    phone_number: props.patient.phone_number,
    address: props.patient.address,
});

const submit = () => {
    form.put(route('patients.update', props.patient.id));
};
</script>

<template>
    <Head title="Edit Pasien" />
    <AuthenticatedLayout>

        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Edit Data Pasien</h2>
        </template>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 max-w-2xl mx-auto">
                    <form @submit.prevent="submit">

                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Nama Pasien</label>
                            <input v-model="form.name" type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700" required>
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">NIK</label>
                            <input v-model="form.nik" type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700" required>
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">No. Handphone</label>
                            <input v-model="form.phone_number" type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700" required>
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Alamat</label>
                            <textarea v-model="form.address" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700" rows="3" required></textarea>
                        </div>
                        <div class="flex items-center justify-between">
                            <button type="submit" class="bg-indigo-500 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded" :disabled="form.processing">
                                Update Data
                            </button>
                            <Link :href="route('patients.index')" class="text-gray-500 hover:text-gray-800">Batal</Link>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>