<?php
/**
 * Created by PhpStorm.
 * User: xenomium
 * Date: 11/29/18
 * Time: 11:35 PM
 */

$pwd = shell_exec('pwd');
echo shell_exec("php $pwd/artisan migrate:fresh");
