#1. Entrar no site https://tempo.cptec.inpe.br/sp/sao-jose-dos-campos


from selenium import webdriver
from selenium.webdriver.common.by import By
  
webBrowser = webdriver.Firefox()
webBrowser.get('https://tempo.cptec.inpe.br/sp/sao-jose-dos-campos')

#2. Copiar os dados do dia de hoje

texto = webBrowser.find_element(By.XPATH, "/html/body").text
print(texto)