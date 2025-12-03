import './bootstrap';

import Alpine from 'alpinejs';

import Quill from 'quill';
import 'quill/dist/quill.snow.css';

window.Alpine = Alpine;
Alpine.start();

window.Quill = Quill;
document.addEventListener('DOMContentLoaded', () => {
    const quillContainer = document.getElementById('editor');

    if (quillContainer) {
        const quill = new Quill('#editor', {
            theme: 'snow',
            modules: {
                toolbar:'#toolbar'
            }
        });

        const hiddenInput = document.getElementById('body_html');

        quill.on('text-change', () => {
            hiddenInput.value = quill.root.innerHTML;
        });

        hiddenInput.value = quill.root.innerHTML;
    }
});