gx = open("data/gyroX.txt", "r")
gy = open("data/gyroY.txt", "r")
gz = open("data/gyroZ.txt", "r")
ax = open("data/accelX.txt", "r")
ay = open("data/accelY.txt", "r")
az = open("data/accelZ.txt", "r")

def LinesCount(str):
    with open(str, 'r') as fp:
        count = len(fp.readlines())
        return count

total = LinesCount("data/gyroX.txt")
print(str(total) + ' Lines.')

combine = open("combined.txt", "w")
for i in range(total):
    combine.write(str(gx.readline().strip()) + ';' + 
    str(gy.readline().strip()) + ';' + 
    str(gz.readline().strip()) + ';' +
    str(ax.readline().strip()) + ';' +
    str(ay.readline().strip()) + ';' +
    str(az.readline().strip()) + '\n')

combine.close()