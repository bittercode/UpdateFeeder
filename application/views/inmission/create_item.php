<html>
    <head>
        <title>Create Feed Item</title>
        <link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap.min.css"); ?>" />
    </head>
    <body>
        <div class='container'>
            <?php echo form_open('In_Mission/create_item'); ?>
            <h1>Create a new feed item.</h1>
            <div class='row'>
                <div class='col-md-6'>
                    <div class='form-group'>
                        
                        <?php echo form_label('Item Title')."\n"; ?> <?php echo form_error('dtitle'); ?><br/>
                        <?php echo form_input(array('id' => 'dtitle', 'name' => 'dtitle')); ?>
                    </div>
                    <div class='form-group'>
                        <?php echo form_label('Item Body'); ?> <?php echo form_error('dbody'); ?><br/>
                        <?php echo form_textarea(array('id' => 'dbody', 'name' => 'dbody')); ?>
                    </div>
                </div>
            
            
                <div class='col-md-6'>
                    <div class='form-group'>
                        <?php echo form_label('Item Link'); ?> <?php echo form_error('dlink'); ?> <br/>
                        <?php echo form_input(array('id' => 'dlink', 'name' => 'dlink')); ?>
                    </div>
                    <div class='form-group'>
                        <?php echo form_label('Category'); ?> <?php echo form_error('dcategory'); ?> <br/>
                        <?php echo form_dropdown(array('id' => 'dcategory', 'name' => 'dcategory'),$category_list); ?>
                    </div>
                    <div class='form-group'>
                        <!-- At some point I want to connect a datepicker and timepicker here -->
                        <?php echo form_label('Post On :'); ?> <?php echo form_error('dposton'); ?><br/>
                        <?php echo form_input(array('id' => 'dposton', 'name' => 'dposton')); ?>
                    </div>
                    <div class='form-group'>
                        <?php echo form_label('Feed :'); ?> <?php echo form_error('dfeed'); ?> <br/>
                        <?php echo form_dropdown(array('id' => 'dfeed', 'name' => 'dfeed'),$feed_list); ?>
                    </div>
                </div>
            </div>
            <div class='form-group'>
                <?php echo form_submit(array('id' => 'submit', 'value' => 'Submit')); ?>
                <?php echo form_close(); ?>
            </div>
        </div>
        <script type="text/javascript" src="<?php echo base_url("assets/js/jquery.min.js"); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url("assets/js/bootstrap.min.js"); ?>"></script>
    </body>
</html>