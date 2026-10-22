(() => {
    const toast = document.getElementById('toast');
    if (!toast) return;
    window.setTimeout(() => toast.classList.add('fechando'), 3500);
    window.setTimeout(() => toast.remove(), 4000);
})();
