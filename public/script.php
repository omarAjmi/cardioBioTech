<?php
/**
 * Created by PhpStorm.
 * User: xenomium
 * Date: 11/29/18
 * Time: 11:35 PM
 */

echo $pwd = shell_exec('cd .. && pwd');
echo shell_exec("php $pwd/../artisan migrate:fresh");
