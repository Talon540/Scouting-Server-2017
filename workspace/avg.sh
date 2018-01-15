#!/bin/bash

mysql --user="root" --password="" << EOF
use scout;
select 'team_num', 'auto_high', 'auto_low', 'auto_gear', 'auto_base', 'high', 'high_acc', 'low', 'low_acc', 'gear', 'gearDrop', 'climbing', 'defense', 'composite', 'teamScore', 'teamScore_stanDev', 'strength' union all select team_num, auto_high, auto_low, auto_gear, auto_base, high, high_acc, low, low_acc, gear, gearDrop, climbing, defense, composite, teamScore, teamScore_stanDev, strength from averages order by team_num DESC into outfile '/tmp/avg.csv' fields terminated by ',' lines terminated by '\n';
EOF
cd /tmp
sudo mv avg.csv ~/workspace