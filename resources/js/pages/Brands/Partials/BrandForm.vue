<script setup lang="ts">
import {Form} from '@inertiajs/vue3';

const props = defineProps<{
    form: any;
}>();

const emit = defineEmits(['submit']);

const submit = () => emit('submit');
</script>

<template>
    <form @submit.prevent="submit" class="space-y-4 max-w-md">

        <div>
            <label class="block text-sm font-medium mb-1">
                Nombre de la Marca
            </label>

            <input
                type="text"
                v-model="form.name"
                class="w-full rounded-lg border-gray-300 shadow-sm"
            />

            <div v-if="form.errors.name" class="text-sm text-red-500 mt-1">
                {{ form.errors.name }}
            </div>
        </div>

        <button
            type="submit"
            class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700"
            :disabled="form.processing"
        >
            Guardar
        </button>
    </form>
</template>
