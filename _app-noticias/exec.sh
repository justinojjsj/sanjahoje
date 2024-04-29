#!/bin/bash

cd /app
/usr/local/bin/python /app/noticias.py
date '+%d/%m/%y - %H:%M:%S' >> hora_executada.log
