# Python program to write JSON
# to a file
 
 
import json
 
# Data to be written
dictionary ={
    "timestamp":[{
        "_id":0,
        "Gyro":{
            "X":0,
            "Y":0,
            "Z":0
        },
        "Accel":{
            "X":0,
            "Y":0,
            "Z":0
        }
    }]
}
 
with open("sample.json", "w") as outfile:
    json.dump(dictionary, outfile)