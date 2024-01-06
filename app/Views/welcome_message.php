<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Portal Berita</title>
    <meta name="description" content="The small framework with powerful features">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="/favicon.ico">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>

    <header class="bg-blue-500 text-white">
        <div class="container mx-auto px-4">
            <div class="flex flex-wrap items-center justify-between py-4">
                <div class="w-full md:w-1/2">
                    <h1><a href="#" class="text-white">Portal Berita</a></h1>
                </div>
                <div class="w-full md:w-1/2 flex justify-end items-center">
                    <nav>
                        <ul class="flex list-none gap-4">
                            <li><a href="/" class="text-white">Beranda</a></li>
                            <li><a href="/news" class="text-white">Berita</a></li>
                            <li><a href="/report" class="text-white">Report</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </header>


    <div class="container mx-auto mt-4 my-4">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <?php foreach ($news as $item) : ?>
                <div class="bg-white rounded-lg shadow-md">
                    <div class="p-4">
                        <h5 class="text-xl font-semibold mb-2"><?= $item['title'] ?></h5>
                        <p class="text-gray-600"><?= substr($item['content'], 0, 50) . '...' ?></p>
                        <a href="<?= base_url('news/' . url_title($item['title'], '-', true)) ?>" class="block mt-2 text-blue-500 hover:underline">Baca Selengkapnya</a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <div class="flex my-2 w-full justify-center">
        <a class="bg-blue-500 hover:bg-blue-700 text-white font-bold my-4 p-2 rounded" href=" <?= base_url('news/export-excel') ?>">Export News to Excel</a>
    </div>

    <footer class="bg-gray-900 text-white py-4">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div>
                    <h5 class="text-lg font-semibold mb-4">Informasi Kontak</h5>
                    <p>Email: example@email.com</p>
                    <p>Telepon: (123) 456-7890</p>
                </div>
                <div>
                    <h5 class="text-lg font-semibold mb-4">Tautan Cepat</h5>
                    <ul class="flex flex-col gap-2">
                        <li><a href="/" class="text-white">Beranda</a></li>
                        <li><a href="/news" class="text-white">Berita</a></li>
                        <li><a href="/report" class="text-white">Report</a></li>
                    </ul>
                </div>
            </div>
            <div class="mt-6 text-center">
                <p>&copy; 2024 Portal Berita. Hak Cipta Dilindungi.</p>
            </div>
        </div>
    </footer>


</body>

</html>