#!/bin/bash

fid=$1

user=$2
password=$3
server=$4
database=$5

mysql -u $user -p$password -N -B -e "use $database; delete from contact where fid=$fid"
mysql -u $user -p$password -N -B -e "use $database; delete from invitees where fid=$fid "

