#pip install twitchAPI
from twitchAPI.pubsub import PubSub
from twitchAPI.twitch import Twitch
from twitchAPI.types import AuthScope
from pprint import pprint
from uuid import UUID

def user_refresh(token: str, refresh_token: str):
    print(f'my new user token is: {token}')

def app_refresh(token: str):
    print(f'my new app token is: {token}')

twitch = Twitch('25vijz5jc0q7q9202nkjndjjo098dm', '1kd9mrq5l61o4cgt37buxoif6t2hwn')
twitch.app_auth_refresh_callback = app_refresh
twitch.user_auth_refresh_callback = user_refresh