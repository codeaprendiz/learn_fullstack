# Dictionaries

- [Dictionaries](#dictionaries)
  - [Initialize](#initialize)
  - [Methods](#methods)

---

## Initialize

Make a dictionary with {} and : to signify a key and a value

```bash
# Multiple values
>>> dict={'key1':'value1', 'key2': [1,2,3,3.4,'test']}
>>> dict
{'key1': 'value1', 'key2': [1, 2, 3, 3.4, 'test']}

## Accessing individual values
>>> dict['key2']
[1, 2, 3, 3.4, 'test']
>>> dict['key2'][4]
'test'

# Reassign values
>>> dict['key1']='value2'
>>> dict
{'key1': 'value2', 'key2': [1, 2, 3, 3.4, 'test']}

# Empty dictionary
>>> d={}
>>> d['1']=2
>>> d
{'1': 2}

## Nested dictionaries
>>> d={'key1':'value1','key2':{'key3':'value3'}}
>>> d
{'key1': 'value1', 'key2': {'key3': 'value3'}}
>>> d['key2']
{'key3': 'value3'}
```

---

## Methods

```bash
# Get keys
>>> d.keys()
dict_keys(['key1', 'key2'])

# Get values
>>> d.values()
dict_values(['value1', {'key3': 'value3'}])

# Method to return tuples of all items
>>> d.items()
dict_items([('key1', 'value1'), ('key2', {'key3': 'value3'})])
```
