import os
from datetime import datetime
import mysql.connector


#Menu de escolha de container

print("\nEscolha o container para executar os testes:\n\n")
print("1 - Container INPE")
print("2 - Container NOTICIAS")

# SELEÇÃO DE CONTAINER DE MICRSERVIÇO

print("\n")
id = input("Digite o número escolhido: ")

if(id=='1'):
    container = 'sanjahoje_python_inpe'
elif(id=='2'):
    container = 'sanjahoje_python_noticias'
else:
    print("Escolha nao existe")

#PASSO 1

if(id=='1'):
    print('\nPasso 1 - Confere se o site está online https://tempo.cptec.inpe.br/sp/sao-jose-dos-campos\n')
    os.system("ping -c 3 www.google.com > temp")
    os.system("grep -o '0%' temp > temp0")
elif(id=='2'):
    print('\nPasso 1 - Confere se o site está online https://g1.globo.com/sp/vale-do-paraiba-regiao/cidade/sao-jose-dos-campos/\n')
    os.system("ping -c 3 www.google.com > temp")
    os.system("grep -o '0%' temp > temp0")

arquivo = open("temp0", "r")
conteudo = str(arquivo.read())
conteudo = conteudo.strip()

if(conteudo == "0%"):
    print("---> Conexão estabelecida")
else:
    print("--->  Perda de conexão")

#PASSO 2
print('\nPasso 2 - Confere se a data e hora do sistema estão corretas')

if(id=='1'):
    os.system("docker container exec -it sanjahoje_python_inpe date '+%d-%m-%y-%H-%M' > temp1")
elif(id=='2'):
    os.system("docker container exec -it sanjahoje_python_noticias date '+%d-%m-%y-%H-%M' > temp1")
    
arquivo = open("temp1", "r")
hora_container = str(arquivo.read())
hora_container = hora_container.strip()

hora = datetime.now()
hora = hora.strftime('%d-%m-%y-%H-%M')

if(hora_container == hora):
    print("--->  Horário do container está correto")
else:
    print("--->  Horário do container está errado\n")
    print("Hora do container: "+hora_container)
    print("\nHora do servidor: "+hora)

#PASSO 3
print('\nPasso 3 - Verifica se já há dados no banco de dados')

#Coleta das últimas informações do Banco

if(id=='1'):
    db_connection = mysql.connector.connect(host='170.14.0.3', user='root', password='my-secret-pw', database='db_inpe')
elif(id=='2'):
    db_connection = mysql.connector.connect(host='170.14.0.3', user='root', password='my-secret-pw', database='db_noticias')
    
consulta = db_connection.cursor()
consulta.execute("SELECT * FROM dados ORDER BY id DESC LIMIT 1")
db_dados = consulta.fetchone()

if (db_dados != 'None'):
    print("--->  Há dados no banco de dados")
else:
    print("--->  Banco de dados vazio")

#PASSO 4
print('\nPasso 4 - Verifica se a coleta de dados ocorreu')

print('\n--->  Última execução de coleta ocorrida em: ')

if(id=='1'):
    os.system("tail -n 1 ../_app-inpe/hora_executada.log ")
elif(id=='2'):
    os.system("tail -n 1 ../_app-noticias/hora_executada.log ")

print('\n')

arquivo.close()
os.system("rm temp")
os.system("rm temp0")
os.system("rm temp1")