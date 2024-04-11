
#https://www.youtube.com/watch?v=gv9dRvkn0rI&t=10s

from urllib.parse import quote
import webbrowser
from time import sleep
import pyautogui

#Abrir o whatsapp web
#webbrowser.open('https://web.whatsapp.com/')
#sleep(30)

#Capturar número de telefone e nome do contato da Defesa Civil
telefone = f'556120344611'

#Criar link persnalizado do whatzapp e enviar a frase "Menu"

mensagem = f'Menu'

try:
    link_mensagem_whatsapp = f'https://web.whatsapp.com/send?phone={telefone}&text={quote(mensagem)}'
    webbrowser.open(link_mensagem_whatsapp)
    sleep(15)
    seta = pyautogui.locateCenterOnScreen('enviar.png')
    sleep(10)
    pyautogui.click(seta[0],seta[1])
    sleep(10)
    menu = pyautogui.locateCenterOnScreen('menu.png')
    sleep(15)
    pyautogui.click(menu[0],menu[1])
    sleep(15)
    
    pyautogui.press('tab', presses=4)
    pyautogui.press('enter')
    
    sleep(10)
    env_ver_alertas = pyautogui.locateCenterOnScreen('env_ver_alertas.png')
    sleep(10)
    pyautogui.click(env_ver_alertas[0],env_ver_alertas[1])
    sleep(10)
    
    listar_estados = pyautogui.locateCenterOnScreen('listar_estados.png')
    sleep(10)
    pyautogui.click(listar_estados[0],listar_estados[1])
    sleep(10)
    
    pyautogui.press('tab', presses=8)
    pyautogui.press('enter')
    
    sleep(10)    
    listar_estados = pyautogui.locateCenterOnScreen('listar_estados.png')
    sleep(10)
    pyautogui.click(listar_estados[0],listar_estados[1])
    sleep(10)
    
    #pyautogui.hotkey('ctrl','w')
    #sleep(5)   
except:
    print(f'Não foi possível enviar a mensagem')
    with open('erros.csv','a',newline='',encoding='utf8') as arquivo:
        arquivo.write(f'{telefone}')

#Interagir com o menu "Alertas" > "São Paulo" > "São José dos Campos"



#Salvar mensagem de resposta do alerta vigente
#Tratar mensagem e enviar para o banco de dados