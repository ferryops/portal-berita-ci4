<!-- app/Views/news_view.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Berita</title>
    <meta name="description" content="The small framework with powerful features">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="/favicon.ico">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="w-full md:w-[60%] m-auto my-4">
    <h1 class="text-xl font-semibold mb-2">Daftar Berita</h1>
    <div class="grid grid-cols-1 md:grid-cols-1 gap-4">
        <?php foreach ($news as $item) : ?>
            <div class="bg-white rounded-lg shadow-md">
                <div class="p-4">
                    <h5 class="text-xl font-semibold mb-2"><?= $item['title'] ?></h5>
                    <p class="text-gray-600"><?= substr($item['content'], 0, 100) . '...' ?></p>
                    <a href="<?= base_url('news/' . url_title($item['title'], '-', true)) ?>" class="block mt-2 text-blue-500 hover:underline">Baca Selengkapnya</a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <div class="my-8">
        <a href="/" class="bg-gray-500 hover:bg-gray-700 text-white font-bold my-4 p-2 rounded">
            Kembali
        </a>
    </div>
</body>

</html>