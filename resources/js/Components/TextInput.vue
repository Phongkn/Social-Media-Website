<script setup>
import { onMounted, ref } from 'vue';

const model = defineModel({
    type: String,
    required: true,
});

const input = ref(null);

onMounted(() => {
    if (input.value.hasAttribute('autofocus')) {
        input.value.focus();
    }
});

defineExpose({ focus: () => input.value.focus() });
</script>

<template>
    <input
        class="rounded-md border-[#dadde1] bg-[#f5f6f7] text-[#1c1e21] shadow-sm focus:border-[#1877f2] focus:ring-[#1877f2]"
        v-model="model"
        ref="input"
    />
</template>
