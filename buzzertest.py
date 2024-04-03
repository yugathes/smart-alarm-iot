from gpiozero import Buzzer
from time import sleep

buzzer = Buzzer(27)

while True:
    buzzer.on()