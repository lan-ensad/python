import time
import requests
from pysondb import getDb

test = getDb('test.json')

key = 'e90935cdde444130492458747438a26c'
lat = 48.400002
lon = -4.48333


while True:
    geo = "https://api.openweathermap.org/data/2.5/weather?lat="+str(lat)+"&lon="+str(lon)+"&appid="+key
    r = requests.get(geo)
    data = r.json()
    test.add(data)
    time.sleep(10)
    print(data)