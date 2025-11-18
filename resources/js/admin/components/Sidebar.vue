<template>
    <aside class="w-64 bg-slate-800 text-white flex flex-col">

        <div class="p-4 text-lg font-semibold border-b border-slate-700">
            Painel Admin
        </div>

        <nav class="flex-1 p-4 space-y-2">

            <RouterLink to="/admin" class="block p-2 rounded hover:bg-slate-700">
                Dashboard
            </RouterLink>

            <RouterLink to="/admin/posts" class="block p-2 rounded hover:bg-slate-700">
                Posts
            </RouterLink>

            <RouterLink to="/admin/categories" class="block p-2 rounded hover:bg-slate-700">
                Categorias
            </RouterLink>

            <RouterLink to="/admin/tags" class="block p-2 rounded hover:bg-slate-700">
                Tags
            </RouterLink>

        </nav>
    </aside>
</template>

<script setup>
</script>
