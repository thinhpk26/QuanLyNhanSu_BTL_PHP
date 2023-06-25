<!DOCTYPE html>
<html>
<head>
    <title>Bảng hợp đồng</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        th {
            background-color: #f57d00;
            color: white;
        }

        .div-filter-buttons {
            display: block;
            margin-bottom: 10px;
            margin-left: 91%;
        }

        .filter-button {
            padding: 8px 12px;
            border: none;
            cursor: pointer;
            color: white;
            background-color: #696969;
        }



        .action-buttons button {
            padding: 6px 10px;
            border: none;
            cursor: pointer;
            color: white;
        }

        .view-button {
            background-color: #2196F3;
        }

        .dshd-formm-tit{
            padding: 10px;
            display: inline-block;
            border-radius: 5px;
            margin-left: 5%;
            margin-top: 10px;
            background-color: #f57d00;
        }

        .tablee{
            width: 90%;
            margin: 0 5%;
        }

    </style>
</head>
<body>
    <div class="dshd-container">
        <div class="dshd-formm-tit">
            <h1>Danh sách hợp đồng</h1>
        </div>

        <div class="div-filter-buttons">
            <button class="filter-button">Lọc</button>
        </div>

        <?php
                echo "<table class=\"tablee\">
                    <tr>
                        <th>Mã hợp đồng</th>
                        <th>Loại hợp đồng</th>
                        <th>Ngày hiệu lực</th>
                        <th>Ngày hết hiệu lực</th>
                        <th>Tình trạng</th>
                        <th>Hành động</th>
                    </tr>";

                while($row4 = mysqli_fetch_array($result4)){
                    echo "<tr>";
                    echo "<td>".$row4['maHD']."</td>";
                    echo "<td>".$row4['loaiHD']."</td>";
                    echo "<td>".$row4['ngayHieuLuc']."</td>";
                    echo "<td>".$row4['ngayHet']."</td>";
                    echo "<td>".$row4['tinhTrangHD']."</td>";
                    echo "
                    <td class=\"action-buttons\">
                    <button class=\"view-button\"><a href=\"./QLNVN-LookHd.php?maHD=".$row4['maHD']."\">Xem</a></button>
                    </td>";
                    echo "</tr>";
                }

            ?>
    </div>
</body>
</html>

