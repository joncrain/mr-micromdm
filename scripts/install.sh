#!/bin/bash

# micromdm controller
CTL="${BASEURL}index.php?/module/micromdm/"

# Get the scripts in the proper directories
${CURL} "${CTL}get_script/micromdm.sh" -o "${MUNKIPATH}preflight.d/micromdm.sh"

# Check exit status of curl
if [ $? = 0 ]; then
	# Make executable
	chmod a+x "${MUNKIPATH}preflight.d/micromdm.sh"

	# Set preference to include this file in the preflight check
	setreportpref "micromdm" "${CACHEPATH}micromdm.txt"

else
	echo "Failed to download all required components!"
	rm -f "${MUNKIPATH}preflight.d/micromdm.sh"

	# Signal that we had an error
	ERR=1
fi
