<?php
include('./db.php');

$conn = connection();

$sql = 'select category.Id, category.Name as name ,catetory_relations.ParentcategoryId, count(chld.Id) as counter
from
  category
  left join catetory_relations chld
    on category.Id = chld.ParentcategoryId
group by
  category.Id
  , category.Name
  , chld.ParentcategoryId ORDER BY counter DESC ';
$result = $conn->query($sql);

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<table>
    <thead>
        <th>Category Name</th>
        <th>Total Items</th>
    </thead>
    <tbody>
        <?php foreach($result as $key => $value): ?>
            <tr>
                <td><?php echo $value['name']; ?></td>
                <td><?php echo $value['counter']; ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
</body>
</html>
