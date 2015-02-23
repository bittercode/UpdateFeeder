<html>
<head>
        <title>First Try</title>
</head>
<body>
        <h1>Items</h1>
        <ul>
            <?php foreach ($items_query as $item):?>
            
            <li><?php echo $item->title.' '.$item->body
                    ." ".$item->post_on;?></li>
            <?php endforeach;?>
        </ul>
</body>
</html>