<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import {Head, Link, router} from '@inertiajs/vue3';
import {BreadcrumbItem} from "@/types";
import {dashboard} from "@/routes";

const props = defineProps<{
    brands: Array<{
        id: number;
        name: string;
        created_at: string;
    }>;
}>();

const breadcrumbs: BreadcrumbItem[] = [
    {title: 'Inicio', href: dashboard().url},
    {title: 'Marcas de Vehículos', href: '/brands'},
];

// 🔴 Eliminar SIN route()
const destroyBrand = (brandId: number) => {
    if (!confirm("¿Deseas eliminar esta marca?")) return;

    router.delete(`/brands/${brandId}`, {
        preserveScroll: true,
    });
};
</script>

<template>
    <Head title="Marcas de Vehículos"/>

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="flex flex-col gap-4 p-4">

            <!-- Encabezado -->
            <div class="flex justify-between items-center mb-4">
                <h1 class="text-xl font-bold">Marcas de Vehículos</h1>

                <Link
                    href="/brands/create"
                    class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700"
                >
                    Nueva Marca
                </Link>
            </div>

            <!-- Tabla -->
            <div class="overflow-x-auto bg-white shadow rounded-lg">
                <table class="min-w-full text-sm">
                    <thead class="bg-gray-100 border-b">
                    <tr>
                        <th class="px-4 py-2 text-left">ID</th>
                        <th class="px-4 py-2 text-left">Nombre</th>
                        <th class="px-4 py-2 text-left">Creado</th>
                        <th class="px-4 py-2 text-right">Acciones</th>
                    </tr>
                    </thead>

                    <tbody>
                    <tr v-for="brand in props.brands" :key="brand.id" class="border-b hover:bg-gray-50">
                        <td class="px-4 py-2">{{ brand.id }}</td>
                        <td class="px-4 py-2">{{ brand.name }}</td>
                        <td class="px-4 py-2">{{ brand.created_at }}</td>

                        <td class="px-4 py-2 text-right flex justify-end gap-2">
                            <Link
                                :href="`/brands/${brand.id}/edit`"
                                class="px-3 py-1 bg-yellow-500 text-white rounded hover:bg-yellow-600"
                            >
                                Editar
                            </Link>

                            <button
                                @click="destroyBrand(brand.id)"
                                class="px-3 py-1 bg-red-600 text-white rounded hover:bg-red-700"
                            >
                                Eliminar
                            </button>
                        </td>
                    </tr>

                    <tr v-if="props.brands.length === 0">
                        <td colspan="4" class="text-center py-4 text-gray-500">
                            No hay marcas registradas.
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>

        </div>
    </AppLayout>
</template>
