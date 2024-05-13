#https://rodovias.grupoccr.com.br/riosp/cameras-ao-vivo/?openModalCamera=open&camera=km-156-sp

from selenium import webdriver
from selenium.webdriver.common.by import By
from selenium.webdriver.firefox.options import Options
from datetime import date
from datetime import datetime
import mysql.connector
import time
#db_connection = mysql.connector.connect(host='170.14.0.3', user='root', password='my-secret-pw', database='db_inpe')

#Copia os dados do dia de hoje  
f_options=Options()
f_options.add_argument("-headless")  
options = webdriver.FirefoxOptions()  
webBrowser = webdriver.Firefox(options=f_options)
webBrowser.get('https://rodovias.grupoccr.com.br/riosp/cameras-ao-vivo/?openModalCamera=open&camera=km-156-sp')
time.sleep(10)
#texto = webBrowser.find_elements(By.CLASS_NAME, 'cmp-modalCamera__alertCard__description__title')

texto = webBrowser.find_element(By.CLASS_NAME, "cmp-modalCamera__alertCard__description__title").text
webBrowser.close()
#texto = texto.splitlines()
#tamanho = len(texto)

print(texto)

#print(texto[1].text)
#time.sleep(10)

#for item in texto:
    #titulo = item.find_element(By.CLASS_NAME, "cmp-modalCamera__alertCard__description__title").text
    #print(titulo)
    #time.sleep(5)
    #print(item)

#https://medium.com/@dev.daniel.amorim/selenium-web-scraping-parte-iii-4478a07e0afa