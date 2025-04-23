<?php
require_once('../../config/config.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rekap</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <script src="<?php echo base_url('assets/js/datetime.js'); ?>"></script>
</head>

<body class="bg-gray-100">
    <div class="container mx-auto p-4">
        <!-- Header -->
        <div class="flex justify-between items-center bg-white p-4 border-b-2 border-gray-300">
            <div class="flex items-center">
                <div class="bg-yellow-200 p-2 rounded-md">
                    <span class="font-bold" id="headerDateTime"></span>
                </div>
                <!-- <div class="w-12 h-12"></div> -->
            </div>
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

        <!-- Main Content -->
        <div class="mt-4">
            <div class="text-2xl font-bold mb-2">BUILDING</div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <!-- Schedule and Actual -->
                <div class="bg-blue-500 text-white p-4 rounded-md">
                    <div class="grid grid-cols-2 gap-4">
                        <div class="text-center">
                            <div class="font-bold">SCHEDULE</div>
                            <div class="text-4xl">12,001</div>
                        </div>
                        <div class="text-center">
                            <div class="font-bold">ACTUAL</div>
                            <div class="text-4xl">9,940</div>
                        </div>
                    </div>
                </div>
                <!-- Building Machine Status -->
                <div class="bg-white p-4 rounded-md border border-gray-300">
                    <div class="font-bold mb-2">BUILDING MACHINE STATUS</div>
                    <div class="grid grid-cols-4 gap-2">
                        <div class="bg-green-500 text-white text-center p-2 rounded-md">
                            <div class="font-bold">RUNNING</div>
                            <div class="text-2xl">49</div>
                        </div>
                        <div class="bg-red-500 text-white text-center p-2 rounded-md">
                            <div class="font-bold">STAND BY</div>
                            <div class="text-2xl">17</div>
                        </div>
                        <div class="bg-red-500 text-white text-center p-2 rounded-md">
                            <div class="font-bold">STOP</div>
                            <div class="text-2xl">23</div>
                        </div>
                        <div class="bg-blue-500 text-white text-center p-2 rounded-md">
                            <div class="font-bold">TOTAL</div>
                            <div class="text-2xl">89</div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Percent -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="bg-blue-500 text-white p-4 rounded-md mt-4 text-center">
                    <div class="font-bold">PERCENT</div>
                    <div class="text-4xl">82.83%</div>
                </div>
                <div class="bg-white p-4 rounded-md border border-gray-300 mt-4">
                    <div class="font-bold mb-2">4M LOOSES</div>
                    <div class="grid grid-cols-4 gap-2">
                        <div class="bg-blue-500 text-white text-center p-2 rounded-md">
                            <div class="font-bold">MACHINE</div>
                            <div class="text-2xl">7</div>
                        </div>
                        <div class="bg-blue-500 text-white text-center p-2 rounded-md">
                            <div class="font-bold">MATERIAL</div>
                            <div class="text-2xl">14</div>
                        </div>
                        <div class="bg-blue-500 text-white text-center p-2 rounded-md">
                            <div class="font-bold">MAN</div>
                            <div class="text-2xl">0</div>
                        </div>
                        <div class="bg-blue-500 text-white text-center p-2 rounded-md">
                            <div class="font-bold">OTHERS</div>
                            <div class="text-2xl">2</div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- 4M Looses -->
        </div>
    </div>
    <a href="<?php echo base_url('pages/schedule/'); ?>">Go to schedule</a>
</body>

</html>