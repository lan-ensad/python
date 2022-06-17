from urllib.request import BaseHandler
from flask import Flask

app = Flask(__name__)


@app.route('/')
def hello():
    return 'Hello, World!'

# GIT BASH
# source Scripts/activate
#    => Active venv
#
#
# export FLASK_APP=<name>
# export FLASK_ENV=development
#
#
# flask run