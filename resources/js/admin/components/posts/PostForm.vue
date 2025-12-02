<template>
    <form @submit.prevent="submitForm" class="grid grid-cols-1 gap-6">

        <!-- Título -->
        <div>
            <label class="block font-semibold mb-1">Título</label>
            <input v-model="form.title" type="text" class="border rounded px-3 py-2 w-full" required />
        </div>

        <!-- Slug -->
        <div>
            <label class="block font-semibold mb-1">Slug</label>
            <input v-model="form.slug" type="text" class="border rounded px-3 py-2 w-full"
                placeholder="gerado automaticamente" />
        </div>

        <!-- Categoria -->
        <div>
            <label class="block font-semibold mb-1">Categoria</label>

            <select v-model="form.category_id" class="border rounded px-3 py-2 w-full" required>
                <option value="">Selecione...</option>
                <option v-for="cat in categories" :key="cat.id" :value="cat.id">
                    {{ cat.name }}
                </option>
            </select>
        </div>

        <!-- Tags -->
        <div>
            <label class="block font-semibold mb-1">Tags</label>

            <select v-model="form.tags" multiple class="border rounded px-3 py-2 w-full">
                <option v-for="tag in tags" :key="tag.id" :value="tag.id">
                    {{ tag.name }}
                </option>
            </select>
        </div>

        <!-- Imagem destacada -->
        <div>
            <label class="block font-semibold mb-1">Imagem destacada</label>
            <input type="file" @change="handleImage" class="border p-2 rounded w-full" />

            <img v-if="preview" :src="preview" class="mt-2 h-32 rounded border object-cover" />
        </div>

        <!-- Conteúdo -->
        <div>
            <label class="block font-semibold mb-1">Conteúdo</label>
            <textarea v-model="form.content" class="border rounded px-3 py-2 w-full h-40" required></textarea>
        </div>

        <!-- Status -->
        <div>
            <label class="block font-semibold mb-1">Status</label>
            <select v-model="form.status" class="border rounded px-3 py-2 w-full">
                <option value="draft">Rascunho</option>
                <option value="published">Publicado</option>
            </select>
        </div>

        <div class="flex justify-end">
            <button class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                Salvar Post
            </button>
        </div>

    </form>
</template>

<script setup>
import { ref, onMounted } from "vue";
import postsService from "@/admin/services/postsService.js";

const emit = defineEmits(["submit"]);

const form = ref({
    title: "",
    slug: "",
    category_id: "",
    tags: [],
    content: "",
    status: "draft",
    featured_image: null,
});

const preview = ref(null);
const categories = ref([]);
const tags = ref([]);

function handleImage(e) {
    const file = e.target.files[0];
    form.value.featured_image = file;
    preview.value = URL.createObjectURL(file);
}

function submitForm() {
    const fd = new FormData();
    Object.keys(form.value).forEach((key) => {
        if (key === "tags") {
            form.value.tags.forEach((tag) => fd.append("tags[]", tag));
        } else {
            fd.append(key, form.value[key]);
        }
    });

    emit("submit", fd);
}

onMounted(async () => {
    categories.value = await postsService.getCategories();
    tags.value = await postsService.getTags();
});
</script>
