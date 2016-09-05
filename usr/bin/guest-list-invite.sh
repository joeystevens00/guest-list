#!/bin/bash
phone="$1"
last="$2"
address="$3"
first="$4"
user=$5
password=$6
server=$7
database=$8


latestfid=$(mysql -u $user -p$password -N -B -e  "use $database; select fid from invitees;" | tail -1)
fid=$(($latestfid+1))

#insert into invitees
#insert into invitees (first_name, last_name) values ($first, $last);

#insert into Contact
#insert into contact (fid, phone, address) values ($fid, $phone, $address)"

mysql -u $user -p$password -N -B -e "use $database; insert into invitees (first_name, last_name) values (\"$first\", \"$last\")"
mysql -u $user -p$password -N -B -e "use $database; insert into contact (fid, phone, address) values ($fid, \"$phone\", \"$address\")"

