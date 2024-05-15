from selenium import webdriver
from selenium.webdriver.common.by import By
from selenium.webdriver.firefox.options import Options
from datetime import date
from datetime import datetime
import mysql.connector
import time
db_connection = mysql.connector.connect(host='170.14.0.3', user='root', password='my-secret-pw', database='db_ccr')

#Setando opções do driver firefox
f_options=Options()
f_options.add_argument("-headless")  
options = webdriver.FirefoxOptions()  
webBrowser = webdriver.Firefox(options=f_options)

#Site dos dados para serem capturados
webBrowser.get('https://rodovias.grupoccr.com.br/riosp/cameras-ao-vivo/?openModalCamera=open&camera=km-156-sp')

#Tempo de espera para carregar os dados na página adequadamente
time.sleep(10)

#Classe a ser capturada
conteudo = webBrowser.find_element(By.CLASS_NAME, "cmp-modalCamera__alerts").text
webBrowser.close()

#Separa o conteúdo em vetor
conteudo = conteudo.splitlines()
tamanho = len(conteudo)

i = 0 #contador para o while
titulo = 2 #contador para os titulos
texto = 3  #contador para as noticias

data = date.today()
#data = data.strftime('%d/%m/%Y')
hora = datetime.now()
hora = hora.strftime('%H:%M:%S')

#imprime o conteudo de cada notícias de tráfego separadamente
while(i < tamanho):
    num_noticia = str(int((i/4)+1))
    titulo_t = conteudo[titulo]
    texto_t = conteudo[texto]
    
    print("Notícia: "+num_noticia)
    print('Título: '+titulo_t)
    print('Texto: '+texto_t)
    print('Data da coleta: '+str(data))
    print('Hora da coleta: '+str(hora))
    print(' ')
    titulo = titulo + 4
    texto = texto + 4
    
    sql = f"INSERT INTO dados (titulo, texto, data_coleta, hora_coleta) VALUES ('{titulo_t}','{texto_t}','{data}','{hora}')"
    cursor = db_connection.cursor()
    cursor.execute(sql)
    cursor.close()    
    
    i = i+4

db_connection.commit()
db_connection.close()