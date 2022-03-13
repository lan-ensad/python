gx = open("x.txt", "r")
gy = open("y.txt", "r")
gz = open("z.txt", "r")
ax = open("accelX.txt", "r")
ay = open("accelY.txt", "r")
az = open("accelZ.txt", "r")


def LinesCount(str):
    with open(str, 'r') as fp:
        count = len(fp.readlines())
        return count

total = LinesCount("x.txt")
print(str(total) + ' Lines.')

combine = open("comb.txt", "w")
for i in range(total):
    combine.write(str(gx.readline().strip()) + ' ; ' + 
    str(gy.readline().strip()) + ' ; ' + 
    str(gz.readline().strip()) + ' ; ' +
    str(ax.readline().strip()) + ' ; ' +
    str(ay.readline().strip()) + ' ; ' +
    str(az.readline().strip()) + '\n')

combine.close()