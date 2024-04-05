#1. Entrar no site https://tempo.cptec.inpe.br/sp/sao-jose-dos-campos

from selenium import webdriver
from selenium.webdriver.common.by import By
from selenium.webdriver.firefox.options import Options
import mysql.connector
  
f_options=Options()
f_options.add_argument("-headless")
  
options = webdriver.FirefoxOptions()  
webBrowser = webdriver.Firefox(options=f_options)
webBrowser.get('https://tempo.cptec.inpe.br/sp/sao-jose-dos-campos')

#2. Copiar os dados do dia de hoje

#texto = webBrowser.find_element(By.XPATH, "/html/body").text
texto = webBrowser.find_element(By.CLASS_NAME, "previsao").text
webBrowser.close()

texto = texto.splitlines()

#print(texto)
tamanho = len(texto)
#print(tamanho)

data = texto[1]


if (tamanho == 13):
    chuva_manha = 'Sem dados'
    chuva_tarde = texto[3]
    chuva_noite = texto[5]
    temp_max = texto[7]
    temp_min = texto[8]
    ind_uv = texto[10]
    amanhecer = texto[11]
    entardecer = texto[12]

elif (tamanho == 15):
    chuva_manha = texto[3]
    chuva_tarde = texto[5]
    chuva_noite = texto[7]
    temp_max = texto[9]
    temp_min = texto[10]
    ind_uv = texto[12]
    amanhecer = texto[13]
    entardecer = texto[14]

print(' ')
print('Data'+': '+data)
print('Probabilidade de chuva de manhã'+': '+chuva_manha)
print('Probabilidade de chuva a tarde'+': '+chuva_tarde)
print('Probabilidade de chuva a noite'+': '+chuva_noite)
print('Temperatura máxima'+': '+temp_max)
print('Temperatura mínima'+': '+temp_min)
print('Índice UV'+': '+ind_uv)
print('Nascer do Sol'+': '+amanhecer)
print('Pôr do Sol'+': '+entardecer)
print(' ')

db_connection = mysql.connector.connect(host='170.14.0.3', user='root', password='my-secret-pw', database='db_inpe')
sql = f"INSERT INTO dados (data, chuva_manha, chuva_tarde, chuva_noite, temp_max, temp_min, ind_uv, amanhecer, entardecer) VALUES ('{data}','{chuva_manha}','{chuva_tarde}','{chuva_noite}','{temp_max}','{temp_min}','{ind_uv}','{amanhecer}','{entardecer}')"
cursor = db_connection.cursor()
cursor.execute(sql)
cursor.close()
db_connection.commit()
db_connection.close()