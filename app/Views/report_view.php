<!-- app/Views/report_view.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Report</title>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <meta name="description" content="The small framework with powerful features">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="/favicon.ico">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="w-full md:w-[60%] m-auto">
    <h1 class="my-4 text-xl font-semibold">Report Kunjungan Website 2024</h1>

    <div id="chartContainer" style="height: 400px; width: 100%;"></div>

    <table class="min-w-full bg-white border rounded-lg shadow-md">
        <thead class="bg-gray-800 text-white">
            <tr>
                <th class="py-2 px-4">Tanggal</th>
                <th class="py-2 px-4">Jumlah</th>
                <th class="py-2 px-4">Negara</th>
            </tr>
        </thead>
        <tbody class="text-gray-700">
            <?php
            $jsonData = file_get_contents(ROOTPATH . 'app/Data/report.json');
            $data = json_decode($jsonData, true)['report'];
            foreach ($data as $tanggal => $detail) {
                echo "<tr class='hover:bg-gray-100'>";
                echo "<td class='border px-4 py-2'>$tanggal</td>";
                echo "<td class='border px-4 py-2'>{$detail['jumlah']}</td>";
                echo "<td class='border px-4 py-2'>" . implode(', ', $detail['negara']) . "</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>

    <div class="my-8">
        <a href="/" class="bg-gray-500 hover:bg-gray-700 text-white font-bold my-4 p-2 rounded">
            Kembali
        </a>
    </div>

    <script>
        let jsonData = <?= $jsonData ?>;
        let categories = [];
        let jumlahData = [];

        for (const [tanggal, detail] of Object.entries(jsonData.report)) {
            categories.push(tanggal);
            jumlahData.push(detail.jumlah);
        }

        Highcharts.chart('chartContainer', {
            title: {
                text: 'Grafik Kunjungan Website'
            },
            xAxis: {
                categories: categories
            },
            yAxis: {
                title: {
                    text: 'Jumlah'
                }
            },
            series: [{
                name: 'Jumlah Kunjungan',
                data: jumlahData
            }]
        });
    </script>
</body>

</html>