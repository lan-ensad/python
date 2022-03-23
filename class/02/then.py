#!/usr/bin/python3

class Drink:
    def __init__(self, price):
        self.price = price

    def drink(self):
        print("Ca picole")


class Coffee(Drink):
    prices = {"simple": 1, "serré": 1, "allongé": 1.5}

    def __init__(self, type):
        self.type = type
        super().__init__(price=self.prices.get(type, 1))

    def drink(self):
        print("café")
