#Menu de escolha de container

print("\nEscolha o container para executar os testes:\n\n")
print("1 - Container INPE")
print("2 - Container NOTICIAS")
print("3 - Container SERVIDOR WEB")
print("4 - Container SERVIDOR BANCO DE DADOS")


print("\n")
container = input("Digite o número escolhido: ")

temp = open("temp0", "w")

if(container=='1'):
    #print(container)
    temp.write("sanjahoje_python_inpe")
elif(container=='2'):
    temp.write("sanjahoje_python_noticias")
elif(container=='3'):
    temp.write("sanjahoje_php_apache")
elif(container=='4'):
    temp.write("sanjahoje_db")
else:
    print("Escolha nao existe")

temp.close()