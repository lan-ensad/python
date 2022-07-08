import PIL.Image
import json 

file = 'photo.jpg'

img = PIL.Image.open(file)
exif_data = img._getexif()



print(exif_data)