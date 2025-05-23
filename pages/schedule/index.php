<?php
require_once('../../config/config.php');
$jsonData = file_get_contents('table_data.json');
$data = json_decode($jsonData, true)['data'] ?? [];

$zona = $_GET['pilihZona'] ?? null;
$mesin = $_GET['pilihMesin'] ?? null;

$data = array_filter($data, function ($item) use ($zona, $mesin) {
    if ($zona && $mesin) {
        return $item['Kategori'] === $zona && $item['Type'] === $mesin;
    } elseif ($zona) {
        return $item['Kategori'] === $zona;
    } elseif ($mesin) {
        return $item['Type'] === $mesin;
    }
    return true; // Return all if no filter is applied
});
?>

<!DOCTYPE html>
<div lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Schedule Supply Material</title>
        <!-- <script src="https://cdn.tailwindcss.com"></script> -->
        <script src="<?= base_url('assets/js/cdn.js'); ?>"></script>
        <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"> -->
        <link rel="stylesheet" href="<?php echo base_url('assets/css/all.css'); ?>">
        <script src="<?php echo base_url('assets/js/datetime.js'); ?>"></script>
    </head>

    <style>
        :root {
            --electric-blue: #5DE0E6ff;
            --picton-blue: #00ACEEff;
            --honolulu-blue: #1A78BFff;
            --green-blue: #1266B9ff;
            --cobalt-blue: #014BADff;
            --white: #FCFCFCff;
        }
    </style>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
        }

        table {
            width: 100%;
            min-width: 1200px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            overflow-x: auto;
        }

        .table-container {
            overflow-x: auto;
            width: 100%;
        }

        tbody tr:nth-child(even) {
            border-bottom: 3px solid black;
        }

        th {
            padding: 10px;
        }

        td {
            padding: 10px;
            /* border: 1px solid #ddd; */
            text-align: center;
            font-weight: bold;
            background-color: var(--white);
        }
    </style>

    <body style="background: linear-gradient(to right,var(--electric-blue),var(--cobalt-blue));" class="p-4">
        <div class="flex justify-between mt-4">
            <img src="<?php echo base_url('assets/imgs/gt150x.png'); ?>" alt="" srcset="" width="300px">
            <div class="flex space-x-4">
                <img src="<?php echo base_url('assets/imgs/giti.jpg'); ?>" alt="" srcset="" width="150px">
                <img src="<?php echo base_url('assets/imgs/rdl2.png'); ?>" alt="" srcset="" width="150px">
            </div>
        </div>
        <div class="max-w-full mx-auto mt-8">
            <div class="flex justify-between items-center mb-4">
                <div class="flex items-center space-x-2">
                    <h1 class="text-3xl font-bold italic">Schedule Supply Material</h1>
                </div>
                <div class="flex items-center space-x-6 text-white">
                    <div class="py-2 px-4 rounded-md"
                        style="background: linear-gradient(to right,var(--picton-blue),var(--honolulu-blue));">
                        <span class="font-bold">Date</span>
                        <div id="currentDate"></div>
                    </div>
                    <div class="py-2 px-4 rounded-md"
                        style="background: linear-gradient(to right,var(--picton-blue),var(--honolulu-blue));">
                        <span class="font-bold">Time</span>
                        <div id="currentTime"></div>
                    </div>
                    <div class="py-2 px-4 rounded-md"
                        style="background: linear-gradient(to right,var(--picton-blue),var(--honolulu-blue));">
                        <span class="font-bold">Shift</span>
                        <div>
                            <select class="border border-gray-300 rounded-md text-black">
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex space-x-6 mb-4">
                <button id="searchIcon" class="w-10 h-10 rounded-full border border-white text-white text-xl"
                    style="background-color: var(--picton-blue);"><i class="fas fa-search"></i></button>
                <input type="text" name="searchOld" placeholder="Search here"
                    class="border border-gray-300 px-4 py-1 rounded-full" id="searchOld"
                    style="display: none; opacity: 0; transition: opacity 0.5s ease;" hidden>
                <input type="text" name="search" placeholder="Search here"
                    class="border border-gray-300 px-4 py-1 rounded-full" id="search">
                <!-- <div id="searchContainer"> -->
                <!-- <select name="pilihSearch" id="pilihSearch" class="border border-gray-300 px-2 py-1 rounded-full"
                    style="display: none; opacity: 0; transition: opacity 0.5s ease;">
                    <option value="mesin">Mesin</option>
                    <option value="size">Size</option>
                    <option value="kategori">Kategori</option>
                    <option value="kodeMaterial">Kode Material</option>
                </select> -->
                <form action="#" method="get">
                    <select name="pilihMesin" id="pilihMesin" class="border border-gray-300 px-2 py-1 rounded-full h-10"
                        onchange="this.form.submit()">
                        <option value="">All Machine</option>
                        <option value="SAFERUN" <?= $mesin == 'SAFERUN' ? 'selected' : '' ?>>SAFERUN</option>
                        <option value="EXXIUM" <?= $mesin == 'EXXIUM' ? 'selected' : '' ?>>EXXIUM</option>
                        <option value="SEYEN" <?= $mesin == 'SEYEN' ? 'selected' : '' ?>>SEYEN</option>
                    </select>
                    <select name="pilihZona" id="pilihZona"
                        class="ml-4 border border-gray-300 px-2 py-1 rounded-full h-10" onchange="this.form.submit()">
                        <option value="">All Zone</option>
                        <option value="Zona 1" <?= $zona == 'Zona 1' ? 'selected' : '' ?>>Zona 1</option>
                        <option value="Zona 2" <?= $zona == 'Zona 2' ? 'selected' : '' ?>>Zona 2</option>
                        <option value="Zona 3" <?= $zona == 'Zona 3' ? 'selected' : '' ?>>Zona 3</option>
                        <option value="Zona 4" <?= $zona == 'Zona 4' ? 'selected' : '' ?>>Zona 4</option>
                        <option value="Zona 5" <?= $zona == 'Zona 5' ? 'selected' : '' ?>>Zona 5</option>
                    </select>
                    <select name="pilihMtrl" id="pilihMtrl"
                        class="border border-gray-300 px-2 py-1 rounded-full h-10 ml-4" onchange="this.form.submit()">
                        <option value="">Kode Material</option>
                        <option value="TREAD">Tread</option>
                        <option value="PLY1">Ply 1</option>
                        <option value="PLY2">Ply 2</option>
                        <option value="BEAD_FINISH">Bead Finish</option>
                        <option value="SIDEWALL">Sidewall</option>
                        <option value="TUBELESS">Tubeless</option>
                        <option value="JOINTLESS">Jointless</option>
                        <option value="BELT1">Belt 1</option>
                        <option value="BELT2">Belt 2</option>
                    </select>
                </form>
                <select name="pilihZona" id="pilihZona" class="border border-gray-300 px-2 py-1 rounded-full h-10"
                    style="display: none; opacity: 0; transition: opacity 0.5s ease;" hidden>
                    <option value="">Zona</option>
                    <option value="Zona 1">Zona 1</option>
                    <option value="Zona 2">Zona 2</option>
                    <option value="Zona 3">Zona 3</option>
                    <option value="Zona 4">Zona 4</option>
                    <option value="Zona 5">Zona 5</option>
                </select>
                <select name="pilihMtrl" id="pilihMtrl" class="border border-gray-300 px-2 py-1 rounded-full"
                    style="display: none; opacity: 0; transition: opacity 0.5s ease;" hidden>
                    <option value="">Kode Material</option>
                    <option value="TREAD">Tread</option>
                    <option value="PLY1">Ply 1</option>
                    <option value="PLY2">Ply 2</option>
                    <option value="BEAD_FINISH">Bead Finish</option>
                    <option value="SIDEWALL">Sidewall</option>
                    <option value="TUBELESS">Tubeless</option>
                    <option value="JOINTLESS">Jointless</option>
                    <option value="BELT1">Belt 1</option>
                    <option value="BELT2">Belt 2</option>
                </select>
                <!-- </div> -->

            </div>
            <div class="table-container">
                <table id="scheduleTable">
                    <thead>
                        <tr style="background-color: var(--picton-blue);" class="text-2xl">
                            <th rowspan="2" class="rounded-tl-lg rounded-bl-lg">Machine</th>
                            <th rowspan="2">Size</th>
                            <th rowspan="2">Status</th>
                            <th rowspan="2">Jam Ganti</th>
                            <th rowspan="2">Kategori</th>
                            <th rowspan="2">Lokasi Stock</th>
                            <?php
                            define('MATERIALS', ['TREAD', 'PLY', 'PLY2', 'BEAD FINISH', 'SIDEWALL', 'TUBELESS', 'JOINTLESS', 'STEEL BELT', 'BELT2']);
                            foreach (MATERIALS as $index => $material) {
                                // if ($material == 'PLY' || $material == 'STEEL BELT') {
                                //     echo "<th colspan='2'>" . htmlspecialchars($material) . "</th>";
                                // } else {
                                $class = $index === count(MATERIALS) - 1 ? 'rounded-tr-lg' : '';
                                echo "<th class='{$class}'>" . htmlspecialchars($material) . "</th>";
                                // }
                            }
                            ?>
                        </tr>
                        <tr class="text-white text-xl" style="background-color: var(--picton-blue);">
                            <th>Kode</th>
                            <th>Kode Ply 1</th>
                            <th>Kode Ply 2</th>
                            <th>Kode</th>
                            <th>Kode</th>
                            <th>Kode</th>
                            <th>Kode</th>
                            <th>Kode Belt 1</th>
                            <th class="rounded-br-lg">Kode Belt 2</th>
                        </tr>
                    </thead>
                    <tbody class="text-xl">
                        <?php
                        foreach ($data as $machine) {
                            // echo "<tr>
                            // <td rowspan='2' class='rounded-tl-lg'>{$machine['Machine']}
                            // <br>
                            // <span class='text-gray-400'>{$machine['Type']}</span>
                            // </td>";
                        
                            // Add a new <td> with rowspan here
                            // echo "<td rowspan='2' class='text-center font-bold'>{$machine['NewColumn']}</td>";
                        
                            foreach ($machine['Items'] as $index => $item) {
                                echo " 
                            <tr>
                            <td class='rounded-tl-lg'>{$machine['Machine']}
                            <br>
                            <span class='text-gray-400'>{$machine['Type']}</span>
                            </td>
                            <td>{$item['Size']}<br><span class='text-gray-400'>{$item['Quantity']}</span></td>
                            <td class='text-gray-400'>{$item['Jam Ganti']}</td>
                            <td>{$item['Status']}</td>
                            ";

                                // Add a new <td> with rowspan=2 only for the first item in the loop
                                // if ($index === 0) {
                                //     echo "<td rowspan='2' class='text-center font-bold'>{$machine['Kategori']}</td>";
                                // }
                        
                                echo "
                            <td class='text-gray-400'>{$machine['Kategori']}</td>
                            <td class='text-gray-400'>{$item['Lokasi']}</td>
                            <td>{$item['TREAD']}<br><span class='text-gray-400'>{$item['TREAD_INFO']}</span></td>
                            <td>{$item['PLY1']}<br><span class='text-gray-400'>{$item['PLY1_INFO']}</span></td>
                            <td>{$item['PLY2']}<br><span class='text-gray-400'>{$item['PLY2_INFO']}</span></td>
                            <td>{$item['BEAD']}<br><span class='text-gray-400'>{$item['BEAD_INFO']}</span></td>
                            <td>{$item['SIDEWALL']}<br><span class='text-gray-400'>{$item['SIDEWALL_INFO']}</span></td>
                            <td>{$item['TUBELESS']}<br><span class='text-gray-400'>{$item['TUBELESS_INFO']}</span></td>
                            <td>{$item['JOINTLESS']}<br><span class='text-gray-400'>{$item['JOINTLESS_INFO']}</span></td>
                            <td>{$item['STEEL']}<br><span class='text-gray-400'>{$item['STEEL_INFO']}</span></td>
                            <td>{$item['STEEL2']}<br><span class='text-gray-400'>{$item['STEEL2_INFO']}</span></td>";
                                echo "</tr>";
                            }
                            // echo "<tr><td colspan='15' class='rounded-br-lg rounded-bl-lg' style='border-bottom: 2px solid black;'></td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>

        </div>
        <!-- <a href="<?php echo base_url('pages/rekap/'); ?>">Go to rekap</a> -->

        <script>
            // fungsi untuk memunculkan input search ketika tombol pencarian diklik
            // function showSearchInput() {
            const searchElement = document.getElementById("search");
            const previewElement = document.getElementById("searchIcon");
            // const pilihSearchElement = document.getElementById("pilihSearch");
            const pilihMesinElement = document.getElementById("pilihMesin");
            const pilihZonaElement = document.getElementById("pilihZona");
            const pilihKategoriElement = document.getElementById("pilihMtrl");
            // const searchContainer = document.getElementById("searchContainer");

            // let isShowing = false;
            // previewElement.addEventListener('click', () => {
            //     if (isShowing) {
            //         [searchElement, pilihMesinElement, pilihZonaElement, pilihKategoriElement].forEach(el => {
            //             el.style.opacity = 0;
            //             el.style.display = "none";
            //         });
            //         previewElement.addEventListener('mouseover', mouseOverListener);
            //         previewElement.addEventListener('mouseout', mouseOutListener);
            //         isShowing = false;
            //     } else {
            //         [searchElement, pilihMesinElement, pilihZonaElement, pilihKategoriElement].forEach(el => {
            //             el.style.opacity = 1;
            //             el.style.transition = "opacity 0.5s ease";
            //         });
            //         previewElement.removeEventListener('mouseover', mouseOverListener);
            //         previewElement.removeEventListener('mouseout', mouseOutListener);
            //         isShowing = true;
            //     }
            // });


            // const mouseOverListener = () => {
            //     [searchElement, pilihMesinElement, pilihZonaElement, pilihKategoriElement].forEach(el => {
            //         el.style.cssText = "display: block; opacity: 0.5; transition: opacity 0.5s ease; margin-left: 0.5rem;";
            //     });
            // };
            // previewElement.addEventListener('mouseover', mouseOverListener);

            // const mouseOutListener = () => {
            //     [searchElement, pilihMesinElement, pilihZonaElement, pilihKategoriElement].forEach(el => {
            //         el.style.opacity = 0;
            //         el.style.display = "none";
            //     });
            // };
            // previewElement.addEventListener('mouseout', mouseOutListener);

            // }

            // Tambahkan event listener untuk semua input pencarian
            searchElement.addEventListener('input', filterTable2);
            // pilihSearchElement.addEventListener('change', filterTable);
            //make filter for selectedMachine
            // pilihMesinElement.addEventListener('change', () => {
            //     //refresh page only fetch for the selected machine
            //     const selectedMachine = pilihMesinElement.value;
            //     const table = document.getElementById('scheduleTable');
            //     const rows = table.rows;

            //     let currentCategory = "";

            //     for (let i = 2; i < rows.length; i++) {
            //         const cells = rows[i].cells;

            //         // If the first cell has a rowspan, update the current category
            //         if (cells[0] && cells[0].rowSpan > 1) {
            //             currentCategory = cells[0].innerText.trim();
            //         }

            //         // Show all if "all" is selected
            //         if (selectedMachine === "" || currentCategory.includes(selectedMachine)) {
            //             rows[i].style.display = "";
            //         } else {
            //             rows[i].style.display = "none";
            //         }
            //     }
            // });

            // pilihZonaElement.addEventListener('change', () => {
            //     //refresh page only fetch for the selected machine
            //     const selectedZona = pilihZonaElement.value;
            //     const rows = document.querySelectorAll("#scheduleTable tbody tr");


            //     // const targetCol = 4;
            //     let currentZona = null;
            //     let spanCount = 0;

            //     rows.forEach(row => {
            //         const cells = row.cells;

            //         // Check if this row has Zona in column index 4
            //         if (cells.length > 4 && cells[4].rowSpan > 1) {
            //             currentZona = cells[4].innerText.trim();
            //             spanCount = cells[4].rowSpan;
            //         }

            //         // Show or hide the row
            //         if (selectedZona === "all" || currentZona.includes(selectedZona)) {
            //             row.style.display = "";
            //         } else {
            //             row.style.display = "none";
            //         }

            //         spanCount--;
            //     });
            // });
            // let columnIndex = 0;
            // pilihKategoriElement.addEventListener('change', () => {
            //     //filtering for selected kategori
            //     const selectedKategori = pilihKategoriElement.value;

            //     const kategoriMap = {
            //         "TREAD": 6,
            //         "PLY1": 7,
            //         "PLY2": 8,
            //         "BEAD_FINISH": 9,
            //         "SIDEWALL": 10,
            //         "TUBELESS": 11,
            //         "JOINTLESS": 12,
            //         "BELT1": 13,
            //         "BELT2": 14
            //     };

            //     columnIndex = kategoriMap[selectedKategori] || 0; // Default to 0 if not found
            // });

            //searching function
            function filterTable2() {
                const searchValue = document.querySelector('#search').value.toLowerCase();
                const rows = document.querySelectorAll('#scheduleTable tbody tr');

                rows.forEach(row => {
                    const cells = Array.from(row.cells);
                    const matches = cells.some(cell => cell.textContent.toLowerCase().includes(searchValue));
                    if (matches) {
                        row.style.display = '';
                    } else {
                        row.style.display = 'none';
                    }
                });
            }

            function filterTable() {
                const searchValue = document.querySelector('#search').value.toLowerCase();
                const rows = document.querySelectorAll('#scheduleTable tbody tr');

                let visibleRowspans = {};

                rows.forEach((row, rowIndex) => {
                    const cells = Array.from(row.cells);
                    const matches = cells.some(cell => cell.textContent.toLowerCase().includes(searchValue));

                    if (matches) {
                        row.style.display = '';
                        // Track rowspan cells to ensure they remain visible
                        cells.forEach((cell, cellIndex) => {
                            if (cell.rowSpan > 1) {
                                visibleRowspans[`${rowIndex}-${cellIndex}`] = cell.rowSpan;
                            }
                        });
                    } else {
                        // Check if the row is part of a rowspan group
                        const isPartOfRowspan = Array.from(row.cells).some((cell, cellIndex) => {
                            return Object.keys(visibleRowspans).some(key => {
                                const [startRowIndex, startCellIndex] = key.split('-').map(Number);
                                const rowspan = visibleRowspans[key];
                                return cellIndex === startCellIndex && rowIndex >= startRowIndex && rowIndex < startRowIndex + rowspan;
                            });
                        });

                        if (isPartOfRowspan) {
                            row.style.display = '';
                        } else {
                            row.style.display = 'none';
                        }
                    }
                });

                // Ensure rows with rowspan are displayed properly
                Object.keys(visibleRowspans).forEach(key => {
                    const [rowIndex, cellIndex] = key.split('-').map(Number);
                    const rowspan = visibleRowspans[key];

                    for (let i = 0; i < rowspan; i++) {
                        const row = rows[rowIndex + i];
                        if (row) {
                            row.style.display = '';
                        }
                    }
                });
            }
        </script>
    </body>

    </html>