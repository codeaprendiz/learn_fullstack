# Control Flow and Operators

- [Control Flow and Operators](#control-flow-and-operators)
  - [Operators](#operators)
    - [Comparision Operators](#comparision-operators)
    - [Logical Operators](#logical-operators)
  - [Control Flow](#control-flow)
    - [if else](#if-else)
    - [Loops](#loops)

---

## Operators

---

### Comparision Operators

```bash
>>> # Greater than
>>> 1 > 2
False
>>> # Less than
>>> 1 < 2
True
>>> # Greater than or Equal to
>>> 1 >= 1
True
>>> # Less than or Equal to
>>> 1 <= 4
True
>>> # Equality
>>> 1 == 1
True
>>> 1 == "1"
False
>>> 'hi' == 'bye'
False
>>> # Inequality
>>> 1 != 2
True
```

---

### Logical Operators

```bash
>>> # AND
>>> (1 > 2) and (2 < 3)
False
>>> 
>>> # OR
>>> (1 > 2) or (2 < 3)
True
>>> 
>>> # Multiple logical operators
>>> (1 == 2) or (2 == 3) or (4 == 4)
True
```

---

## Control Flow

---

### if else

```bash
# if
>>> if 1<2:
...   print("yes")
... 
yes

## if else
>>> if 1>2:
...   print("yes")
... else:
...   print("no")
... 
no


```python
if 1>2:
  print("1>2")
elif 2==2:
  print("2==2")
else:
  print("else")
```

Output

```bash
2==2
```

---

### Loops

```bash
## Loops with lists
>>> seq=[1,2,3,4,5]
>>> for i in seq:
...   print(i)
... 
1
2
3
4
5

## Loops with dictionaries
>>> dict={'key1':'value1', 'key2':'value2'}
>>> for key in dict:
...   print(key)
... 
key1
key2

## List of tuples
>>> l=[(1,2),(3,4),(5,6)]
>>> for item1,item2 in l:
...   print(item1,item2)
... 
1 2
3 4
5 6
```

```bash
## while loops
>>> i=1
>>> while i<5:
...  print(i)
...  i=i+1
... 
1
2
3
4
```

```bash
# range()
>>> for i in range(1,5):
...   print(i)
... 
1
2
3
4
```
