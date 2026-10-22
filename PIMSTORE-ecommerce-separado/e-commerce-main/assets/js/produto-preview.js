const imagemInput = document.getElementById('imagem');
const preview = document.getElementById('preview');
if (imagemInput && preview) {
    imagemInput.addEventListener('change', (event) => {
        const arquivo = event.target.files[0];
        if (!arquivo) return;
        const reader = new FileReader();
        reader.onload = (e) => {
            const img = document.createElement('img');
            img.src = e.target.result;
            img.alt = 'Pré-visualização';
            preview.replaceChildren(img);
        };
        reader.readAsDataURL(arquivo);
    });
}
