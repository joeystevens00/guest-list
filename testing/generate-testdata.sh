#!/bin/bash

#location of auth.php
authphp="/var/www/wed/php/auth.php"

#read auth.php
authphp=$(<$authphp)

#parse it..
server=$(echo -e "$authphp" | grep server | grep -ioP "\".*?\"" | tr -d '"')
user=$(echo -e "$authphp" | grep user | grep -ioP "\".*?\"" | tr -d '"')
password=$(echo -e "$authphp" | grep password | grep -ioP "\".*?\"" | tr -d '"')
db=$(echo -e "$authphp" | grep db | grep -ioP "\".*?\"" | tr -d '"')

data=$(csvtool col 1,2,4,5,7,8,9 us-500.csv)

#number of records we want
test_set=100

#strip first line, grab # of test_set lines after that
data=$(echo -e "$data" | tail -n +2 | head -$test_set)


count=1
#parse test data, update database
while [ $count -lt $test_set ]; do
	#setup variables
	currentline=$(echo -e "$data" | sed -n -e "$count"p)
	first=$(echo -e "$currentline" | cut -d, -f1)
	last=$(echo -e "$currentline" | cut -d, -f2)
	address=$(echo -e "$currentline" | cut -d, -f3-6)
	phone=$(echo -e "$currentline" | cut -d, -f7)
	count=$((count+1))

#update the database
	guest-list-invite.sh "$phone" "$last" "$address" "$first" "$user" "$password" "$server" "$db"

done
