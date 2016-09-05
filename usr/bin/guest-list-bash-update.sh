#!/bin/bash

phone="$1"
last="$2"
fid=$3
address="$4"
first="$5"
user=$6
password=$7
server=$8
database=$9


#insert into invitees
#insert into invitees (first_name, last_name) values ($first, $last);

#insert into Contact
#insert into contact (fid, phone, address) values ($fid, $phone, $address)"


mysql -u $user -p$password -N -B -e "use $database; update invitees set first_name=\"$first\", last_name=\"$last\" where fid=$fid "
mysql -u $user -p$password -N -B -e "use $database; update contact set phone=\"$phone\", address=\"$address\" where fid=$fid"

