from flask import Flask, render_template, request, redirect #Flask micro python server
app = Flask(__name__, template_folder='../') #Server Declaration
import time,socket
import RPi.GPIO as GPIO

GPIO.setwarnings(False)    
GPIO.setmode(GPIO.BCM)

#fetch ip address
#s = socket.socket(socket.AF_INET, socket.SOCK_DGRAM)
#s.connect(("8.8.8.8", 80))
ip= [l for l in ([ip for ip in socket.gethostbyname_ex(socket.gethostname())[2] if not ip.startswith("127.")][:1], [[(s.connect(('8.8.8.8', 53)), s.getsockname()[0], s.close()) for s in [socket.socket(socket.AF_INET, socket.SOCK_DGRAM)]][0][1]]) if l][0][0]

@app.route('/')
def index():
    return "Flask Server works"

@app.route('/light')#light on
def light():
    GPIO.setup(20, GPIO.OUT)
    check = GPIO.input(20)
    if check:
        GPIO.output(20, GPIO.LOW)    
    else:
        GPIO.output(20, GPIO.HIGH)
    return redirect("http://%s/smarthome.php?lightS=%d" % (ip,check))
    

@app.route('/fan')#fan on
def fan():
    GPIO.setup(21, GPIO.OUT)
    check = GPIO.input(21)
    if check:
        GPIO.output(21, GPIO.LOW)
    else:
        GPIO.output(21, GPIO.HIGH)
    return redirect("http://%s/smarthome.php?fanS=%d" % (ip,check))
    
@app.route('/night')#night mode
def night():
    GPIO.setup(21, GPIO.OUT)
    GPIO.setup(20, GPIO.OUT)
    GPIO.output(20, GPIO.LOW)
    GPIO.output(21, GPIO.LOW)
    check = 1
    check1 = 1
    
    return redirect("http://%s/smarthome.php?lightS=%d&fanS=%d" % (ip,check,check1))


if __name__ == '__main__':
    app.run(debug=True, host='0.0.0.0')

    
