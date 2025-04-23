<?php
require_once('../../config/config.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Schedule Supply Material</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <script src="<?php echo base_url('assets/js/datetime.js'); ?>"></script>
    <!-- <link rel="stylesheet" href="../assets/css/styles.css"> -->
</head>

<body class="bg-gray-100 p-4">
    <div class="max-w-full mx-auto bg-white border border-gray-300 p-4">
        <div class="text-center mb-4">
            <h1 class="text-3xl font-bold bg-blue-600 text-white px-6 py-3 rounded inline-block">SCHEDULE SUPPLY
                MATERIAL</h1>
        </div>
        <div class="flex justify-between items-center mb-4">
            <div class="flex items-center space-x-2">
                <span class="bg-yellow-200 px-2 py-1 rounded" id="headerDateTime"></span>
            </div>
            <div class="flex items-center space-x-2">
                <div class="flex items-center space-x-4">
                    <div class="flex items-center space-x-2">
                        <div class="bg-blue-200 p-2 rounded-md">
                            <span class="font-bold">TIME</span>
                            <div id="currentTime"></div>
                        </div>
                        <div class="bg-blue-200 p-2 rounded-md">
                            <span class="font-bold">DATE</span>
                            <div id="currentDate"></div>
                        </div>
                        <div class="bg-blue-200 p-2 rounded-md">
                            <span class="font-bold">SHIFT</span>
                            <div>
                                <select class="border border-gray-300 rounded-md">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="flex space-x-2 mb-4">
            <label for="search">Search: </label>
            <input type="text" placeholder="Mesin..." class="border border-gray-300 px-2 py-1 rounded" id="mesin">
            <input type="text" placeholder="Size..." class="border border-gray-300 px-2 py-1 rounded" id="size">
            <input type="text" placeholder="Kategori MC..." class="border border-gray-300 px-2 py-1 rounded"
                id="kategori">
            <input type="text" placeholder="Kode Material..." class="border border-gray-300 px-2 py-1 rounded"
                id="kodeMaterial">
        </div>
        <!-- <div class="overflow-x-auto"> -->
        <table class="border-collapse border border-gray-300 table-fixed w-full" id="scheduleTable">
            <thead>
                <tr class="bg-gray-200">
                    <th colspan="3" class="border border-gray-300 px-4 py-2">BUILDING MACHINE</th>
                    <?php
                    define('MATERIALS', ['TREAD', 'PLY', 'BEAD', 'SIDEWALL', 'TUBELESS', 'JOINTLESS', 'STEEL']);
                    define('TABLE_HEADERS', ['KODE', 'SCH', 'Jam Ganti']);
                    foreach (MATERIALS as $material) {
                        echo "<th colspan='3' class='border border-gray-300 px-4 py-2'>{$material}</th>";
                    }
                    ?>
                </tr>
                <tr class="bg-gray-200 text-center">
                    <th class="border border-gray-300 text-red-600 font-bold">MESIN</th>
                    <th class="border border-gray-300 text-red-600 font-bold">SIZE</th>
                    <th class="border border-gray-300 text-red-600 font-bold">KAT</th>
                    <?php
                    for ($i = 0; $i < 7; $i++) {
                        foreach (TABLE_HEADERS as $header) {
                            echo "<th class='border border-gray-300'>{$header}</th>";
                        }
                    }
                    ?>
                </tr>
            </thead>
            <tbody>
                <?php
                $machineData = [
                    [
                        'mesin' => 'DRBSA1',
                        'size' => 'A031',
                        'zona' => 'ZONA 1',
                        'materials' => [
                            ['code' => 'TA031', 'qty' => '100', 'time' => '15.00'],
                            ['code' => 'V117', 'qty' => '80', 'time' => '14.00'],
                            ['code' => 'R319', 'qty' => '100', 'time' => '10.30'],
                            ['code' => 'S118L', 'qty' => '100', 'time' => '11.00'],
                            ['code' => 'O105', 'qty' => '60', 'time' => '14.00'],
                            ['code' => 'E002', 'qty' => '100', 'time' => '10.30'],
                            ['code' => 'Y640', 'qty' => '100', 'time' => '15.00']
                        ]
                    ],
                    [
                        'mesin' => 'DRBSF4',
                        'size' => 'A251',
                        'zona' => 'ZONA 2',
                        'materials' => [
                            ['code' => 'TA251', 'qty' => '80', 'time' => '15.30'],
                            ['code' => 'V534', 'qty' => '100', 'time' => '11.30'],
                            ['code' => 'R320', 'qty' => '100', 'time' => '11.00'],
                            ['code' => 'S311', 'qty' => '100', 'time' => '09.30'],
                            ['code' => 'O1924', 'qty' => '70', 'time' => '11.30'],
                            ['code' => 'E002', 'qty' => '100', 'time' => '11.00'],
                            ['code' => 'Y640', 'qty' => '60', 'time' => '14.00']
                        ]
                    ],
                    [
                        'mesin' => 'DRBG2',
                        'size' => 'A552',
                        'zona' => 'ZONA 3',
                        'materials' => [
                            ['code' => 'TA552', 'qty' => '100', 'time' => '14.00'],
                            ['code' => 'V570', 'qty' => '100', 'time' => '15.30'],
                            ['code' => 'DS505', 'qty' => '80', 'time' => '15.30'],
                            ['code' => 'S5220A', 'qty' => '100', 'time' => '12.30'],
                            ['code' => 'OP4023', 'qty' => '100', 'time' => '15.30'],
                            ['code' => 'E002', 'qty' => '100', 'time' => '15.30'],
                            ['code' => 'Y720', 'qty' => '80', 'time' => '15.30']
                        ]
                    ],
                    [
                        'mesin' => 'KRBX25',
                        'size' => 'A322',
                        'zona' => 'ZONA 4',
                        'materials' => [
                            ['code' => 'TA322', 'qty' => '70', 'time' => '14.30'],
                            ['code' => 'V0924', 'qty' => '100', 'time' => '13.00'],
                            ['code' => 'WN599', 'qty' => '100', 'time' => '16.00'],
                            ['code' => 'S2340A', 'qty' => '100', 'time' => '15.00'],
                            ['code' => 'OP768', 'qty' => '100', 'time' => '13.00'],
                            ['code' => 'E002', 'qty' => '100', 'time' => '16.00'],
                            ['code' => 'Y1148A', 'qty' => '100', 'time' => '12.30']
                        ]
                    ],
                    [
                        'mesin' => 'KRBE22',
                        'size' => 'B334',
                        'zona' => 'ZONA 5',
                        'materials' => [
                            ['code' => 'TB334', 'qty' => '100', 'time' => '12.30'],
                            ['code' => 'V330', 'qty' => '100', 'time' => '15.30'],
                            ['code' => 'WN005', 'qty' => '100', 'time' => '14.50'],
                            ['code' => 'S674', 'qty' => '100', 'time' => '14.00'],
                            ['code' => 'O117', 'qty' => '100', 'time' => '15.30'],
                            ['code' => 'E002', 'qty' => '100', 'time' => '15.30'],
                            ['code' => 'Y645', 'qty' => '60', 'time' => '14.30']
                        ]
                    ]
                ];

                function renderTableCell($value, $isNumeric = false)
                {
                    $class = 'border border-gray-300' . ($isNumeric ? ' text-blue-600' : '');
                    return "<td class='{$class}'>$value</td>";
                }

                try {
                    foreach ($machineData as $machine) {
                        echo "<tr class='bg-blue-100 text-center'>";
                        echo renderTableCell($machine['mesin']);
                        echo renderTableCell($machine['size']);
                        echo renderTableCell($machine['zona']);

                        foreach ($machine['materials'] as $material) {
                            echo renderTableCell($material['code']);
                            echo renderTableCell($material['qty'], true);
                            echo renderTableCell($material['time']);
                        }
                        echo "</tr>";
                    }
                } catch (Exception $e) {
                    echo "<tr><td colspan='24' class='text-red-600 text-center'>Terjadi kesalahan dalam memproses data</td></tr>";
                }
                ?>
            </tbody>
        </table>
        <!-- </div> -->
    </div>
    <a href="<?php echo base_url('pages/rekap/'); ?>">Go to rekap</a>

    <script>
        // Tambahkan event listener untuk semua input pencarian
        const searchInputs = document.querySelectorAll('input[type="text"]');
        searchInputs.forEach(input => {
            input.addEventListener('input', filterTable);
        });

        function filterTable() {
            const mesin = document.querySelector('#mesin').value.toLowerCase();
            const size = document.querySelector('#size').value.toLowerCase();
            const kategori = document.querySelector('#kategori').value.toLowerCase();
            const kodeMaterial = document.querySelector('#kodeMaterial').value.toLowerCase();

            const rows = document.querySelectorAll('#scheduleTable tbody tr');

            rows.forEach(row => {
                if (row.cells.length > 0 && !row.classList.contains('bg-gray-200')) {
                    const mesinCell = row.cells[0].textContent.toLowerCase();
                    const sizeCell = row.cells[1].textContent.toLowerCase();
                    const kategoriCell = row.cells[2].textContent.toLowerCase();

                    // Cek semua sel untuk kode material
                    let kodeMaterialMatch = false;
                    for (let i = 3; i < row.cells.length; i += 3) {
                        if (row.cells[i].textContent.toLowerCase().includes(kodeMaterial)) {
                            kodeMaterialMatch = true;
                            break;
                        }
                    }

                    const matches = mesinCell.includes(mesin) &&
                        sizeCell.includes(size) &&
                        kategoriCell.includes(kategori) &&
                        (kodeMaterial === '' || kodeMaterialMatch);

                    row.style.display = matches ? '' : 'none';
                }
            });
        }
    </script>
</body>

</html>