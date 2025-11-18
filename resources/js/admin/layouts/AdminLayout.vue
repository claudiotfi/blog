<template>
    <div class="flex h-screen bg-gray-100">

        <!-- Sidebar -->
        <Sidebar />

        <!-- Área principal -->
        <div class="flex-1 flex flex-col">

            <!-- Topbar -->
            <Topbar />

            <!-- Conteúdo da página -->
            <main class="p-6 overflow-y-auto">
                <slot></slot>
            </main>

        </div>
    </div>
</template>

<script setup>
import Sidebar from '../components/Sidebar.vue'
import Topbar from '../components/Topbar.vue'
</script>
