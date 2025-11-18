import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";
import vue from "@vitejs/plugin-vue";
import tailwindcss from "@tailwindcss/vite";

export default defineConfig({
    plugins: [
        tailwindcss({
            // 👇 AQUI: informe onde estão os arquivos que usam classes do Tailwind
            // Isso substitui o antigo "content" do Tailwind 3
            content: [
                "./resources/**/*.{blade.php,js,vue}",
                "./resources/views/**/*.blade.php",
            ],
        }),

        laravel({
            input: [
                "resources/css/app.css",
                "resources/css/admin/app.css",
                "resources/js/web/app.js",
                "resources/js/admin/app.js",
            ],
            refresh: true,
        }),

        vue({
            template: {
                transformAssetUrls: {
                    base: null,
                    includeAbsolute: false,
                },
            },
        }),
    ],

    resolve: {
        alias: {
            vue: "vue/dist/vue.esm-bundler.js",
            "@": "/resources/js",
        },
    },
});
