# from PIL import Image
# from PIL.ExifTags import TAGS
# imagename = "image.jpg"
#
# image = Image.open(imagename)
# exifdata = image.getexif()
#
# for tag_id in exifdata:
#     # get the tag name, instead of human unreadable tag id
#     tag = TAGS.get(tag_id, tag_id)
#     data = exifdata.get(tag_id)
#     # decode bytes
#     if isinstance(data, bytes):
#         data = data.decode()
#     print(f"{tag:25}: {data}")
#
# print("done")


# import ffmpeg
# import sys
# from pprint import pprint # for printing Python dictionaries in a human-readable way
#
# # read the audio/video file from the command line arguments
# media_file = sys.argv[1]
# # uses ffprobe command to extract all possible metadata from the media file
# pprint(ffmpeg.probe(media_file)["streams"])


# # Photo metadata is a set of data describing and providing information about rights and administration of an image.
#
# #importing os module
# import os
# from PIL import Image
# # Importing Pillow Python Imaging Library:that adds support for opening, manipulating, and saving many different image file formats.
# from PIL.ExifTags import TAGS
# # importing required modules
#
# #print(TAGS) checking if libraries are imported or not which basically returns a key value pairs of all the metadata.
#
# #Enter your Image here
# image_file = 'image.jpg'   # This image is copyrighted under © 2010 Hartswood Films.
#
# # on execution an object of Image type is returned and stored in image_file variable.
#
# try:
#     image = Image.open(image_file)
# except IOError:
#     pass
# # raise an IOError if file cannot be found,or the image cannot be opened.
#
# # dictionary to store metadata keys and value pairs.
# exif = {}
#
# # iterating over the dictionary
# for tag, value in image._getexif().items():
#
# #extarcting all the metadata as key and value pairs and converting them from numerical value to string values
#     if tag in TAGS:
#         exif[TAGS[tag]] = value
#
# #checking if image is copyrighted
# try:
#     if 'Copyright' in exif:
#         print("Image is Copyrighted, by ", exif['Copyright'])
# except KeyError:
#     pass
#
# print()
# print("Displaying all the metadatas of the image: \n")
# print(exif)


# load modules
from PIL import Image
from PIL.ExifTags import TAGS
from prettytable import PrettyTable

image_filename = "image.jpg"

# initialiting prettytable object
table = PrettyTable()

# setting table feilds name
table.field_names = ["MetaTags", "Values"]

# load image
my_image = Image.open(image_filename)

# get EXIF standared Data of the image
img_exif_data = my_image.getexif()

for id in img_exif_data:
    tag_name = TAGS.get(id, id)
    data = img_exif_data.get(id)

    # if data in bytes
    if isinstance(data, bytes):
        data = data.decode()

    table.add_row([tag_name, data])

print(table)
