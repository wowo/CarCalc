<?php

$ROOT_DIR = sprintf("%s/../../", dirname(__FILE__));
$TEST_DIR = sprintf("%s/test/", $ROOT_DIR);

include sprintf("%s/bootstrap/unit.php", $TEST_DIR);

$configuration = ProjectConfiguration::getApplicationConfiguration("car", "test", true);
$dbManager     = new sfDatabaseManager($configuration);
Doctrine::createTablesFromModels(sprintf("%s/lib/model", $ROOT_DIR));
Doctrine::loadData(sprintf("%s/fixtures", $TEST_DIR));
