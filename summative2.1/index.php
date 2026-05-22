<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fruit Table</title>
    <style>
        * {
            margin: 0;
            padding: 0;
        }

        body {
            background-color: #f3bebe;
        }

        img {
            width: 100px;
            height: 100px;
        }

        table {
            margin: 20px auto;
            padding: 20px;
            border-collapse: collapse;
            border: 1px solid lightgray;
            background-color: white;
            drop-shadow: 0 4px 8px rgba(0, 0, 0, 0.5);
        }

        th, td {
            padding: 10px;
            border: 1px solid lightgray;
            text-align: left;
            font-family: sans-serif;
        }

        th {
            background-color: #beedf3;
        }
    </style>
</head>
<body>
<?php 
$fruits = array(
    array(
        '<img src="https://pamsdailydish.com/wp-content/uploads/2015/04/Bunch-Bananas-1.jpg" alt="Image of a Banana">',
        "Banana",
        "Yellow tropical fruit that is soft and sweet",
        "Rich in potassium"
    ),
    array(
        '<img src="https://www.collinsdictionary.com/images/full/apple_158989157.jpg" alt="Image of an Apple">',
        "Apple",
        "Crisp and juicy fruit with a variety of colors",
        "Good source of fiber"
    ),
    array(
        '<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcShDZibBehmTA9pQayLFU2USSAPr8MBVIhBdQ&s" alt="Image of an Orange">',
        "Orange",
        "Citrus fruit known for its tangy flavor and high vitamin C content",
        "Boosts immune system"
    ),
    array(
        '<img src="https://www.foodrepublic.com/img/gallery/15-types-of-grapes-to-know-eat-and-drink/kyoho-1755936542.jpg" alt="Image of a Grape">',
        "Grape",
        "Small, round fruit that can be eaten fresh or used to make wine",
        "Contains antioxidants"
    ),
    array(
        '<img src="https://cdn.mos.cms.futurecdn.net/4wwQNKxhra9z9oUaPfwkP3.jpg" alt="Image of a Strawberry">',
        "Strawberry",
        "Sweet and juicy red fruit with tiny seeds on the surface",
        "Rich in vitamin C"
    ),
    array(
        '<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQhTn9mIiFqW_tqIhD1fi5nLBV--vF1fGLrEQ&s" alt="Image of a Watermelon">',
        "Watermelon",
        "Large, juicy fruit with a green rind and sweet red flesh",
        "Hydrating and low in calories"
    ),
    array(
        '<img src="https://www.koppert.com/content/_processed_/3/b/csm_Kiwi_fruit_023bda94ac.jpg" alt="Image of a Kiwi">',
        "Kiwi",
        "Small, fuzzy fruit with bright green flesh and tiny black seeds",
        "High in vitamin C and fiber"
    ),
    array(
        '<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTzRpmTB-txDNmWhMQ6z32BdtTaVcJ6_wCnDw&s" alt="Image of a Pineapple">',
        "Pineapple",
        "Tropical fruit with a spiky exterior and sweet, tangy flesh",
        "Contains bromelain, an enzyme that aids digestion"
    ),
    array(
        '<img src="https://shopmetro.ph/wp-content/uploads/2026/01/SM13560-2-1.jpg" alt="Image of a Mango">',
        "Mango",
        "Juicy tropical fruit with a sweet and fragrant flavor",
        "Rich in vitamins A and C"
    ),
    array(
        '<img src="https://static.wikia.nocookie.net/fruit/images/4/48/Shutterstock_722035450blueberry2_78174de9-8c15-4dae-8612-0e2874138d9e_large.jpg/revision/latest/thumbnail/width/360/height/450?cb=20241221012027" alt="Image of a Blueberry">',
        "Blueberry",
        "Small, round fruit that is blue/purple in color",
        "Packed with antioxidants"
    )
);
?>

<table border="1">
    <tr>
        <th>Image</th>
        <th>Name</th>
        <th>Description</th>
        <th>Health Benefits</th>
    </tr>

    <tbody>
        <?php
        foreach ($fruits as $fruit) {
            echo "<tr>";
            foreach ($fruit as $value) {
                echo "<td>$value</td>";
            }
            echo "</tr>";
        }
        ?>
    </tbody>
</table>
</body>
</html>