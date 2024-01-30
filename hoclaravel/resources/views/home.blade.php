<h1 style="text-align:center;">Học lập trình tại Unicode</h1>
<?php
if (env('APP_ENV')=='production'){
    echo 'Call api live';
}else{
    echo 'Call api sandbox';
}
?>