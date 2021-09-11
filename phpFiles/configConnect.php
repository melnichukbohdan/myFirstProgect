<?php

require_once 'ConnectDB.php';

//connect to the database
$connect = new MyPDO('mysql:host=localhost; dbname=shop;charset=UTF8', 'root', 'root');