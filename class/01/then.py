#!/usr/bin/python3


class Bird:
    """Un oiseau."""

    names = ("mouette", "pigeon", "moineau", "hirrondell")
    positions = {}

    def __init__(self, name):
        self.position = 1, 2
        self.name = name
        self.positions[self.position] = self.name

    @staticmethod
    def get_definition():
        return """Animal vertébré sans chaud qui vole ou alors pas"""

    @classmethod
    def find_bird(cls, position):
        if position in cls.positions:
            return f"""C'est un {cls.positions[position]}"""

        return "There is nothing :("


Bird.names
Bird.positions
print(Bird.find_bird((1, 2)))

b = Bird("mouette")
# print(b.find_bird((1, 2)))
print(Bird.get_definition())
