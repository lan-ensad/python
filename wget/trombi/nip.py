#wget http://intranet.ensad.fr/annuaires/eleves/liste.php
#wget http://intranet.ensad.fr/annuaires/admin/liste.php
#wget http://intranet.ensad.fr/annuaires/prof/liste.php

#==========================================================================
#                       DETAILS SEARCH BY <NIP>
# if admin:
#     http://intranet.ensad.fr/annuaires/admin/detail.php?PK_EMPLOYE=<NIP>
# else if eleves:
#     http://intranet.ensad.fr/annuaires/eleves/detail.php?PK_ELEVE=<NIP>
# else if prof:
#     http://intranet.ensad.fr/annuaires/prof/detail.php?PK_EMPLOYE=<NIP>
#==========================================================================


import re
import wget
import requests

#=====      GENERAL CONST  =====
var = "eleves"
link = "http://intranet.ensad.fr/annuaires/photos/"
ext = ".jpg"

#=====      GENERAL VAR    =====
data = open("_data/data_"+str(var)+".txt", encoding='UTF-8', errors='ignore')
readfile = data.read()
if var =="eleves":
    x = re.findall("[0-9][0-9][0-9][0-9][0-9][0-9]", readfile)#SPECIFIQUE ELEVES !
else:
    x = re.findall("[0-9][0-9][0-9][0-9][0-9]", readfile)

#=====      CLEAR LIST      =====
nip = []
for i in x:
    if i not in nip:
        nip.append(i)

#=====      CHECK LINK      =====
#=====      DOWNLOAD IMG    =====
for v in nip:
    print(v)
    resp = requests.get(link+v+ext)
    if resp.status_code==200:
        file_name = wget.download(link+v+ext)
    else:
        print(v+" : "+"pas d'image")
    print("\n")

#print(nip)