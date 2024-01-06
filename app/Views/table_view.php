<!-- app/Views/able_view.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Data Table</title>
    <meta name="description" content="The small framework with powerful features">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="/favicon.ico">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="w-full md:w-[60%] m-auto">
    <table class="min-w-full bg-white border rounded-lg shadow-md my-8">
        <thead class="bg-gray-800 text-white">
            <tr>
                <th class="w-1/3 py-2 px-4">Nama</th>
                <th class="w-1/3 py-2 px-4">Harga</th>
                <th class="w-1/3 py-2 px-4">Deskripsi</th>
            </tr>
        </thead>
        <tbody class="text-gray-700">
            <tr>
                <td class="border px-4 py-2">Produk A</td>
                <td class="border px-4 py-2">10000</td>
                <td class="border px-4 py-2">Deskripsi Produk A</td>
            </tr>
            <tr>
                <td class="border px-4 py-2">Produk B</td>
                <td class="border px-4 py-2">15000</td>
                <td class="border px-4 py-2">Deskripsi Produk B</td>
            </tr>
        </tbody>
    </table>

    <div class="flex justify-between">
        <p><a class="bg-blue-500 hover:bg-blue-700 text-white font-bold my-4 p-2 rounded" href="/">Kembali</a></p>
        <p><a class="bg-gray-500 hover:bg-gray-700 text-white font-bold my-4 p-2 rounded" href="<?= base_url('table/exportToExcel') ?>">Export to Excel</a></p>
    </div>
</body>

</html>