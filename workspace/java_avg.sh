#!/bin/bash

mysql --user="root" --password="" << EOF
use scout;
select * from averages into outfile '/tmp/java_avg.csv' fields terminated by ',' lines terminated by ',';
EOF
cd /tmp
sudo mv java_avg.csv ~/workspace