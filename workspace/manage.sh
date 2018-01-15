#!/bin/bash

mysql --user="root" --password="" << EOF
use scout;
select 'name', 'team_num', 'auto_high', 'auto_low', 'auto_gear', 'auto_base', 'tele_gear', 'gearDrop', 'tele_high', 'high_acc', 'tele_low', 'low_acc', 'defense', 'sweeper', 'climbing', 'composite', 'teamScore' union all select name, team_num, auto_high, auto_low, auto_gear, auto_base, tele_gear, gearDrop, tele_high, high_acc, tele_low, low_acc, defense, sweeper, climbing, composite, teamScore from result order by team_num DESC into outfile '/tmp/table.csv' fields terminated by ',' optionally enclosed by '"' lines terminated by '\n';
delete from result where team_num = 0;
delete from result where team_num = "";
EOF
cd /tmp
sudo mv table.csv ~/workspace
