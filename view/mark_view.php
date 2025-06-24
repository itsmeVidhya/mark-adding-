<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Student Marks</title>
  <style>
    * {
      box-sizing: border-box;
    }
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background: linear-gradient(to right, #e0f7fa, #fff);
      margin: 0;
      padding: 20px;
      color: #333;
    }
    h2 {
      color: #2c3e50;
      margin-bottom: 20px;
      text-align: center;
      font-weight: bold;
      font-size: 28px;
    }
    form {
      background: white;
      max-width: 600px;
      margin: 0 auto 40px;
      padding: 30px;
      border-radius: 12px;
      box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
    }
    label {
      font-weight: 600;
      display: block;
      margin-bottom: 6px;
      color: #34495e;
    }
    input[type="text"],
    input[type="number"] {
      width: 100%;
      padding: 12px;
      margin-bottom: 20px;
      border: 1.5px solid #ccc;
      border-radius: 8px;
      font-size: 16px;
      transition: border-color 0.3s ease, box-shadow 0.3s ease;
    }
    input[type="text"]:focus,
    input[type="number"]:focus {
      border-color: #26a69a;
      outline: none;
      box-shadow: 0 0 10px rgba(38, 166, 154, 0.3);
    }
    input[type="submit"] {
      background: linear-gradient(to right, #26a69a, #2bbbad);
      color: white;
      padding: 14px;
      border: none;
      border-radius: 10px;
      font-size: 18px;
      width: 100%;
      font-weight: bold;
      cursor: pointer;
      transition: background 0.3s ease;
    }
    input[type="submit"]:hover {
      background: linear-gradient(to right, #2bbbad, #26a69a);
    }
    hr {
      max-width: 600px;
      margin: 40px auto;
      border: none;
      border-top: 1px solid #ddd;
    }

    table {
      width: 100%;
      max-width: 900px;
      margin: 0 auto;
      border-collapse: collapse;
      background: white;
      border-radius: 10px;
      box-shadow: 0 6px 20px rgba(0, 0, 0, 0.08);
      overflow: hidden;
    }
    thead tr:first-child th {
      background: linear-gradient(to right, #0097a7, #00acc1);
      color: #fff;
      text-align: center;
      font-size: 16px;
    }
    thead tr:nth-child(2) th {
      background-color: #80deea;
      color: #000;
    }
    th, td {
      padding: 15px;
      text-align: center;
      border-bottom: 1px solid #f0f0f0;
      font-size: 15px;
    }
    tbody tr:hover {
      background-color: #f1f9f1;
    }
    tbody tr:last-child td {
      font-weight: bold;
      background-color: #e0f2f1;
    }
    @media (max-width: 768px) {
      table, thead, tbody, th, td, tr {
        font-size: 14px;
      }
      form {
        padding: 20px;
      }
      input[type="submit"] {
        font-size: 16px;
      }
    }
  </style>
</head>
<body>

<h2>Enter Student Marks</h2>

<?php echo validation_errors(); ?>

    <?= form_open('mark/submit');?>

<?=form_input([
     'name' => 'student_name',
    'placeholder' => 'Student Name',
    'type' => 'text',
   
]);?>

<?= form_input([
    'name' => 'physics',
    'placeholder' => 'Physics',
    'type' => 'number',

]);?>

<?= form_input([
    'name' => 'chemistry',
    'placeholder' => 'Chemistry',
    'type' => 'number',
  
]);?>

<?= form_input([
    'name' => 'maths',
    'placeholder' => 'Maths',
    'type' => 'number',

]);?>

<?= form_submit('submit', 'Submit', ['class' => 'btn btn-primary']);
?>


<?= form_close(); ?> 

<hr>

<table>
  <thead>
    <tr>
      <th rowspan="2">Sl</th>
      <th rowspan="2">Student Name</th>
      <th colspan="3">Marks</th>
    </tr>
    <tr>
      <th>Physics</th>
      <th>Chemistry</th>
      <th>Maths</th>
    </tr>
  </thead>
  <tbody>
    <?php 
    $i = 1;
    $total_physics = 0;
    $total_chemistry = 0;
    $total_maths = 0;
    ?>
    <?php if (!empty($students)): ?>
      <?php foreach ($students as $student): ?>
        <?php
          $total_physics += $student->physics;
          $total_chemistry += $student->chemistry;
          $total_maths += $student->maths;
        ?>
        <tr>
          <td><?= $i++ ?></td>
          <td><?= htmlspecialchars($student->student_name) ?></td>
          <td><?= $student->physics ?></td>
          <td><?= $student->chemistry ?></td>
          <td><?= $student->maths ?></td>
        </tr>
      <?php endforeach; ?>
      <tr>
        <td></td>
        <td style="text-align: right;">Subject Total</td>
        <td><?= $total_physics ?></td>
        <td><?= $total_chemistry ?></td>
        <td><?= $total_maths ?></td>
      </tr>
    <?php else: ?>
      <tr><td colspan="5">No student records found.</td></tr>
    <?php endif; ?>
  </tbody>
</table>

</body>
</html>
