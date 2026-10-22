<?php if (!empty($_SESSION['toast'])): ?>
<div class="toast-sucesso" id="toast">
    <i class="fa-solid fa-circle-check"></i>
    <?= htmlspecialchars((string)$_SESSION['toast'], ENT_QUOTES, 'UTF-8'); ?>
</div>
<script src="../assets/js/toast.js"></script>
<?php unset($_SESSION['toast']); endif; ?>
