<?php
$navLinks = [
    ['label' => 'Home', 'href' => 'home.php'],
    ['label' => 'Tasks', 'href' => 'tasks.php'],
    ['label' => 'Budget', 'href' => 'budget.php'],
    ['label' => 'PMOC', 'href' => 'pmoc.php'],
    ['label' => 'Profile', 'href' => 'profile.php'],
    ['label' => 'Logout', 'href' => 'logout.php', 'class' => 'text-blue-600'],
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
