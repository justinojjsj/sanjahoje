# import mysql.connector
# from mysql.connector import errorcode
# try:
# 	db_connection = mysql.connector.connect(host='170.14.0.3', user='root', password='my-secret-pw', database='bd')
# 	print("Database connection made!")
# except mysql.connector.Error as error:
# 	if error.errno == errorcode.ER_BAD_DB_ERROR:
# 		print("Database doesn't exist")
# 	elif error.errno == errorcode.ER_ACCESS_DENIED_ERROR:
# 		print("User name or password is wrong")
# 	else:
# 		print(error)
# else:
# 	db_connection.close()

# from mysql.connector import (connection)
# db_connection = connection.MySQLConnection(host='170.14.0.3', user='root', password='my-secret-pw', database='bd')
# db_connection.close()


# from datetime import date
# import mysql.connector

# db_connection = mysql.connector.connect(host='170.14.0.3', user='root', password='my-secret-pw', database='bd')
# cursor = db_connection.cursor()
# sql = "INSERT INTO user (name, cpf) VALUES (%s, %s)"
# values = ("Maria", "025.658.698-55")
# cursor.execute(sql, values)
# current_date = date.today()
# formatted_date = current_date.strftime('%d/%m/%Y')

# print(formatted_date)
# print("\n")
# print(cursor.rowcount, "record inserted.")
# print("\n")

# sql = ("SELECT id, name, cpf FROM user")
# cursor.execute(sql)

# for (id, name, cpf) in cursor:
#   print(id, name, cpf)
# print("\n")

# sql = ("update user set name = 'Regina Phalanges' where cpf='025.658.698-55'")
# cursor.execute(sql)

# print(cursor.rowcount, "record updated.")
# print("\n")

# sql = ("SELECT id, name, cpf FROM user")
# cursor.execute(sql)

# for (id, name, cpf) in cursor:
#   print(id, name, cpf)
  
# cursor.close()
# db_connection.commit()
# db_connection.close()

import mysql.connector
db_connection = mysql.connector.connect(host='170.14.0.3', user='root', password='my-secret-pw', database='db_sigadaer2')
sql = "INSERT INTO historico_pendentes (div_sigla, qtd_pendentes, data) VALUES ('TST', '54', '2024-03-13' )"
cursor = db_connection.cursor()
cursor.execute(sql)

cursor.close()
db_connection.commit()
db_connection.close()