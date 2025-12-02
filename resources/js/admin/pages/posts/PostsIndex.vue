<template>
    <AdminLayout>
        <div class="p-6">

            <!-- Header -->
            <div class="flex items-center justify-between mb-6">
                <h1 class="text-2xl font-bold">Posts</h1>

                <router-link to="/admin/posts/create"
                    class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                    Criar novo post
                </router-link>
            </div>

            <!-- Filters -->
            <div class="bg-white p-4 rounded-md shadow mb-6 grid grid-cols-1 md:grid-cols-4 gap-4">

                <!-- Busca -->
                <input v-model="filters.search" @input="fetchPosts" type="text" placeholder="Buscar por título..."
                    class="border rounded px-3 py-2" />

                <!-- Status -->
                <select v-model="filters.status" @change="fetchPosts" class="border rounded px-3 py-2">
                    <option value="">Todos status</option>
                    <option value="published">Publicado</option>
                    <option value="draft">Rascunho</option>
                    <option value="archived">Arquivado</option>
                </select>

                <!-- Categoria -->
                <select v-model="filters.category_id" @change="fetchPosts" class="border rounded px-3 py-2">
                    <option value="">Todas categorias</option>
                    <option v-for="cat in categories" :key="cat.id" :value="cat.id">
                        {{ cat.name }}
                    </option>
                </select>

            </div>

            <!-- Table -->
            <div class="bg-white rounded shadow overflow-x-auto">

                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="border-b bg-gray-50">
                            <th class="p-3">Título</th>
                            <th class="p-3">Categoria</th>
                            <th class="p-3">Status</th>
                            <th class="p-3">Criado em</th>
                            <th class="p-3 text-right">Ações</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr v-for="post in posts.data" :key="post.id" class="border-b hover:bg-gray-50">

                            <td class="p-3">
                                {{ post.title }}
                            </td>

                            <td class="p-3">
                                {{ post.category?.name || '—' }}
                            </td>

                            <td class="p-3">
                                <span :class="statusBadge(post.status)" class="px-2 py-1 rounded text-xs font-semibold">
                                    {{ post.status }}
                                </span>
                            </td>

                            <td class="p-3">
                                {{ formatDate(post.created_at) }}
                            </td>

                            <td class="p-3 text-right space-x-3">

                                <router-link :to="`/admin/posts/${post.id}/edit`" class="text-blue-600 hover:underline">
                                    Editar
                                </router-link>

                                <button @click="openDeleteModal(post)" class="text-red-600 hover:underline">
                                    Excluir
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="mt-4 flex justify-end space-x-2">
                <button @click="changePage(posts.prev_page_url)" :disabled="!posts.prev_page_url"
                    class="px-3 py-2 border rounded disabled:opacity-50">
                    Anterior
                </button>

                <button @click="changePage(posts.next_page_url)" :disabled="!posts.next_page_url"
                    class="px-3 py-2 border rounded disabled:opacity-50">
                    Próxima
                </button>
            </div>

        </div>
    </AdminLayout>
</template>

<script setup>
import AdminLayout from '../../layouts/AdminLayout.vue';
import { ref, onMounted } from "vue";
import postsService from "@/admin/services/postsService";

const posts = ref({ data: [] });
const categories = ref([]);

const filters = ref({
    search: "",
    status: "",
    category_id: ""
});

async function fetchPosts(url = null) {
    const response = await postsService.getAll(url, filters.value);
    posts.value = response;
}

async function fetchCategories() {
    const response = await postsService.getCategories();
    categories.value = response;
}

function changePage(url) {
    if (!url) return;
    fetchPosts(url);
}

function statusBadge(status) {
    switch (status) {
        case "published":
            return "bg-green-100 text-green-700";
        case "draft":
            return "bg-yellow-100 text-yellow-700";
        case "archived":
            return "bg-red-100 text-red-700";
    }
}

function formatDate(date) {
    return new Date(date).toLocaleDateString("pt-BR");
}

function openDeleteModal(post) {
    // implementar modal de confirmação
    alert("Excluir post: " + post.title);
}

onMounted(() => {
    fetchPosts();
    fetchCategories();
});
</script>
