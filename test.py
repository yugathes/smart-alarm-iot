#!/usr/lib/python3.9
import mysql.connector
import datetime

import time
import RPi.GPIO as GPIO
#from pydub import AudioSegment
#from pydub.playback import play

from pygame import mixer


GPIO.setwarnings(False)
GPIO.setmode(GPIO.BCM)
#alarm = AudioSegment.from_mp3("/home/pi/alarm.mp3")
mixer.init()
mixer.music.load("/home/pi/alarm.mp3")

    
while True:
    current_time = datetime.datetime.now()
    now = current_time.strftime("%H:%M:%S")
    day = current_time.strftime("%a")
    mydb = mysql.connector.connect(
      host="localhost",
      user="root",
      password="sudo",
      database="alarmClock"
    )

    mycursor = mydb.cursor()
    try:
        mycursor.execute("SELECT * FROM alarm WHERE status = 1")
        myresult = mycursor.fetchall()
        for x in myresult:
            days = x[3].split(",")
            days = filter(None, days)

            for i in days:
                if(i == day):
                    a = str(x[2]) #check date same
                    if(now[0] == '0'):
                        now = now[1:]
                    if(a==now): #check time same
                        print("Alarm Rings")
                        GPIO.setup(20, GPIO.OUT)
                        GPIO.output(20, GPIO.HIGH)
                        GPIO.setup(21, GPIO.OUT)
                        GPIO.output(21, GPIO.HIGH)
                        mixer.music.play()
                        #play(alarm)
    except:
        print("Error")
    time.sleep(1)


