#pip install twitch-python

import twitch

helix = twitch.Helix('25vijz5jc0q7q9202nkjndjjo098dm', '1kd9mrq5l61o4cgt37buxoif6t2hwn')

twitch.Chat(channel='#ensadlan', nickname='zarlach', oauth='25vijz5jc0q7q9202nkjndjjo098dm').subscribe(
        lambda message: print(message.channel, message.user.display_name, message.text))