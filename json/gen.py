import random

file = open("accelZ.txt", "w")
for i in range(20):
    z = random.randint(0, 360)
    file.write(str(z) + "\n")

file.close()