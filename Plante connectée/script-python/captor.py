import grovepi
import time

light_sensor = 2 # A2
temp_sensor = 0 # A0
humidity_sensor = 6 # A6

while True:
    try:

        light_value = grovepi.analogRead(light_sensor)
        print("Niveaux de limiere :", light_value, "Lux")

        temp_value = grovepi.temp(temp_sensor, 1.2)
        print ("Temperature :", temp_value, "Degres Celsius")

        humidity_value = grovepi.analogRead(humidity_sensor)
        print("Taux d humidite :", humidity_value)

        time.sleep(1)
        
    except IOError :
        print("Error")
