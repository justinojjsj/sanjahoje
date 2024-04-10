#Colocar no agendamento do cron:
#crontab -e
#0,15,30,45 * * * * /app/exec_inpe.sh

#Importando bibliotecas necessárias

from selenium import webdriver
from selenium.webdriver.common.by import By
from selenium.webdriver.firefox.options import Options
from datetime import date
from datetime import datetime
import mysql.connector
db_connection = mysql.connector.connect(host='170.14.0.3', user='root', password='my-secret-pw', database='db_inpe')

#Copia os dados do dia de hoje  
f_options=Options()
f_options.add_argument("-headless")  
options = webdriver.FirefoxOptions()  
webBrowser = webdriver.Firefox(options=f_options)
webBrowser.get('https://tempo.cptec.inpe.br/sp/sao-jose-dos-campos')
texto = webBrowser.find_element(By.CLASS_NAME, "previsao").text
webBrowser.close()
texto = texto.splitlines()
tamanho = len(texto)

#Coleta das últimas informações do Banco
consulta = db_connection.cursor()
consulta.execute("SELECT * FROM dados ORDER BY id DESC LIMIT 1")
db_dados = consulta.fetchone()
db_data = db_dados[1]
db_chuva_manha = db_dados[2]
db_chuva_tarde = db_dados[3]
db_chuva_noite = db_dados[4]
db_temp_max = db_dados[5]
db_temp_min = db_dados[6]
db_ind_uv = db_dados[7]
db_amanhecer = db_dados[8]
db_entardecer = db_dados[9]

#Coleta a data e hora atuais
data_hoje = date.today()
dataFormatada = data_hoje.strftime('%d/%m/%Y')
hora = datetime.now()
hora = hora.strftime('%H:%M:%S')

#Função que organiza informações coletadas do site e insere no banco
def coleta():
    data = texto[1]
    
    if (tamanho == 13):#Tem dias que o INPE não divulga a chuva de manhã
        chuva_manha = 'Sem dados'
        chuva_tarde = texto[3]
        chuva_noite = texto[5]
        temp_max = texto[7]
        temp_min = texto[8]
        ind_uv = texto[10]
        amanhecer = texto[11]
        entardecer = texto[12]

    elif (tamanho == 15):#Dados completos
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
    print('Hora da coleta da informação'+': '+hora)
    print(' ')

    sql = f"INSERT INTO dados (data, chuva_manha, chuva_tarde, chuva_noite, temp_max, temp_min, ind_uv, amanhecer, entardecer, hora_coleta) VALUES ('{data}','{chuva_manha}','{chuva_tarde}','{chuva_noite}','{temp_max}','{temp_min}','{ind_uv}','{amanhecer}','{entardecer}','{hora}')"
    cursor = db_connection.cursor()
    cursor.execute(sql)
    cursor.close()
    db_connection.commit()
    db_connection.close()

if (db_data!=dataFormatada):#If para verificar se já foi salvo os dados do banco hoje
    coleta()
else:
    if(tamanho == 13):
        if(db_chuva_manha != 'Sem dados' or db_chuva_tarde != texto[3] or db_chuva_noite != texto[5] or db_temp_max != texto[7] or db_temp_min != texto[8] or db_ind_uv != texto[10] or db_amanhecer != texto[11] or db_entardecer != texto[12]):
            print("Dados já salvos no banco, mas houve atualização")
            coleta()
        else:
            print("Dados já salvos no banco, NÃO houve atualização")
    elif(tamanho == 15):
        if(db_chuva_manha != texto[3] or db_chuva_tarde != texto[5] or db_chuva_noite != texto[7] or db_temp_max != texto[9] or db_temp_min != texto[10] or db_ind_uv != texto[12] or db_amanhecer != texto[13] or db_entardecer != texto[14]):
            print("Dados já salvos no banco, mas houve atualização")
            coleta()
        else:
            print("Dados já salvos no banco, NÃO houve atualização")