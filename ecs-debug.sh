#!/usr/bin/env bash
php tools/ecs/vendor/bin/ecs check --config tools/ecs/config/default.php --no-progress-bar --no-ansi > ecs.log 2>&1 && exit 0
msg=$(tail -c 3500 ecs.log | tr '\n' '|')
echo "::error::${msg}"
exit 1
