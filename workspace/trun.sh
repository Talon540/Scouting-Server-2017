#!/bin/bash

mysql --user="root" --password="" << EOF
use scout;
truncate table phone;
EOF
cd /tmp
sudo mv table.csv ~/workspace