#!/bin/bash
mysql --user="root" --password="" << EOF
use scout;
delete from averages where team_num = 0;
delete from averages where team_num = "";
select 'team_num', 'auto_high', 'auto_low', 'auto_gear', 'auto_base', 'high', 'high_acc', 'low', 'low_acc', 'gear', 'gearDrop', 'climbing', 'defense', 'composite', 'teamScore', 'teamScore_stanDev', 'strength' union all select team_num, auto_high, auto_low, auto_gear, auto_base, high, high_acc, low, low_acc, gear, gearDrop, climbing, defense, composite, teamScore, teamScore_stanDev, strength from averages order by auto_high DESC into outfile '/tmp/output.csv' fields terminated by ',' lines terminated by '\n';
EOF
cd /tmp
sudo mv output.csv ~/workspace