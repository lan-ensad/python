#!/usr/bin/python3


class Personn:
    """docstring for Personn"""

    def __init__(self, name):
        self.name = name

    def walk(self):
        print(f"{self.name} marche.")


volunteers = [Personn("Alice"), Personn("Bob"), Personn("Carol")]

for v in volunteers:
    v.walk()
