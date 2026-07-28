<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link, useForm, usePage } from '@inertiajs/vue3';

defineProps({ patients: Array });

// Get data user yang sedang login for check role
const user = usePage().props.auth.user;
const form = useForm({});

const deletePatient = (id) => {
    if (confirm('Yakin ingin menghapus data pasien ini?')) {
        form.delete(route('patients.destroy', id));
    }
};
</script>

<template>
    <Head title="Data Pasien" />
    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Kelola Data Pasien</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <Link :href="route('patients.create')" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-4 inline-block">
                        + Tambah Pasien
                    </Link>

                    <table class="w-full text-left border-collapse mt-4">
                        <thead>
                            <tr>
                                <th class="border-b py-2">Nama</th>
                                <th class="border-b py-2">NIK</th>
                                <th class="border-b py-2">No HP</th>
                                <th class="border-b py-2">Alamat</th>
                                <th class="border-b py-2">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="patient in patients" :key="patient.id">
                                <td class="border-b py-2">{{ patient.name }}</td>
                                <td class="border-b py-2">{{ patient.nik }}</td>
                                <td class="border-b py-2">{{ patient.phone_number }}</td>
                                <td class="border-b py-2">{{ patient.address }}</td>
                                <td class="border-b py-2">
                                    <Link :href="route('patients.edit', patient.id)" class="text-indigo-600 hover:text-indigo-900 mr-3">Edit</Link>
                                    
                                    <!-- Render Admin Only(Delete)-->
                                    <button v-if="user.role === 'admin'" @click="deletePatient(patient.id)" class="text-red-600 hover:text-red-900">
                                        Hapus
                                    </button>
                                </td>
                            </tr>
                            <tr v-if="patients.length === 0">
                                <td colspan="5" class="text-center py-4 text-gray-500">Belum ada data pasien.</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>