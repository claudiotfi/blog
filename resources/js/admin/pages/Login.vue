<script setup>
import axios from 'axios'
import { ref } from 'vue'
import { useRouter } from 'vue-router'

const email = ref('')
const password = ref('')
const error = ref('')
const router = useRouter()

const login = async () => {
    error.value = ''

    try {
        // 1. Pega CSRF token
        await axios.get('/sanctum/csrf-cookie', { baseURL: '/' })

        // 2. Faz login na API correta
        await axios.post('/admin/login', {
            email: email.value,
            password: password.value
        }, { withCredentials: true })

        // 3. Redireciona para o dashboard
        router.push('/admin')

    } catch (err) {
        error.value = 'Credenciais inválidas'
    }
}
</script>

<template>
    <div class="min-h-screen flex items-center justify-center bg-gray-100 p-6">

        <div class="bg-white shadow-lg rounded-lg p-8 w-full max-w-sm">

            <h1 class="text-2xl font-bold text-center mb-6">Admin Login</h1>

            <form @submit.prevent="login" class="space-y-4">

                <div>
                    <label class="text-sm text-gray-600">Email</label>
                    <input type="email" v-model="email"
                        class="mt-1 w-full border rounded p-2 focus:ring focus:ring-blue-300" />
                </div>

                <div>
                    <label class="text-sm text-gray-600">Senha</label>
                    <input type="password" v-model="password"
                        class="mt-1 w-full border rounded p-2 focus:ring focus:ring-blue-300" />
                </div>

                <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700 transition">
                    Entrar
                </button>

                <p v-if="error" class="text-red-600 text-sm mt-2 text-center">
                    {{ error }}
                </p>
            </form>
        </div>

    </div>
</template>
