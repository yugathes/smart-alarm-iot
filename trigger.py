#!/usr/lib/python3.9
import mysql.connector
import datetime
from gpiozero import Buzzer
import time
import RPi.GPIO as GPIO
#from pydub import AudioSegment
#from pydub.playback import play

from pygame import mixer


GPIO.setwarnings(False)
GPIO.setmode(GPIO.BCM)
buzzer = Buzzer(27)
#alarm = AudioSegment.from_mp3("/home/pi/alarm.mp3")
#mixer.init()
#mixer.music.load("/home/pi/alarm.mp3")

print("Waiting Alarm To trigger")    
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
            #print("Days :",days)
            for i in days:
                if(i == day):#check date same
                    a = str(x[2]) 
                    print("Alarm time : ",a)
                    print(now)
                    if(now[0] == '0'):
                        now = now[1:]
                        print("Alarm time2 : ",a)
                        if(a==now): #check time same
                            print("Alarm Rings 1")
                            GPIO.setup(20, GPIO.OUT)
                            GPIO.output(20, GPIO.HIGH)
                            GPIO.setup(21, GPIO.OUT)
                            GPIO.output(21, GPIO.HIGH)
                            buzzer.on()
                            sleep(160)
     #                       mixer.music.play()
                            #play(alarm)
                    else:
                        #print("Alarm time2 : ",a)
                        if(a==now): #check time same
                            print("Alarm Rings 2")
                            GPIO.setup(20, GPIO.OUT)
                            GPIO.output(20, GPIO.HIGH)
                            GPIO.setup(21, GPIO.OUT)
                            GPIO.output(21, GPIO.HIGH)
                            buzzer.on()
                            sleep(160)
     #                       mixer.music.play()
                            #play(alarm)
                        else:
                            buzzer.off()
                else:
                    buzzer.off()
                            
    except:
        print("Error")
    time.sleep(1)


