import requests
import bs4
from datetime import date
from datetime import datetime
import mysql.connector
#db_connection = mysql.connector.connect(host='170.14.0.3', user='root', password='my-secret-pw', database='db_noticias')

url = 'https://rodovias.grupoccr.com.br/riosp/cameras-ao-vivo/?openModalCamera=open&camera=km-156-sp'

requisicao = requests.get(url)

pagina = bs4.BeautifulSoup(requisicao.text, "html.parser")

#print(pagina)

#lista_noticias = pagina.find_all("p", class_="cmp-modalCamera__alertCard__description__text")
#lista_tempo = pagina.find_all("p", class_="cmp-modalCamera__alertCard__description__text")

lista_noticias = pagina.find_all("p")

#print(lista_noticias)
    
temp = open("temp0", "w")
temp.write(str(lista_noticias))
temp.close