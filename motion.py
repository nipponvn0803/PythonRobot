import datetime
import time
import easygopigo3 as easy
import picamera

gpg3_obj = easy.EasyGoPiGo3()
port = "AD1"
motion_sensor =gpg3_obj.init_motion_sensor(port)

while True:
        with picamera.PiCamera() as camera:
                if motion_sensor.motion_detected():
                        print ("detected")
                        # take 3 pictures
                        for x in range (3):
                                # Get time now
                                capture_time = str(datetime.datetime.now())
                                camera.resolution = (1024, 768)
                                camera.start_preview()
                                i = str(x + 1)
                                # Name the photo with timestamp and attemp
                                camera.capture(capture_time + " #" + i + '.jpg')
                                time.sleep(.5)
                        # sleep 2 seconds
                        time.sleep(2)
                else:
                        print ("nothing")
                        #sleep 1 second
                        time.sleep(1)





