<body>
<a href="http://localhost/cimission/In_Mission/create_item">Create Items</a>


<div id="item-list" class='col-md-9'>
            <h1>Items</h1>
            
        <p></p>
        <hr>
        <p></p>
            <table  class="table"
                    data-toggle="table"
                    data-search="true">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Body</th>
                        <th>Author</th>
                        <th>Category</th>
                        <th>Post On</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($items_query as $item):?>
                        <tr>
                            <td><?php echo $item->title;?></td>
                            <td><?php echo $item->body;?></td>
                            <td><?php echo $item->author;?></td>
                            <td><?php echo $item->category_id;?></td>
                            <td><?php echo $item->post_on;?></td>
                        </tr>
                    <?php endforeach;?>
                </tbody>
            </table>
    </div>    
                <div class="col-md-3" id="category-list">
            <h1>Categories</h1>
            
        <p></p>
        <hr>
        <p></p>
                <table class="table"
                       data-toggle="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($cat_query as $item):?>
                            <tr>
                                <td><?php echo $item->id;?></td>
                                <td><?php echo $item->name;?></td>
                            </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
        
        <div id="feed-list">
            <h1>Feeds</h1>
        </div>    
        <p></p>
        <hr>
        <p></p>
        
                <table  class="table"
                        data-toggle="table"
                        data-classes="table table-condensed">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Link</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($feeds_query as $item):?>
                            <tr>
                                <td><?php echo $item->title;?></td>
                                <td><?php echo $item->description;?></td>
                                <td><?php echo $item->link;?></td>
                            </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
        </div>
