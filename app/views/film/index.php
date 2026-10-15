<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Film</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 30px; }
        table { border-collapse: collapse; width: 100%; margin-top: 15px; }
        th, td { border: 1px solid #ccc; padding: 8px 12px; text-align: left; }
        th { background: #f2f2f2; }
        .alert { padding: 10px 14px; margin: 15px 0; border-radius: 4px; }
        .alert.success { background: #d4edda; color: #155724; }
        .alert.error { background: #f8d7da; color: #721c24; }
        form.inline { display: inline; }
    </style>
</head>
<body>
    <h2>Daftar Film</h2>

    <?php if (!empty($_SESSION['flash'])): ?>
        <div class="alert <?= htmlspecialchars($_SESSION['flash']['tipe']) ?>">
            <?= htmlspecialchars($_SESSION['flash']['pesan']) ?>
        </div>
        <?php unset($_SESSION['flash']); ?>
    <?php endif; ?>

    <a href="index.php?page=film&action=create">+ Tambah Film</a>

    <table>
        <tr>
            <th>No</th>
            <th>Judul</th>
            <th>Sutradara</th>
            <th>Genre</th>
            <th>Tahun</th>
            <th>Negara</th>
            <th>Rating</th>
            <th>Aksi</th>
        </tr>

        <?php if (empty($daftarFilm)): ?>
        <tr>
            <td colspan="8">Belum ada data film.</td>
        </tr>
        <?php endif; ?>

        <?php foreach ($daftarFilm as $i => $f): ?>
        <tr>
            <td><?= $i + 1 ?></td>
            <td><?= htmlspecialchars($f['judul']) ?></td>
            <td><?= htmlspecialchars($f['sutradara']) ?></td>
            <td><?= htmlspecialchars($f['genre']) ?></td>
            <td><?= htmlspecialchars($f['tahun']) ?></td>
            <td><?= htmlspecialchars($f['negara']) ?></td>
            <td><?= htmlspecialchars($f['rating']) ?></td>
            <td>
                <a href="index.php?page=film&action=edit&id=<?= (int) $f['id'] ?>">Edit</a>
                <form class="inline" method="post"
                      action="index.php?page=film&action=delete"
                      onsubmit="return confirm('Hapus film ini?')">
                    <input type="hidden" name="id" value="<?= (int) $f['id'] ?>">
                    <button type="submit">Hapus</button>
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>