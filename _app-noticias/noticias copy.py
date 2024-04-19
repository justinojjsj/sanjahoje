import requests
import bs4
from datetime import date
from datetime import datetime
import mysql.connector
db_connection = mysql.connector.connect(host='170.14.0.3', user='root', password='my-secret-pw', database='db_noticias')

url = 'https://g1.globo.com/sp/vale-do-paraiba-regiao/cidade/sao-jose-dos-campos/'

requisicao = requests.get(url)

pagina = bs4.BeautifulSoup(requisicao.text, "html.parser")

lista_noticias = pagina.find_all("a", class_="feed-post-link")
lista_tempo = pagina.find_all("span", class_="feed-post-datetime")

tam_nt = len(lista_noticias)
tam_tp = len(lista_tempo)

# for noticia in lista_noticias:
#     print(noticia.text)
#     print(noticia.get("href"))
#     print("###################")
    
# for tempo in lista_tempo:
#     print(tempo.text)
#     print("###################")

data = date.today()
hora = datetime.now()
hora = hora.strftime('%H:%M:%S')

#Coleta das últimas informações do Banco
consulta = db_connection.cursor()
consulta.execute("SELECT * FROM dados ORDER BY id DESC LIMIT 7")
db_dados = consulta.fetchone()
db_data = db_dados[1]

    
if (tam_nt == tam_tp):
    i = 0
    while(i < tam_nt):
        print(i)
        #print(lista_noticias[i].text)     
        texto = (lista_noticias[i].text).replace("'", "")
        print(texto)
        print(lista_noticias[i].get("href"))     
        print(lista_tempo[i].text)     
        print("###################")       
                
        sql = f"INSERT INTO dados (titulo, url, tempo, data_coleta, hora_coleta) VALUES ('{texto}','{lista_noticias[i].get('href')}','{lista_tempo[i].text}','{data}','{hora}')"
        cursor = db_connection.cursor()
        cursor.execute(sql)
        cursor.close()
        i=i+1
else:
    print('Notícias e tempo incompatíveis')

db_connection.commit()
db_connection.close()