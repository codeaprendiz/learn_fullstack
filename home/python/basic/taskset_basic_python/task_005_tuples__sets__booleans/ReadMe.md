# Tuples, Sets And Booleans

- [Tuples, Sets And Booleans](#tuples-sets-and-booleans)
  - [Tuples](#tuples)
    - [Initialize](#initialize)
    - [Methods](#methods)
  - [Set](#set)
  - [Booleans](#booleans)

---

## Tuples

---

### Initialize

```bash
>>> t=(1,'2',3.4,'four')
>>> t
(1, '2', 3.4, 'four')

## Get first element
>>> t[0]
1

# Get last element
>>> t[-1]
'four'
```

---

### Methods

> [!NOTE]  
> Tuples are immutable.

```bash
>>> t
(1, '2', 3.4, 'four')
>>> len(t)
4

# Use .index to enter a value and return the index
>>> t.index('four')
3
# Use .count to count the number of times a value appears
>>> t.count(1)
1
```

---

## Set

```bash
>>> x=set()
>>> x.add(1)
>>> x.add(1)
>>> x
{1}
>>> x.add(2)
>>> x
{1, 2}

# List to set
>>> l=[1,2,1,2,3,4,5,4,3,2,2,3,11]
>>> set(l)
{1, 2, 3, 4, 5, 11}
```

---

## Booleans

```bash
>>> a=True
>>> a
True
>>> 1>2
False
```
