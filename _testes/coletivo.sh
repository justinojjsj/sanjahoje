#!/bin/bash

#Recebendo o nome do container
container="sanjahoje_python_inpe"

# Passo 1 - Verifica se o container está em execução

docker ps -f "name=$container"  -f status="running" > temp1
linhas=$(wc -l temp1 | cut -d " " -f 1)

if [ $linhas -eq 2 ]
then
    echo "Container em execução"
else
    echo "Container não está em execução"
fi
echo " "

# Passo 2 - Verifica se o agendador de tarefas crontab está em execução

cron=$(docker container exec -it $container /etc/init.d/cron status)
cron_f=$(echo $cron | awk '{ gsub(/ /,""); print }') #Remove espaços em branco da variável
echo $cron_f > temp2
cron_f=$(wc -m temp2 | cut -d " " -f 1)

if [ $cron_f -eq 16 ]
then    
    echo "Crontab em execução"
else    
    echo "Crontab parado"
fi

rm temp1
rm temp2