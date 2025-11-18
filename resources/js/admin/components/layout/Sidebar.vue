<template>
    <aside class="w-64 bg-white shadow-md h-screen p-6">
        <h1 class="text-xl font-bold mb-6">Admin</h1>

        <nav class="flex flex-col gap-4">
            <router-link to="/admin/dashboard" class="hover:text-blue-600">Dashboard</router-link>
            <router-link to="/admin/posts" class="hover:text-blue-600">Posts</router-link>
            <router-link to="/admin/categories" class="hover:text-blue-600">Categorias</router-link>
        </nav>
    </aside>
</template>
