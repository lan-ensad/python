#!/usr/bin/python3
import math


class Rectangle:
    def __init__(self, length, width, color="red"):
        self.length = length
        self.width = width
        self.color = color

    def calculate_area(self):
        return self.width * self.height


class Circle:
    def __init__(self, size=10):
        self.size = size

    def area(self):
        return self.size * math.pi


c1 = Circle(21)
res = "{:.2f}".format(c1.area())

print(res)
