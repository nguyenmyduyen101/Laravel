<form method="POST" action="/unicode">
    <div>
        <input type="text" name="username" placecholder="Nhập username..." />
        <input type="hidden" name="_method" value="PUT" />
        <input type="hidden" name="_token" value="<?php echo csrf_token();?>">
    </div>
    <button type="submit">Submit</button>
</form>