#1. Entrar no site https://tempo.cptec.inpe.br/sp/sao-jose-dos-campos

#2. Copiar os dados do dia de hoje

#https://youtu.be/ow8514gnajw?t=427

from selenium import webdriver
from selenium.webdriver.chrome.service import Service

s=Service(r"C:\Users\silvajunior\Desktop\desenvolvimento\sanjahoje\_app\chromedriver.exe")

options = webdriver.ChromeOptions()
#driver = webdriver.Chrome(options=options)

driver = webdriver.Chrome(service=s)
driver.maximize_window()
driver.get("https://www.google.com")

#options.add_experimental_option("detach", True)


