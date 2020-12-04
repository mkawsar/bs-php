<?php
include "./db.php";

$conn = connection();
$query = 'SELECT c.Id as id, c.Name as name, cr.ParentcategoryId as parent_id FROM category c
JOIN catetory_relations cr ON c.Id = cr.Id';
$result = $conn->query($query);

echo "<pre>";
print_r($query);
echo "</pre>";

//$data = generateTree(mysqli_fetch_array($result));

function generateTree($data, $parent = 0, $depth=0)
{
    $tree = "<ul>\n";
    for ($i=0, $ni=count($data); $i < $ni; $i++) {
        echo "<pre>";
        print_r($data[$i]['name']);
        echo "</pre>";
        if ($data['parent_id'] == $parent) {
            $tree .= "<li>\n";
            $tree .= $data['name'];
            $tree .= generateTree($data, $data['id'], $depth+1);
            $tree .= "</li>\n";
        }
    }
    $tree .= "</ul>\n";
    return $tree;
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Categories</title>
</head>
<body>
<?php echo $data;?>
<p>test</p>
</body>
</html>
