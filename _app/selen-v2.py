from selenium import webdriver
from selenium.webdriver.common.by import By
from selenium.webdriver.common.action_chains import ActionChains
from selenium.webdriver.support import expected_conditions
from selenium.webdriver.support.wait import WebDriverWait
from selenium.webdriver.common.desired_capabilities import DesiredCapabilities

#from selenium.webdriver.common.keys import Keys
#from selenium.webdriver.chrome.options import Options

from selenium.webdriver.firefox.options import Options
from selenium.webdriver.firefox.firefox_profile import FirefoxProfile

import time
from datetime import date
import json
import csv

def entre_parenteses(texto):
    ini = texto.index('(') + 1
    fim = texto.index(')')
    return texto[ini:fim]

url = "https://10.132.64.83:8444/sigad-ieav/pages/documentos/relatorio_pendencias.jsf"
usuario = "robot"
senha = "BananaBolt#2024"
arquivo_csv = "dados.csv"

#chrome_options = Options()
#chrome_options.add_argument('--ignore-certificate-errors')
#chrome_options.add_argument("--headless")
#driver = webdriver.Chrome(options=chrome_options)  # Você precisa baixar o driver do Chrome e ajustar o PATH se estiver usando outro navegador

f_options=Options()
#options.add_argument('--ignore-certificate-errors')
#options.add_argument("-headless")

f_options.add_argument('--ignore-certificate-errors')
f_options.add_argument("-headless")

options = webdriver.FirefoxOptions()
driver = webdriver.Firefox(options=f_options)

driver.get(url)
driver.find_element(By.ID,"username").click()
driver.find_element(By.ID, "username").send_keys(usuario)
driver.find_element(By.ID, "password").click()
driver.find_element(By.ID, "password").send_keys(senha)
driver.find_element(By.ID, "Submit").click()
driver.find_element(By.ID, "menuForm:accordion:pendencias-om").click()
driver.implicitly_wait(10)  # Espera implícita de 10 segundos, ajuste conforme necessário
texto = driver.find_element(By.XPATH, "/html/body").text
driver.close()

texto = texto.splitlines()
inicio = 24
fim = len(texto)-1

import mysql.connector
db_connection = mysql.connector.connect(host='170.14.0.3', user='root', password='my-secret-pw', database='db_sigadaer')

for x in range(inicio,fim):
    sigla = texto[x].split()[0]
    qtd = entre_parenteses(texto[x])
    data = date.today()
    #sql = f"INSERT INTO historico_pendentes (div_sigla, qtd_pendentes, data) VALUES ('{sigla}', '{qtd}', '{data}' )"
    sql = f"INSERT INTO historico_pendentes (div_sigla, qtd_pendentes, data) VALUES ('{sigla}', '{qtd}', '{data}' )"
    #sql = "INSERT INTO historico_pendentes (div_sigla, qtd_pendentes, data) VALUES ('TST', '54', '2024-03-13' )"
    #print (sql)

    cursor = db_connection.cursor()
    #sql = "INSERT INTO user (name, cpf) VALUES (%s, %s)"
    #values = ("Maria", "025.658.698-55")
    cursor.execute(sql)

cursor.close()
db_connection.commit()
db_connection.close()
