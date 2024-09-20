# Strings

- [Strings](#strings)
  - [Single quotes and double quotes](#single-quotes-and-double-quotes)
  - [len(string)](#lenstring)
  - [String Assignment](#string-assignment)
  - [String Methods](#string-methods)
  - [Formatting](#formatting)

## Single quotes and double quotes

```bash
>>> print('1 two "3" 4 \n5')
1 two "3" 4 
5
```

## len(string)

```bash
>>> len('two')
3
```

## String Assignment

```bash
>>> s='hello'

>>> print(s)
hello

# Show first element (in this case a letter)
>>> s[0]
'h'
>>> print(s[0])
h

# Grab everything past the first term all the way to the length of s which is len(s)
>>> s[1:]
'ello'

# Note that there is no change to the original s
>>> s
'hello'

# Grab everything UP TO the 3rd index
>>> s[:3]
'hel'

#Everything
>>> s[:]
'hello'

# Last letter (one index behind 0 so it loops back around)
>>> s[-1]
'o'

# Grab everything, but go in steps size of 1
'hello'

# Grab everything, but go in step sizes of 2
>>> s[::2]
'hlo'

# We can use this to print a string backwards
>>> s[::-1]
'olleh'

# Concatenate strings!
>>> s + ' concatenate me!'
'hello concatenate me!'
```

## String Methods

```bash
>>> s.upper()
'HELLO'

>>> s.lower()
'hello'

>>> str='hello world'
>>> str.split()
['hello', 'world']

# Split by a specific element (doesn't include the element that was split on)
>>> str.split('w')
['hello ', 'orld']
```

## Formatting

```bash
>>> 'Inser {}'.format('1234')
'Inser 1234'

>>> print('a={a}, b={b}, c={c}'.format(a=1,b='b',c=2.3))
a=1, b=b, c=2.3
```
