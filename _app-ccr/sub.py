import re

string = 'Presidente Dutra: Pista sentido RIO - SP com tráfego intenso na pista Marginal. Obs: Em Guarulhos, obra de 24 horas com interdição da faixa da esquerda. km inicial: 219 / km final: 221'

#re.sub("\s+$", "", string)

# Nesse último caso, pedi uma busca por todos (+) os espaços (\s), no final da frase ($). 
# Encontrando eles, substituir por nada, ou seja, remover. 
# O resultado é ‘essa é uma frase com espaços demais no final.’


texto = string.split()
texto_limpo= ''
val = 1
j=0

while(val == 1):
    if(texto[j] != 'Obs:'):
        texto_limpo += texto[j] + ' '
    else:
        val=0
    j=j+1
        
print(texto_limpo)