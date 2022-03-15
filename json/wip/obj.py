# Import required libraries
import json

kk = 0
# Initialize JSON data
json_data = '[ \
    {"studentid": kk, "name": "Nikhil", "subjects": [\
        "Python", "Data Structures"\
        ]},\
    {"studentid": 2, "name": "Nisha", "subjects": [\
        "Java", "C++", "R Lang"\
        ]} ]'

# Create Python object from JSON string
# data
data = json.loads(json_data)

# Pretty Print JSON
json_formatted_str = json.dumps(data, indent=4)
print(json_formatted_str)
