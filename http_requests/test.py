from base64 import encode
from datetime import datetime
from textwrap import indent
import time
from unicodedata import name
import requests
import json

#def WherIs():
    #TODO#
    #choper les coordonnées avec la requete geo

def Pickapi():
    r = requests.get("https://api.openweathermap.org/data/2.5/weather?lat="+str(lat)+"&lon="+str(lon)+"&appid="+key)
    return r.json()

output = "Brest.txt"

#===========================
#       Citys List
f = open("citys.json", 'r', encoding="utf-8")
citys = json.load(f)

#API KEY
key = 'e90935cdde444130492458747438a26c'

#===========================
#Weather latitude / longitude
lat = 48.400002
lon = -4.48333
#r = requests.get("https://api.openweathermap.org/data/2.5/weather?lat="+str(lat)+"&lon="+str(lon)+"&appid="+key)

#===========================
#   Geocoding citys.json
# permet de trouver les coordonée
#http://api.openweathermap.org/geo/1.0/direct?q={city name},{state code},{country code}&limit={limit}&appid={API key}
city = 'Paris'
country = 'FR'
geo = "http://api.openweathermap.org/geo/1.0/direct?q="+city+","+country+"&appid="+key



with open(output, 'w') as out:
    while True:
        r = requests.get("https://api.openweathermap.org/data/2.5/weather?lat="+str(lat)+"&lon="+str(lon)+"&appid="+key)
        dataPretty = json.dumps(r.json(), indent=4)
        data = r.json()
        out.write(str(datetime.now())+'\t')
        out.write(str(data['wind'])+'\n')
        print(str(datetime.now())+'\t'+str(data['wind']))
        time.sleep(60)

print(data['wind'])
