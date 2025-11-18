<template>
    <header class="h-14 bg-white shadow flex items-center justify-between px-6">

        <h1 class="text-lg font-medium">
            {{ title }}
        </h1>

        <button @click="logout" class="px-3 py-1 bg-red-500 text-white rounded hover:bg-red-600">
            Sair
        </button>

    </header>
</template>

<script setup>
import { ref, watch } from 'vue'
import { useRoute, useRouter } from 'vue-router'
import axios from 'axios'

const title = ref('')
const route = useRoute()
const router = useRouter()

// Atualiza o título com o nome da rota
watch(
    () => route.name,
    (newName) => {
        title.value = newName ? newName.toUpperCase() : ''
    },
    { immediate: true }
)

async function logout() {
    await axios.post('/api/admin/logout')
    router.push('/admin/login')
}
</script>
