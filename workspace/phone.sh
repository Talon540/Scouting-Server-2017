#!/bin/bash

mysql --user="root" --password="" << EOF
use scout;
select 'team_num', 'autoGearSuccess', 'autoGearTry', 'baselineSuccess', 'baselineTry', 'autoHigh', 'averageTeleopGear', 'gearDrop', 'climbSuccess', 'climbTry', 'composite', 'teamScore', 'teamScore_stanDev' union all select team_num, autoGearSuccess, autoGearTry, baselineSuccess, baselineTry, autoHigh, averageTeleopGear, gearDrop, climbSuccess, climbTry, composite, teamScore, teamScore_stanDev from phone order by team_num DESC into outfile '/tmp/phone.csv' fields terminated by ',' optionally enclosed by '"' lines terminated by '\n';
EOF
cd /tmp
sudo mv phone.csv ~/workspace