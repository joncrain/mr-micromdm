#!/bin/bash

# micromdm controller
CTL="${BASEURL}index.php?/module/micromdm/"

# Get the scripts in the proper directories
"${CURL[@]}" "${CTL}get_script/micromdm" -o "${MUNKIPATH}preflight.d/micromdm"

# Check exit status of curl
if [ $? = 0 ]; then
	# Make executable
	chmod a+x "${MUNKIPATH}preflight.d/micromdm"

	# Set preference to include this file in the preflight check
	setreportpref "micromdm" "${CACHEPATH}micromdm.json"

else
	echo "Failed to download all required components!"
	rm -f "${MUNKIPATH}preflight.d/micromdm"

	# Signal that we had an error
	ERR=1
fi
