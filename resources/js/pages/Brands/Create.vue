<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import {Head, Link, router, useForm} from '@inertiajs/vue3';
import {BreadcrumbItem} from '@/types';
import {dashboard} from '@/routes';
import BrandForm from './Partials/BrandForm.vue';

const breadcrumbs: BreadcrumbItem[] = [
    {title: 'Inicio', href: dashboard().url},
    {title: 'Marcas', href: '/brands'},
    {title: 'Crear Marca', href: '/brands/create'},
];

const form = useForm({
    name: '',
});

const submit = () => {
    form.post('/brands', {
        onSuccess: () => {
            form.reset();
        },
    });
};
</script>

<template>
    <Head title="Crear Marca"/>

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="p-4 space-y-6">

            <h1 class="text-xl font-bold">Nueva Marca</h1>

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
