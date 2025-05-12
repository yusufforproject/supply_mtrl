<?php
require_once('../../config/config.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta content="width=device-width, initial-scale=1" name="viewport" />
  <title>Weekly Production Review</title>
  <!-- <script src="https://cdn.tailwindcss.com"></script> -->
  <!-- <link href="https://fonts.googleapis.com/css2?family=Inter:wght@600;700&amp;display=swap" rel="stylesheet" /> -->
  <link rel="stylesheet" href="<?= base_url('assets/css/css2.css'); ?>">
  <script src="<?= base_url('assets/js/cdn.js'); ?>"></script>
  <style>
    body {
      font-family: "Inter", sans-serif;
      background: linear-gradient(to bottom, #2ecac8, #338886);
    }

    table {
      border-collapse: separate;
      border-spacing: 0 12px;
      width: 100%;
    }

    thead tr th,
    tbody tr td {
      font-weight: 700;
      font-size: 0.75rem;
      padding: 0.75rem 1rem;
      text-align: center;
      border-radius: 9999px;
      min-width: max-content;
      white-space: nowrap;
    }

    thead tr th {
      background: #f7f7f7;
      color: #1a1a1a;
      border: none;
    }

    thead tr th.description,
    tbody tr td.description {
      min-width: 180px;
    }

    tbody tr td {
      color: white;
      vertical-align: middle;
      background-color: inherit;
      position: relative;
      z-index: 1;
    }

    tbody tr:nth-child(odd) td {
      background-color: #2ecac8;
    }

    tbody tr:nth-child(even) td {
      background-color: #338886;
    }

    tbody tr.total-row td {
      background-color: #8c8c8c;
      color: #1a1a1a;
      font-weight: 800;
    }

    tbody tr td.no {
      min-width: 30px;
      width: 30px;
      padding-left: 0.5rem;
      padding-right: 0.5rem;
    }

    tbody tr td.mktcode,
    tbody tr td.prodcode,
    tbody tr td.prodplan,
    tbody tr td.prodplanmtd,
    tbody tr td.actualinwh {
      min-width: 80px;
      width: 80px;
    }

    tbody tr td.percent {
      min-width: 50px;
      width: 50px;
    }

    tbody tr td.prodplanmtd,
    tbody tr td.percent {
      font-weight: 800;
    }

    caption {
      caption-side: top;
      text-align: left;
      font-weight: 800;
      font-size: 1.25rem;
      color: #1a1a1a;
      margin-bottom: 1rem;
    }

    .subheading {
      display: inline-block;
      background: #f7f7f7;
      border: 1px solid #d9d9d9;
      border-radius: 9999px;
      font-weight: 800;
      font-size: 0.75rem;
      color: #1a1a1a;
      padding: 0.25rem 0.75rem;
      white-space: nowrap;
    }

    .header-container {
      max-width: 900px;
      width: 100%;
      margin-bottom: 1rem;
      padding-left: 1.5rem;
      padding-right: 1.5rem;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    .header-title {
      font-weight: 800;
      font-size: 1.25rem;
      color: #1a1a1a;
    }

    @media (min-width: 768px) {
      .header-title {
        font-size: 1.5rem;
      }

      .header-container {
        padding-left: 2rem;
        padding-right: 2rem;
      }
    }
  </style>
</head>

<body class="p-4 min-h-screen flex flex-col">
  <div class="flex justify-between mt-4 mb-5 px-4">
    <h1 class="text-3xl font-bold">WEEKLY PRODUCTION REVIEW</h1>
    <div class="flex space-x-4">
      <img src="<?php echo base_url('assets/imgs/giti.jpg'); ?>" alt="" srcset="" width="150px">
      <img src="<?php echo base_url('assets/imgs/rdl2.png'); ?>" alt="" srcset="" width="150px">
    </div>
  </div>
  <div class="w-full bg-white rounded-[20px] p-6 md:p-8 lg:p-10" style="box-shadow: inset 0 0 0 1px #d9d9d9">
    <table class="table" aria-label="Weekly production review table">
      <caption class="sr-only">Weekly Production Review Data</caption>
      <thead>
        <tr>
          <th scope="col" class="no">NO</th>
          <th scope="col" class="mktcode">MKT CODE</th>
          <th scope="col" class="prodcode">PROD CODE</th>
          <th scope="col" class="description">DESCRIPTION</th>
          <th scope="col" class="prodplan">PROD PLAN</th>
          <th scope="col" class="prodplanmtd">PROD PLAN MTD</th>
          <th scope="col" class="actualinwh">ACTUAL INWH</th>
          <th scope="col" class="percent">%</th>
        </tr>
      </thead>
      <tbody>
        <tr class="total-row">
          <td class="description" colspan="4">TOTAL</td>
          <td class="prodplan">199,768</td>
          <td class="prodplanmtd">93,120</td>
          <td class="actualinwh">88,464</td>
          <td class="percent">95%</td>
        </tr>
        <tr>
          <td class="px-0 py-4" colspan="8" style="text-align: left; background-color: #ffffff;">
            <div class="subheading">ONE STAGE BUILDING MACHINE</div>
          </td>
        </tr>
        <tr>
          <td class="no">1</td>
          <td class="mktcode">B726</td>
          <td class="prodcode">BX726</td>
          <td class="description">165/80 R13 83S CHAMPIRO ECOTEC</td>
          <td class="prodplan">2,088</td>
          <td class="prodplanmtd">1,044</td>
          <td class="actualinwh">992</td>
          <td class="percent">95%</td>
        </tr>
        <tr>
          <td class="no">2</td>
          <td class="mktcode">B774</td>
          <td class="prodcode">BX774</td>
          <td class="description">175/70 R13 82H CHAMPIRO ECOTEC</td>
          <td class="prodplan">1,602</td>
          <td class="prodplanmtd">534</td>
          <td class="actualinwh">507</td>
          <td class="percent">95%</td>
        </tr>
        <tr>
          <td class="no">3</td>
          <td class="mktcode">B254</td>
          <td class="prodcode">BX254</td>
          <td class="description">185 R14C 8PR 102/100R MAXMILER PRO</td>
          <td class="prodplan">4,992</td>
          <td class="prodplanmtd">2,496</td>
          <td class="actualinwh">2371</td>
          <td class="percent">95%</td>
        </tr>
        <tr>
          <td class="no">4</td>
          <td class="mktcode">B551</td>
          <td class="prodcode">BX551</td>
          <td class="description">175/65 R14 82T (ADM) CHAMPIRO ECO</td>
          <td class="prodplan">14,616</td>
          <td class="prodplanmtd">7,056</td>
          <td class="actualinwh">6703</td>
          <td class="percent">95%</td>
        </tr>
        <tr>
          <td class="no">5</td>
          <td class="mktcode">A456</td>
          <td class="prodcode">AX456</td>
          <td class="description">195 R15C 106/104R MAXMILER CX</td>
          <td class="prodplan">1,062</td>
          <td class="prodplanmtd">708</td>
          <td class="actualinwh">673</td>
          <td class="percent">95%</td>
        </tr>
        <tr>
          <td class="no">6</td>
          <td class="mktcode">B553</td>
          <td class="prodcode">BX553</td>
          <td class="description">195/60 R15 92H XL CHAMPIRO ECO</td>
          <td class="prodplan">1,458</td>
          <td class="prodplanmtd">486</td>
          <td class="actualinwh">462</td>
          <td class="percent">95%</td>
        </tr>
        <tr>
          <td class="no">7</td>
          <td class="mktcode">BM376</td>
          <td class="prodcode">XM376</td>
          <td class="description">185/65 R15 88T KLEBER DYNAXER HP4</td>
          <td class="prodplan">3,969</td>
          <td class="prodplanmtd">1,848</td>
          <td class="actualinwh">1756</td>
          <td class="percent">95%</td>
        </tr>
        <tr>
          <td class="no">8</td>
          <td class="mktcode">BM382</td>
          <td class="prodcode">XM382</td>
          <td class="description">195/65 R15B 95H XL KLENER DYNAXER HP 4</td>
          <td class="prodplan">924</td>
          <td class="prodplanmtd">924</td>
          <td class="actualinwh">878</td>
          <td class="percent">95%</td>
        </tr>
        <tr>
          <td class="no">9</td>
          <td class="mktcode">B642</td>
          <td class="prodcode">BX642</td>
          <td class="description">175/R14C 8PR 99/98S MAXMILER PRO</td>
          <td class="prodplan">2,088</td>
          <td class="prodplanmtd">1,088</td>
          <td class="actualinwh">958</td>
          <td class="percent">95%</td>
        </tr>
        <tr>
          <td class="no">10</td>
          <td class="mktcode">B731</td>
          <td class="prodcode">BX731</td>
          <td class="description">175/65 R14 82H CHAMPIRO ECOTEC</td>
          <td class="prodplan">852</td>
          <td class="prodplanmtd">426</td>
          <td class="actualinwh">405</td>
          <td class="percent">95%</td>
        </tr>
      </tbody>
    </table>
  </div>
</body>

</html>