<?php include 'db_connect.php'; ?>
<!DOCTYPE html>
<html lang="th">
<head>
  <meta charset="UTF-8">
  <title>รายชื่อผู้ลงทะเบียนคลาสฟิตเนส</title>
  <style>
    body { font-family: 'Segoe UI'; background: #f0f2f5; text-align: center; }
    table { width: 80%; margin: 30px auto; border-collapse: collapse; background: #fff; }
    th, td { padding: 10px; border: 1px solid #ccc; }
    th { background: #4CAF50; color: white; }
    footer { margin-top: 30px; color: #777; }
  </style>
</head>
<body>

<h2>รายชื่อผู้ลงทะเบียนคลาสฟิตเนส</h2>
<table>
  <tr>
    <th>ชื่อผู้ลงทะเบียน</th>
    <th>อีเมล</th>
    <th>ชื่อคลาส</th>
    <th>วันที่</th>
    <th>สาขา</th>
    <th>เวลา</th>
  </tr>

  <?php
  $sql = "SELECT * FROM members";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      echo "<tr>
              <td>{$row['name']}</td>
              <td>{$row['email']}</td>
              <td>{$row['class_name']}</td>
              <td>" . date("M d, Y", strtotime($row['date'])) . "</td>
              <td>{$row['location']}</td>
              <td>{$row['timeslot']}</td>
            </tr>";
    }
  } else {
    echo "<tr><td colspan='6'>ไม่มีข้อมูลการลงทะเบียน</td></tr>";
  }

  $conn->close();
  ?>
</table>

<footer>© 2025 Your Fitness Gym | Powered by Web Technology</footer>

</body>
</html>
