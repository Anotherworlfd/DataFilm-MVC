<?php
class FilmController
{
    public function __construct(private Film $model) {}

    public function index(): void
    {
        $daftarFilm = $this->model->getAll();
        require __DIR__ . '/../views/film/index.php';
    }

    public function create(): void
    {
        require __DIR__ . '/../views/film/create.php';
    }

    public function store(): void
    {
        $data  = $this->collect($_POST);
        $error = $this->validate($data);

        if ($error !== null) {
            $this->flash('error', $error);
            $this->redirect('create');
        }

        try {
            $this->model->insert($data);
            $this->flash('success', 'Film berhasil ditambahkan.');
        } catch (PDOException $e) {
            $this->flash('error', 'Film gagal ditambahkan.');
        }

        $this->redirect();
    }

    public function edit(): void
    {
        $id   = (int) ($_GET['id'] ?? 0);
        $film = $this->model->findById($id);

        if (!$film) {
            $this->flash('error', 'Data film tidak ditemukan.');
            $this->redirect();
        }

        require __DIR__ . '/../views/film/edit.php';
    }

    public function update(): void
    {
        $id    = (int) ($_POST['id'] ?? 0);
        $data  = $this->collect($_POST);
        $error = $this->validate($data);

        if ($error !== null) {
            $this->flash('error', $error);
            $this->redirect('edit&id=' . $id);
        }

        try {
            $this->model->update($id, $data);
            $this->flash('success', 'Film berhasil diperbarui.');
        } catch (PDOException $e) {
            $this->flash('error', 'Film gagal diperbarui.');
        }

        $this->redirect();
    }

    public function delete(): void
    {
        $id = (int) ($_POST['id'] ?? 0);

        try {
            $this->model->delete($id);
            $this->flash('success', 'Film berhasil dihapus.');
        } catch (PDOException $e) {
            $this->flash('error', 'Film gagal dihapus.');
        }

        $this->redirect();
    }

    private function collect(array $input): array
    {
        return [
            'judul'     => trim($input['judul'] ?? ''),
            'sutradara' => trim($input['sutradara'] ?? ''),
            'genre'     => trim($input['genre'] ?? ''),
            'tahun'     => trim($input['tahun'] ?? ''),
            'negara'    => trim($input['negara'] ?? ''),
            'rating'    => trim($input['rating'] ?? '')
        ];
    }

    private function validate(array $data): ?string
    {
        foreach ($data as $nilai) {
            if ($nilai === '') {
                return 'Semua field wajib diisi.';
            }
        }

        if (!ctype_digit($data['tahun']) || $data['tahun'] < 1888 || $data['tahun'] > (int) date('Y') + 5) {
            return 'Tahun tidak valid.';
        }

        if (!is_numeric($data['rating']) || $data['rating'] < 0 || $data['rating'] > 10) {
            return 'Rating harus berupa angka 0 sampai 10.';
        }

        return null;
    }

    private function flash(string $tipe, string $pesan): void
    {
        $_SESSION['flash'] = ['tipe' => $tipe, 'pesan' => $pesan];
    }

    private function redirect(string $action = 'index'): void
    {
        header('Location: index.php?page=film&action=' . $action);
        exit;
    }
}