#1. Entrar no site https://tempo.cptec.inpe.br/sp/sao-jose-dos-campos


from selenium import webdriver
  
webBrowser = webdriver.Firefox()
webBrowser.get('https://tempo.cptec.inpe.br/sp/sao-jose-dos-campos')

#2. Copiar os dados do dia de hoje
