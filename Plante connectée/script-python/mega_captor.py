import time, sys, math
from grove.adc import ADC
from mysql.connector import connection

connexion = connection.MySQLConnection(user='root', host='127.0.0.1', database='plante')

cursor = connexion.cursor()


__all__ = ["GroveLightSensor"]

class GroveLightSensor(object):
   
    def __init__(self, channel):
        self.channel = channel
        self.adc = ADC()

    @property
    def light(self):
            
        value = self.adc.read(self.channel)
        return value
        Grove = GroveLightSensor


    def main():
        
        from grove.helper import SlotHelper
        sh = SlotHelper(SlotHelper.ADC)
        pin = sh.argv2pin()

        sensor = GroveLightSensor(pin)
        
        print('Detecting light...')
            
        while True:
            
            print('Light value: {0}'.format(sensor.light))

            up_lum = ('UPDATE capteur SET lumiere = %d WHERE id = 1' %sensor.light)
            cursor.execute()
            connexion.commit()
            
            time.sleep(1)

    if __name__ == '__main__':
        main()