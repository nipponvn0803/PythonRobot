import requests
import MySQLdb

def server_func():
    #!/usr/bin/python

    db = MySQLdb.connect(host="mysql.trinhson.com",    # your host, usually localhost
                         user="caoson",         # your username
                         passwd="hikzDFBB",  # your password
                         db="trinhson_database")        # name of the data base

    # you must create a Cursor object. It will let
    #  you execute all the queries you need
    cur = db.cursor()

    # Use all the SQL you like
    cur.execute("SELECT * FROM robot_record")

    myresult = cur.fetchall()

    for x in myresult:
      print(x)

server_func()

