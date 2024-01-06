<!-- app/Views/news_detail_view.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title><?= $title ?></title>
    <meta name="description" content="The small framework with powerful features">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="/favicon.ico">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="w-full md:w-[60%] m-auto my-4">
    <h1 class="text-xl font-semibold mb-2"><?= $title ?></h1>
    <p><?= $content ?></p>
    <div class="flex justify-between">
        <a href="/" class="bg-gray-500 hover:bg-gray-700 text-white font-bold my-4 p-2 rounded">
            Kembali
        </a>
        <a class="bg-blue-500 hover:bg-blue-700 text-white font-bold my-4 p-2 rounded" href=" <?= base_url('news/export-pdf/' . $id) ?>">Export to PDF</a>
    </div>

</body>

</html>