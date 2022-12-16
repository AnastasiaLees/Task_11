<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css" type="text/css"/>
    <title>Таблицы истинности и сравнения PHP</title>
</head>

<?php
    // преобразование к строковому типу
    function castToString($val){
        switch(gettype($val)){
            case 'boolean':
                return $val ? 'true' : 'false';
            case 'string';
                return '"'.$val.'"';
            case 'NULL':
                return 'null';
            default:
                return $val;
        }
    }
    // создание таблицы сравнения
    function createEqualTable($type){
        $values = [true, false, 1, 0, -1, "1", null, "php"];
        echo '<table>';
        echo '<tr> <th></th> <th>true</th> <th>false</th> <th>1</th> <th>0</th> <th>-1</th> <th>"1"</th> <th>null</th> <th>"php"</th> </tr>';
        foreach($values as $y){
            $row = "<tr><th>".castToString($y)."</th>";
            if($type === '==')
                foreach($values as $x) $row .= "<td>".castToString($x==$y)."</td>";
            else
                foreach($values as $x) $row .= "<td>".castToString($x===$y)."</td>";
            $row .= "</tr>";
            echo $row;
        }
        echo '</table>';
    }
?>

<body>
    <section class='table-container'>
        <h3 class='table-container_title'>Таблица истинности PHP</h3>
        <table>
            <tr><th>A</th> <th>B</th> <th>!A</th> <th>A||B</th> <th>A&&B</th> <th>A xor B</th></tr>
            <?php           
                for($a=0; $a<2; $a++){
                    for($b=0; $b<2; $b++){
                        $row = "<tr><td>".$a."</td><td>".$b."</td>"; 
                        $row .= "<td>".(!$a ? 1 : 0)."</td>"; 
                        $row .= "<td>".($a || $b ? 1 : 0)."</td>";
                        $row .= "<td>".($a && $b ? 1 : 0)."</td>";
                        $row .= "<td>".(($a xor $b) ? 1 : 0)."</td></tr>";
                        echo $row;
                    }
                }
            ?>
        </table>
    </section>
    <section class='table-container table-container_equal-table'>
        <div>
            <h3  class='table-container_title'>Гибкое сравнение в PHP</h3>
            <?php createEqualTable('==') ?>
        </div>
        <div>
            <h3  class='table-container_title'>Жёсткое сравнение в PHP</h3>
            <?php createEqualTable('===') ?>
        </div>
    </section>
    <section class='conclusion'>
        <p>
            Можно писать код гибче, при наличие гибкого и жесткого сравнения в PHP, но гибкое сравнение достаточно сложно при чтении кода, 
            становится непонятно, как так вышло.
        </p>     
    </section>   
</body>

</html>