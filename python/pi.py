import psutil
import sys
import time
import os

if sys.argv[1:]:
    param = sys.argv[1:]
else:
    param = ['null']

if param[0] == 'memory':
    print (psutil.virtual_memory().percent)
if param[0] == 'disk':
    print (psutil.disk_usage('/').percent)
if param[0] == 'uptime':
    print (int(time.time()) - int(psutil.boot_time()))
if param[0] == 'loadavg':
    print (os.getloadavg())
