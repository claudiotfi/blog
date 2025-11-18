<template>
    <div class="min-h-screen flex">

        <!-- SIDEBAR -->
        <Sidebar />

        <!-- CONTEÚDO -->
        <div class="flex-1 flex flex-col">
            <Header />

            <main class="p-6">
                <router-view />
            </main>
        </div>

    </div>
</template>

<script setup>
import Sidebar from './Sidebar.vue';
import Header from './Header.vue';
</script>
