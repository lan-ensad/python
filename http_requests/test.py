from base64 import encode
from textwrap import indent
from unicodedata import name
import requests
import json

#def WherIs():
    #TODO#
    #choper les coordonnée avec la requete geo

#===========================
#       Citys List
f = open("citys.json", 'r', encoding="utf-8")
citys = json.load(f)

#API KEY
key = 'e90935cdde444130492458747438a26c'

#===========================
#Weather latitude / longitude
lat = 48.854230415233936
lon = 2.3495804128361444
r = requests.get("https://api.openweathermap.org/data/2.5/weather?lat="+str(lat)+"&lon="+str(lon)+"&appid="+key)

#===========================
#   Geocoding citys.json
# permet de trouver les coordonée
#http://api.openweathermap.org/geo/1.0/direct?q={city name},{state code},{country code}&limit={limit}&appid={API key}
geo = "http://api.openweathermap.org/geo/1.0/direct?q=Paris,FR&appid="+key


data = json.dumps(r.json(), indent=4)
print(data)
