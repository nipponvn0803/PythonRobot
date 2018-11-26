import datetime
import time
import easygopigo3 as easy
import picamera
import ftplib
import MySQLdb
#import login credit
from credit import *
#import database function
from server import database_func

#login to server and go to upload folder                        
ftp = ftplib.FTP('trinhson.com')
ftp.login(webusername,webpassword)
ftp.cwd('trinhson.com/uploads')

gpg3_obj = easy.EasyGoPiGo3()
port = "AD1"
motion_sensor =gpg3_obj.init_motion_sensor(port)

while True:
        with picamera.PiCamera() as camera:
                if motion_sensor.motion_detected():
                        print ("detected")
                        # take 2 pictures
                        for x in range (2):
                                # Get time now
                                now = time.strftime('%Y-%m-%d %H:%M:%S')
                                capture_time = str(now)
                                camera.resolution = (1024, 768)
                                camera.start_preview()
                                i = str(x + 1)
                                # Name the photo with timestamp and attemp
                                camera.capture(capture_time + " #" + i + '.jpg')
                                filename = capture_time + " #" + i + '.jpg'
                                #open the file and ready for transferring to server
                                myfile = open('/home/pi/PythonRobot/'+capture_time + " #" + i + '.jpg', 'rb')
                                #send photo to server
                                ftp.storbinary('STOR ' + filename, myfile)
                                #add photo name to databse
                                database_func(now, filename)
                                time.sleep(.5)
                        # sleep 2 seconds
                        time.sleep(2)
                else:
                        print ("nothing")
                        #sleep 1 second
                        time.sleep(1)





