#!/usr/bin/env python3

from tm1637 import TM1637 
from time import time, sleep, localtime

CLK=5 
DIO=4

def show_clock(tm):
    t = localtime()
    sleep(1 - time() % 1)

    tm.numbers(t.tm_hour, t.tm_min, True)
    sleep(.5)
    tm.numbers(t.tm_hour, t.tm_min, False)

print("\n")
print("============================")
print(" Starting clock application")
print("============================")
    
tm = TM1637(CLK, DIO)
tm.brightness(1)
    
while True:
    show_clock(tm)
