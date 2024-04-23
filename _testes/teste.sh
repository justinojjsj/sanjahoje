#!/bin/bash

#Recebendo o container
container="sanjahoje_python_inpe"
#echo $container

#Verificando se o container está em execução
docker ps -f "name=$container"  -f status="running" > teste.txt

linhas=$(wc -l teste.txt | cut -d " " -f 1)

echo "### Container microserviço INPE ###"
echo " "

# Passo 1 - Verifica se o container está em execução
if [ $linhas -eq 2 ]
then
    echo "Container em execução"
else
    echo "Container não está em execução"
fi
echo " "

# Passo 2 - Verifica se o agendador de tarefas crontab está em execução
#cron=$(docker container exec -it $container /etc/init.d/cron status)
docker container exec -it $container /etc/init.d/cron status > cron.txt

cron=$(head -n 1 cron.txt)
#cron_f=$(echo $cron | awk '!/^[[:space:]]*$/')
cron_f=$(echo $cron | awk '{ gsub(/ /,""); print }')

echo $cron_f
texto="cronisrunning."
echo $texto
if [ "$cron_f" = "cronisrunning." ]
then    
    echo "Crontab em execução"
else    
    echo "Crontab parado"
fi