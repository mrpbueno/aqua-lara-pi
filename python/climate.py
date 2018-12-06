import Adafruit_DHT

# tipo de sensor
sensor = Adafruit_DHT.AM2302
# GPIO
pino = 22
# le o sensor
umid, temp = Adafruit_DHT.read_retry(sensor, pino)
# caso de erro retorna 0
if umid is not None and temp is not None:
    print ('{0:0.1f}-{1:0.1f}'.format(temp, umid))
else:
    print ('0.0-0.0')
