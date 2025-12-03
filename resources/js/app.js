import './bootstrap';

import Alpine from 'alpinejs';

import Quill from 'quill';
import 'quill/dist/quill.snow.css';

window.Alpine = Alpine;
Alpine.start();

window.Quill = Quill;
document.addEventListener('DOMContentLoaded', () => {
    const editor = document.getElementById('editor');
    if (!editor) return;

    const quill = new Quill(editor, {
        theme: 'snow',
        modules: { toolbar: '#toolbar' }
    });

    const hiddenHtml = document.getElementById('body_html');
    const hiddenDelta = document.getElementById('body_delta');

    // Carregar do localStorage se existir
    const saved = localStorage.getItem('formation_editor');
    if (saved) {
        quill.clipboard.dangerouslyPasteHTML(saved);
    } else {
        quill.clipboard.dangerouslyPasteHTML(editor.dataset.initial || '');
    }

    // Atualiza hidden inputs e localStorage a cada mudança
    quill.on('text-change', () => {
        const html = quill.root.innerHTML;
        hiddenHtml.value = html;
        hiddenDelta.value = JSON.stringify(quill.getContents());

        localStorage.setItem('formation_editor', html);
    });

    // Antes de enviar o form, limpa o localStorage
    const form = editor.closest('form');
    form.onsubmit = () => {
        localStorage.removeItem('formation_editor');
    };
});
