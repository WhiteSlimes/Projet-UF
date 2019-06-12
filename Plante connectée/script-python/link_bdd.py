from mysql.connector import connection
from random import randint
import time

connexion = connection.MySQLConnection(user='Kujaku', password='test',
host='localhost',
database='espace_membre')
cursor = connexion.cursor()
while True:

    luminosité = randint(1 , 10000) # LUX
    température = randint(5 , 40) # °C
    humidité = randint(5 , 90) # %


    up_lum = ('UPDATE capteur SET luminosité = %d WHERE id = 1' %luminosité)
    up_temp = ('UPDATE capteur SET température = %d WHERE id = 1' %température)
    up_hum = ('UPDATE capteur SET humidité = %d WHERE id = 1' %humidité)

    cursor.execute(up_lum)
    cursor.execute(up_temp)
    cursor.execute(up_hum)

    print("La connexion est etablie et l'envoie de nouvelles données est en cours")
    connexion.commit()
    time.sleep(15)


