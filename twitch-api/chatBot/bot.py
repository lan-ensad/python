#https://dev.to/ninjabunny9000/let-s-make-a-twitch-bot-with-python-2nd8

import os # for importing env vars for the bot to use
from twitchio.ext import commands

bot = commands.Bot(
    # set up the bot
    irc_token=os.environ['TMI_TOKEN'],
    client_id=os.environ['CLIENT_ID'],
    nick=os.environ['BOT_NICK'],
    prefix=os.environ['BOT_PREFIX'],
    initial_channels=[os.environ['CHANNEL']]
)
@bot.command(name='test')
async def test(ctx):
    await ctx.send('test passed!')

if __name__ == "__main__":
    bot.run()