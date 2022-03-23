#!/usr/bin/python3
import turtle
t = turtle.Turtle()

turtle.bgcolor("blue")
turtle.title("My Turtle Program")
t.pensize(10)
t.shapesize(1, 1, 1)

def main():
    t.home()
    t.rt(90)
    t.fd(100)

while(True):
    main()



if __name__ == '__main__':
    main()
