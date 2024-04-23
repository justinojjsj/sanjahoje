#Colocar no cron 0,15,30,45 * * * * /app/exec_noticias.sh
#ln -fs /usr/share/zoneinfo/America/Sao_Paulo /etc/localtime

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

#Compara se as notícias mais recentes são diferentes das últimas notícias do banco
consulta = db_connection.cursor()
consulta.execute("SELECT * FROM dados ORDER BY id DESC LIMIT 7")
row = consulta.fetchone()

iguais=0
while row is not None:
    #print(row[2])
    noticia_velha = row[2]
    
    i=0
    iguais=0
    while(i<7):
        #print(lista_noticias[i].get("href"))     
        noticia_fresca = lista_noticias[i].get("href")
    
        if(noticia_fresca == noticia_velha):
            #print(str(i)+' noticia igual '+noticia_velha)
            iguais=iguais+1
        
        i=i+1    
    row = consulta.fetchone()

print('Notícias iguais: '+str(iguais))
diferentes = 7 - iguais
print('Notícias diferentes: '+str(diferentes))  

if(diferentes > 0):
    i = 0
    titulo = []
    url = []
    tempo = []
    
    while(i < tam_nt):
        #print(i)
        #print(lista_noticias[i].text)     
        texto = (lista_noticias[i].text).replace("'", "")
        #print(texto)
        #print(lista_noticias[i].get("href"))     
        #print(lista_tempo[i].text)     
        #print("###################")
        
        titulo.append(texto)    
        url.append(lista_noticias[i].get("href"))  
        tempo.append(lista_tempo[i].text)
        i=i+1
    
    j=6    
    while(j > -1):
        print(titulo[j])
        print(url[j])
        print(tempo[j])
        print("###################")
        sql = f"INSERT INTO dados (titulo, url, tempo, data_coleta, hora_coleta) VALUES ('{titulo[j]}','{url[j]}','{tempo[j]}','{data}','{hora}')"
        cursor = db_connection.cursor()
        cursor.execute(sql)
        cursor.close()
        j = j-1    
        
    db_connection.commit()
    db_connection.close()
else:
    print('As notícias estão atualizadas')


#Salva somente as notícias mais re


    


