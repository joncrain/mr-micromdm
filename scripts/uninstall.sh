#!/bin/bash

# Remove micromdm script
rm -f "${MUNKIPATH}preflight.d/micromdm"

# Remove micromdm.txt file
rm -f "${MUNKIPATH}preflight.d/cache/micromdm.json"
