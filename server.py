import MySQLdb
import time
#import login credit
from credit import *
def database_func(cap_time, file_name):
    #connect to database
    db = MySQLdb.connect(host="mysql.trinhson.com",    # your host, usually localhost
                             user=dbusername,         # your username
                             passwd=dbpassword,  # your password
                             db="trinhson_database")        # name of the data base

    cur = db.cursor()
    # insert time and photo name to database
    cur.execute("INSERT INTO robot_record (time, photo_name) VALUES (%s, %s)", (cap_time, file_name))
    #select all record after insert
    cur.execute("SELECT * FROM robot_record")
    db.commit()
    myresult = cur.fetchall()

    #print all records
    for x in myresult:
      print(x)
    #close connection
    db.close()



