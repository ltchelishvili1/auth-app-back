import laravel from "laravel-vite-plugin";
import { defineConfig } from "vite";
import vue from "@vitejs/plugin-vue";

export default defineConfig({
    plugins: [
        laravel(["resources/js/site.js"]),
        vue({
            template: {
                compilerOptions: {
                    isCustomElement: (tag) => ["md-linedivider"].includes(tag),
                },
            },
        }),
    ],
});
