
1
2
3
4
5
6
7
8
9
10
11
12
13
14
15
from signal import signal, SIGTERM, SIGHUP, pause
from rpi_lcd import LCD
lcd = LCD()
def safe_exit(signum, frame):
    exit(1)
try:
    signal(SIGTERM, safe_exit)
    signal(SIGHUP, safe_exit)
    lcd.text("Hello,", 1)
    lcd.text("Raspberry Pi!", 2)
    pause()
except KeyboardInterrupt:
    pass
finally:
    lcd.clear()
