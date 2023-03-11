:: Run easy-coding-standard (ecs) via this batch file inside your IDE e.g. PhpStorm (Windows only)
:: Install inside PhpStorm the  "Batch Script Support" plugin
cd..
cd..
cd..
cd..
cd..
cd..
php vendor\bin\ecs check vendor/markocupic/bootstrap-carousel-bundle/src --fix --config vendor/markocupic/bootstrap-carousel-bundle/tools/ecs/config.php
php vendor\bin\ecs check vendor/markocupic/bootstrap-carousel-bundle/contao --fix --config vendor/markocupic/bootstrap-carousel-bundle/tools/ecs/config.php
php vendor\bin\ecs check vendor/markocupic/bootstrap-carousel-bundle/config --fix --config vendor/markocupic/bootstrap-carousel-bundle/tools/ecs/config.php
php vendor\bin\ecs check vendor/markocupic/bootstrap-carousel-bundle/tests --fix --config vendor/markocupic/bootstrap-carousel-bundle/tools/ecs/config.php


