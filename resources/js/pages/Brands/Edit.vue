<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import {Head, Link, router, useForm} from '@inertiajs/vue3';
import {BreadcrumbItem} from '@/types';
import {dashboard} from '@/routes';
import BrandForm from './Partials/BrandForm.vue';

const props = defineProps<{
    brand: {
        id: number;
        name: string;
    };
}>();

const breadcrumbs: BreadcrumbItem[] = [
    {title: 'Inicio', href: dashboard().url},
    {title: 'Marcas', href: '/brands'},
    {title: 'Editar', href: `/brands/${props.brand.id}/edit`},
];

const form = useForm({
    name: props.brand.name,
});

const submit = () => {
    form.put(`/brands/${props.brand.id}`);
};
</script>

<template>
    <Head title="Editar Marca"/>

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="p-4 space-y-6">
            <h1 class="text-xl font-bold">Editar Marca</h1>

            <BrandForm
                :form="form"
                @submit="submit"
            />

            <div>
                <Link
                    href="/brands"
                    class="text-sm text-gray-600 underline hover:text-gray-900"
                >
                    ← Volver a la lista
                </Link>
            </div>
        </div>
    </AppLayout>
</template>
