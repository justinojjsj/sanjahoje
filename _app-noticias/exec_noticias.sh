#!/bin/bash

cd /app
/usr/local/bin/python /app/noticias.py
date >> hora_executada.log
