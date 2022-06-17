#https://builtvisible.com/download-your-website-with-wget/
from reprlib import recursive_repr
import wget

site_url = 'https://lan.ensad.fr/'
file_name = wget.download(site_url)
print(file_name)