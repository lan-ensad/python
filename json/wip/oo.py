import json

gx = 12
gy = 8
gz = 6
ax = 8
ay = 11
az = 13

data = '{ "d":[{ "Gyro":{ "X":' + str(gx) + ', "Y":' + str(gy) + ', "Z":' + str(gz) + '}, "Accel":{ "X":' + str(ax) + ', "Y":' + str(ay) + ', "Z":' + str(az) + ' } }] }'

data = json.loads(data)

jfile = open("data.json", "w")

# Pretty Print JSON
json_formatted_str = json.dumps(data, indent=4)
print(json_formatted_str)

jfile = open("data.json", "w")
jfile.write(json_formatted_str)
jfile.close()