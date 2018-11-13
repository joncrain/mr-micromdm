#!/bin/sh

# Script to collect data
# and put the data into outputfile

CWD=$(dirname $0)
CACHEDIR="$CWD/cache/"
OUTPUT_FILE="${CACHEDIR}micromdm.txt"
SEPARATOR=' = '

# Skip manual check
if [ "$1" = 'manualcheck' ]; then
	echo 'Manual check: skipping'
	exit 0
fi

# Create cache dir if it does not exist
mkdir -p "${CACHEDIR}"

# Business logic goes here
/usr/bin/profiles status -type enrollment | grep 'Enrolled via DEP: Yes'
if [ $? = 0 ]; then
	echo 'Machine Enrolled in DEP'
	dep_enrollment='Enrolled'
else
	echo 'Machine Not Enrolled in DEP'
	dep_enrollment='Not Enrolled'
fi
/usr/bin/profiles status -type enrollment | grep 'MDM enrollment: Yes*'
if [ $? = 0 ]; then
	echo 'Machine Enrolled in MDM'
	mdm_enrollment='Enrolled'
else
	echo 'Machine Not Enrolled in MDM'
	mdm_enrollment='Not Enrolled'
fi

# Output data here
echo "mdm_enrollment_status${SEPARATOR}$mdm_enrollment" > ${OUTPUT_FILE}
echo "dep_enrollment_status${SEPARATOR}$dep_enrollment" >> ${OUTPUT_FILE}
