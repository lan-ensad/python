#https://ireadblog.com/posts/159/getting-started-with-pysondb

from pysondb import getDb
test = getDb('test.json')

new_item = {"name": "Book2", "quantity": 7}
item_id = test.add(new_item)
print(item_id)