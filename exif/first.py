from exif import Image

# my_image = Image('img.png')

with open('img.png', 'rb') as image_file:
    #image_bytes = image_file.read()
    my_image = Image(image_file) 

print(my_image.list_all())