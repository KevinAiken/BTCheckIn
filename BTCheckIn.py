import bluetooth
import time
import os.path
import MySQLdb
import datetime


home = False

db = MySQLdb.connect("localhost","monitor","MichaelChung1!", "users")
cursor = db.cursor()
usersdat = "SELECT * FROM usersdat"
userstatus = "SELECT * FROM userstatus"
while True:
    cursor.execute(usersdat)
    results = cursor.fetchall()
    cursor.execute(userstatus)
    status = cursor.fetchall()

    now = datetime.datetime.now()
    print now
    for row in status:
        #try:
        print "Checking " + time.strftime("%a, %d %b %Y %H:%M:%S", time.gmtime())
        result = bluetooth.lookup_name(str(row[0]), timeout=3)
        try:
            timeStamp = "%s-%s-%s %s:%s:%s" % (str(now.year),str(now.month),str(now.day),str(now.hour - 3),str(now.minute),str(now.second))
            cursor.execute("SELECT status FROM userstatus WHERE phoneID=%r" % (row[0]))
            statusOfPerson = cursor.fetchone()
            print statusOfPerson
            if (result != None and statusOfPerson[0] == 0):
                print str(row[1])+ ": in"
                overwrite = "UPDATE usersdat SET timeEntered=\"%s\" WHERE phoneID=\"%s\"" % (timeStamp, row[0])
                homeStatus = "UPDATE userstatus SET status=\"%s\" WHERE phoneID=\"%s\"" % (1, row[0])
                cursor.execute(overwrite)
                cursor.execute(homeStatus)
                db.commit()
            if(result == None and statusOfPerson[0] == 1):
                print str(row[1]) + ": out"
                overwrite = "UPDATE usersdat SET timeLeft=\"%s\" WHERE phoneID=\"%s\"" % (timeStamp, row[0])
                homeStatus = "UPDATE userstatus SET status=\"%s\" WHERE phoneID=\"%s\"" % (0, row[0])
                cursor.execute(overwrite)
                cursor.execute(homeStatus)
                db.commit()


        except:
            print("ERROR")

    time.sleep(1) # change to every few minutes for final
