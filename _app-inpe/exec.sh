#!/bin/bash

cd /app
/usr/local/bin/python /app/inpe.py
date '+%d/%m/%y - %H:%M:%S' >> hora_executada.log
