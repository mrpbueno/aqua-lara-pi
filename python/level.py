from hcsr04sensor import sensor

# pinos GPIO
trig_pin = 23
echo_pin = 24

# le o sensor
value = sensor.Measurement(trig_pin, echo_pin, temperature=26, round_to=1)
raw_measurement = value.raw_distance()
dist = value.distance_metric(raw_measurement)

# arredonda para .0 ou .5
x = dist
resto = x % 1
if 0.0 <= resto < 0.3:
    dist = (x - resto)

if 0.3 <= resto <= 0.7:
    dist = ((x - resto) + 0.5)

if 0.7 < resto < 0.9:
    dist = (round(x))

print (dist)
