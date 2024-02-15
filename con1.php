<?php
try {
    $con = new mysqli('localhost', 'root', '', 'db_ajax_master2');
} catch (\Throwable $th) {
    //throw $th;
}