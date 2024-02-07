<h1>Them chuyen muc</h1>
<form method="POST" action="<?php echo route('categpries.add');?>">
    <div>
        <input type="text" name="category_name" placecholder="Ten chuyen muc" value ="<?php echo old('category_name'); ?>">
    </div>
    <?php echo csrf_field();?>
    <!-- <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>"> -->
    <button type="submit">Them chuyen muc</button>
</form>