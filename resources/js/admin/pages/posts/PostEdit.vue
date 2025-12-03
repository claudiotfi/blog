<template>
    <AdminLayout>
        <div class="p-6">

            <div class="flex items-center justify-between mb-6">
                <h1 class="text-2xl font-bold">Editar Post</h1>

                <router-link to="/admin/posts" class="text-blue-600 hover:underline">
                    ← Voltar para lista
                </router-link>
            </div>

            <div class="bg-white rounded shadow p-6" v-if="post">
                <PostForm :initial-data="post" @submit="updatePost" />
            </div>

            <div v-else class="text-center py-10 text-gray-500">
                Carregando dados do post...
            </div>

        </div>
    </AdminLayout>
</template>

<script setup>
import { ref, onMounted } from "vue";
import { useRoute, useRouter } from "vue-router";
import AdminLayout from "@/admin/layouts/AdminLayout.vue";
import PostForm from "@/admin/components/posts/PostForm.vue";
import postsService from "@/admin/services/postsService.js";

const route = useRoute();
const router = useRouter();

const post = ref(null);

onMounted(async () => {
    try {
        const { data } = await postsService.show(route.params.id);
        post.value = data;
    } catch (err) {
        console.error(err);
        alert("Erro ao carregar post");
        router.push("/admin/posts");
    }
});

async function updatePost(formData) {
    try {
        await postsService.update(route.params.id, formData);
        router.push("/admin/posts");
    } catch (err) {
        console.error(err);
        alert("Erro ao atualizar post");
    }
}
</script>
