<?php
$navLinks = [
    ['label' => 'Home', 'href' => '/index.php?route=home'],
    ['label' => 'Tasks', 'href' => '/index.php?route=tasks'],
    ['label' => 'Budget', 'href' => '/index.php?route=budget'],
    ['label' => 'PMOC', 'href' => '/index.php?route=pmoc'],
    ['label' => 'Profile', 'href' => '/index.php?route=profile'],
    ['label' => 'Logout', 'href' => '/logout.php', 'class' => 'text-blue-600'],
];
?>

<nav class="bg-white shadow-md p-4 flex justify-between items-center">
    <div class="text-2xl font-bold text-blue-700">AC Tech</div>
    <div>
        <?php foreach ($navLinks as $link): ?>
            <a 
                href="<?= htmlspecialchars($link['href']); ?>" 
                class="<?= $link['class'] ?? 'text-blue-700'; ?> font-semibold hover:underline mr-4"
            >
                <?= htmlspecialchars($link['label']); ?>
            </a>
        <?php endforeach; ?>
    </div>
</nav>
