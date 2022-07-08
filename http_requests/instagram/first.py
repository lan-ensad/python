from datetime import datetime
from textwrap import indent
from unicodedata import name
from getpass import getpass
import requests
import time
import json


username = "lan.ensad"
pas = 'i7d2z5wD14'

r = requests.post("https://www.instagram.com/logging", auth=(username, pas))
time.sleep(1)
r = requests.post("https://www.instagram.com/accounts/onetap/")

# for k in r.headers:
#     print(k)
    
print(r.headers['Connection'])