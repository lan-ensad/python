from name import names_list
import random


def PrintTeam():
    count = 0
    for e in names_list:
        print(str(count) + "  " + e )
        count+=1

def PrintRandom():
    print(random.choice(names_list))


#PrintTeam()
PrintRandom()
