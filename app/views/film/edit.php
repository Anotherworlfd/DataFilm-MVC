<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Film</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 30px; max-width: 480px; }
        label { display: block; margin-top: 12px; font-weight: bold; }
        input { width: 100%; padding: 8px; box-sizing: border-box; margin-top: 4px; }
        button { margin-top: 18px; padding: 8px 16px; }
        .alert { padding: 10px 14px; margin: 15px 0; border-radius: 4px; }
        .alert.success { background: #d4edda; color: #155724; }
        .alert.error { background: #f8d7da; color: #721c24; }
    </style>
</head>
<body>
    <h2>Edit Film</h2>

    <?php if (!empty($_SESSION['flash'])): ?>
        <div class="alert <?= htmlspecialchars($_SESSION['flash']['tipe']) ?>">
            <?= htmlspecialchars($_SESSION['flash']['pesan']) ?>
        </div>
        <?php unset($_SESSION['flash']); ?>
    <?php endif; ?>

    <form method="post" action="index.php?page=film&action=update">
        <input type="hidden" name="id" value="<?= (int) $film['id'] ?>">

        <label for="judul">Judul</label>
        <input type="text" id="judul" name="judul"
               value="<?= htmlspecialchars($film['judul']) ?>" required>

        <label for="sutradara">Sutradara</label>
        <input type="text" id="sutradara" name="sutradara"
               value="<?= htmlspecialchars($film['sutradara']) ?>" required>

        <label for="genre">Genre</label>
        <input type="text" id="genre" name="genre"
               value="<?= htmlspecialchars($film['genre']) ?>" required>

        <label for="tahun">Tahun</label>
        <input type="number" id="tahun" name="tahun" min="1888" max="2100"
               value="<?= htmlspecialchars($film['tahun']) ?>" required>

        <label for="negara">Negara</label>
        <input type="text" id="negara" name="negara"
               value="<?= htmlspecialchars($film['negara']) ?>" required>

        <label for="rating">Rating (0 - 10)</label>
        <input type="number" id="rating" name="rating" min="0" max="10" step="0.1"
               value="<?= htmlspecialchars($film['rating']) ?>" required>

        <button type="submit">Update</button>
        <a href="index.php?page=film">Kembali</a>
    </form>
</body>
</html>