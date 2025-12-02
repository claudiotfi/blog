<template>
    <AdminLayout>
        <div class="p-6">

            <div class="flex items-center justify-between mb-6">
                <h1 class="text-2xl font-bold">Criar Novo Post</h1>

                <router-link to="/admin/posts" class="text-blue-600 hover:underline">
                    ← Voltar para lista
                </router-link>
            </div>

            <div class="bg-white rounded shadow p-6">
                <PostForm @submit="createPost" />
            </div>

        </div>
    </AdminLayout>
</template>

<script setup>
import AdminLayout from "@/admin/layouts/AdminLayout.vue";
import PostForm from "@/admin/components/posts/PostForm.vue";
import postsService from "@/admin/services/postsService.js";
import { useRouter } from "vue-router";

const router = useRouter();

async function createPost(formData) {
    try {
        await postsService.create(formData);
        router.push("/admin/posts");
    } catch (err) {
        console.error(err);
        alert("Erro ao criar post");
    }
}
</script>
