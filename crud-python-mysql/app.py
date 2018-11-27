import os
import pymysql
from prettytable import PrettyTable
# Base de Datos - - - - - - - - - - - - - - - - - - - - - - -
con = pymysql.connect(host='localhost', user='root', password='admin', db='universo')
# Menu - - - - - - - - - - - - - - - - - - - - - - -
def menu():
	t = PrettyTable(['MENU ( CRUD PYTHON & MYSQL )'])
	t.align['MENU ( CRUD PYTHON & MYSQL )'] = "l" 
	t.padding_width = 4
	t.add_row(['1) Insertar Planeta'])
	t.add_row(['2) Consultar todos los Planetas'])
	t.add_row(['3) Consultar Planeta'])
	t.add_row(['4) Modificar Planeta'])
	t.add_row(['5) Eliminar Planeta'])
	t.add_row(['6) Salir'])
	print(t)
	return input('> Ingrese una Opcion : ')
# Opcion 1 - - - - - - - - - - - - - - - - - - - - - - -
def opcion1():
	nombre = raw_input('> Nombre del Planeta : ')
	orden  = int(input('> Orden del Planeta : '))
	lunas  = int(input('> Numero de Lunas : '))
	with con.cursor() as cursor:
		sql = "INSERT INTO planetas (id, nombre, orden, lunas) VALUES (DEFAULT, %s, %s, %s)"
		try:
			cursor.execute(sql, (nombre, orden, lunas))
			print('')
			print('Planeta Adicionado con Exito!')
		except:
			print("Ops Error!")
	con.commit()
# Opcion 2 - - - - - - - - - - - - - - - - - - - - - - -
def opcion2():
	with con.cursor() as cursor:
		sql = 'SELECT * FROM planetas'
		try:
			cursor.execute(sql)
			result = cursor.fetchall()
			print('')
			t = PrettyTable(['ID', 'NOMBRE', 'ORDEN', 'LUNAS'])
			for row in result:
				t.add_row([row[0], row[1], row[2], row[3]])
			print(t)
		except:
			print("Ops Error!")
	con.commit()
# Opcion 3 - - - - - - - - - - - - - - - - - - - - - - -
def opcion3():
	id = int(input('> ID del Planeta a Consultar : '))
	with con.cursor() as cursor:
		sql = 'SELECT * FROM planetas WHERE id = %s'
		try:
			cursor.execute(sql, (id))
			result = cursor.fetchall()
			print('')
			t = PrettyTable(['ID', 'NOMBRE', 'ORDEN', 'LUNAS'])
			for row in result:
				t.add_row([row[0], row[1], row[2], row[3]])
			print(t)
		except:
			print("Ops Error!")
	con.commit()	
# Opcion 4 - - - - - - - - - - - - - - - - - - - - - - -
def opcion4():
	id = int(input('> ID del Planeta a Modificar : '))
	nombre = raw_input('> Nombre del Planeta : ')
	orden  = int(input('> Orden del Planeta : '))
	lunas  = int(input('> Numero de Lunas : '))
	with con.cursor() as cursor:
		sql = "UPDATE planetas SET nombre=%s, orden=%s, lunas=%s WHERE id = %s"
		try:
			cursor.execute(sql, (nombre, orden, lunas, id))
			print('Planeta Modificado con Exito!')
		except:
			print("Ops Error!")
	con.commit()		
# Opcion 5 - - - - - - - - - - - - - - - - - - - - - - -
def opcion5():
	id = int(input('> ID del Planeta a Eliminar : '))
	with con.cursor() as cursor:
		sql = "DELETE FROM planetas WHERE id = %s"
		try:
			cursor.execute(sql, (id))
			print('Planeta Eliminado con Exito!')
		except:
			print("Ops Error!")
	con.commit()
# Opciones Menu - - - - - - - - - - - - - - - - - - - - - - -
preguntar = 1
opcion    = 0
while preguntar == 1:
	opcion = int(menu())
	os.system('clear')
	if opcion == 1:
		opcion1()
	elif opcion == 2:
		opcion2()
	elif opcion == 3:
		opcion3()
	elif opcion == 4:
		opcion4()
	elif opcion == 5:
		opcion5()			
	elif opcion == 6:
		preguntar = 0
		con.close()
