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
micromdm_profile_identifier="com.github.micromdm.micromdm.enroll"
enroll_check=$(profiles list | grep $micromdm_profile_identifier)
if [ $? = 0 ]; then
	echo 'Machine Enrolled in MicroMDM'
	enrollment='Enrolled'
else
	echo 'Machine Not Enrolled in MicroMDM'
	enrollment='Not Enrolled'
fi

# Output data here
echo "enrollment_status${SEPARATOR}$enrollment" > ${OUTPUT_FILE}
