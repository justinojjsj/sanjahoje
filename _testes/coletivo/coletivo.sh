#!/bin/bash

#Script coletivo.sh

#Recebendo o nome do container
python containers.py
container=$(cat temp0)
rm temp0

echo " "
echo "### EXECUÇÃO DE TESTES NO CONTAINER $container ###"
echo " "

echo " Passo 1 - Verifica se o container está em execução "
echo " "

docker ps -f "name=$container"  -f status="running" > temp1
linhas=$(wc -l temp1 | cut -d " " -f 1)

if [ $linhas -eq 2 ]
then
    echo "---> Container em execução"
else
    echo "---> Container não está em execução"
fi
echo " "

echo " Passo 2 - Verifica se o agendador de tarefas crontab está em execução "
echo " "

cron=$(docker container exec -it $container /etc/init.d/cron status)
cron_f=$(echo $cron | awk '{ gsub(/ /,""); print }') #Remove espaços em branco da variável
echo $cron_f > temp2
cron_f=$(wc -m temp2 | cut -d " " -f 1)

if [ $cron_f -eq 16 ]
then    
    echo "---> Crontab em execução"
else    
    echo "---> Crontab parado"
fi

echo " "
rm temp1
rm temp2

echo " Passo 3 - Verifica as permissões do script a ser executado "

docker container exec -it $container ls -l exec.sh > temp3
echo $(cat temp3 | awk '{ gsub(/ /,""); print }') > temp4
echo " "

python passo3.py

rm temp3
rm temp4

echo " Passo 4 - Verifica a conexão com a internet "
echo " "

ping -c 3 www.google.com > temp5
perc=$(grep -o "0%" temp5)

if [ $perc = "0%" ]
then
    echo '---> Conexão com a internet bem estabelecida'
else    
    echo '--->  Perda de conexão'
fi

rm temp5

echo ""