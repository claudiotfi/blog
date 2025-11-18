import '../../bootstrap';
import { createApp } from 'vue';

// =======================================
// MENU MOBILE (Tailwind Off-Canvas)
// =======================================

document.addEventListener("DOMContentLoaded", () => {

    const menuBtn = document.getElementById('menuBtn');
    const menuNav = document.getElementById('menuNav');
    const backdrop = document.getElementById('backdrop');

    if (!menuBtn || !menuNav || !backdrop) return;

    menuBtn.addEventListener('click', () => {

        // Abrir / Fechar o menu
        menuNav.classList.toggle('-translate-x-full');
        backdrop.classList.toggle('hidden');

        // Alternar animação do ícone
        menuBtn.classList.toggle('open');
    });

    backdrop.addEventListener('click', () => {
        menuNav.classList.add('-translate-x-full');
        backdrop.classList.add('hidden');

        // Resetar o ícone para hamburguer
        menuBtn.classList.remove('open');
    });
});


// =======================================
// VUE (pode ser usado no futuro)
// =======================================

const app = createApp({});

// Example:
// app.component('example-component', ExampleComponent);

app.mount('#app');


