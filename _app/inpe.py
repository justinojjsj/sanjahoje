#1. Entrar no site https://tempo.cptec.inpe.br/sp/sao-jose-dos-campos

from selenium import webdriver
from selenium.webdriver.common.by import By
  
webBrowser = webdriver.Firefox()
webBrowser.get('https://tempo.cptec.inpe.br/sp/sao-jose-dos-campos')

#2. Copiar os dados do dia de hoje

#texto = webBrowser.find_element(By.XPATH, "/html/body").text
texto = webBrowser.find_element(By.CLASS_NAME, "previsao").text
webBrowser.close()

texto = texto.splitlines()

#print(texto)

chuva_manha = texto[3]
chuva_tarde = texto[5]
chuva_noite = texto[7]
temp_max = texto[9]
temp_min = texto[10]
ind_uv = texto[12]
amanhecer = texto[13]
entardecer = texto[14]

print(' ### ')
print('Probabilidade de chuva de manhã'+': '+chuva_manha)
print('Probabilidade de chuva a tarde'+': '+chuva_tarde)
print('Probabilidade de chuva a noite'+': '+chuva_noite)
print('Temperatura máxima'+': '+temp_max)
print('Temperatura mínima'+': '+temp_min)
print('Índice UV'+': '+ind_uv)
print('Nascer do Sol'+': '+amanhecer)
print('Pôr do Sol'+': '+entardecer)
print(' ### ')

