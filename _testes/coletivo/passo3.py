import subprocess

arquivo = open("temp4", "r")
conteudo = arquivo.read()

vet = []
vet.append(conteudo)

exec = str(vet[0][3])

if(exec == 'x'):
    print('---> Permissão de execução ativada')
elif(exec == '-'):
    print('---> Permissão de execução desativada')
else:
    print('---> Erro de processamento')
    
arquivo.close()
print(' ')