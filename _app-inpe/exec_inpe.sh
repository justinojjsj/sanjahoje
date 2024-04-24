#!/bin/bash

cd /app
/usr/local/bin/python /app/inpe.py
date >> hora_executada.log
