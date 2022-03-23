#!/usr/bin/python3

class Film:
    def __init__(self, name):
        self.name = name

    def watch(self, player):
        print("Have fun !")


class FilmCassette(Film):
    def __init__(self, name):
        super().__init__(name)
        self.name = name
        self.magnetic_tape = True

    def rewind(self):
        print("wait till rewind")
        self.magnetic_tape = True

    def watch(self, player):
        if player.type != "K7":
            print("No K7 here !")
        else:
            print("Old School !")
        super().watch(player)


class Player:
    def __init__(self, type):
        self.type = type


film = Film("Terminator")
film_cassette = FilmCassette("Indiana Jones")

player = Player("DVD")
film_cassette.watch(player)
