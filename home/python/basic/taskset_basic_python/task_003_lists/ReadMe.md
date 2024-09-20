# lists

- [lists](#lists)
  - [Initialize](#initialize)
  - [Indexing and Slicing](#indexing-and-slicing)
  - [Functions](#functions)
  - [Nesting List](#nesting-list)

## Initialize

```bash
>>> a=[1,'2','three',2.4,2,4,3]
>>> a
[1, '2', 'three', 2.4, 2, 4, 3]
```

## Indexing and Slicing

```bash
# Grab element at index 0
>>> a[0]
1
# Grab element at the last index
>>> a[-1]
3

# Grab index 1 and everything past it
>>> a[1:]
['2', 'three', 2.4, 2, 4, 3]

# Grab everything UP TO index 3
>>> a[:3]
[1, '2', 'three']

# Reassign
>>> a=a+['new']
>>> a
[1, '2', 'three', 2.4, 2, 4, 3, 'new']

# Make the list double
>>> a=a*2
>>> a
[1, '2', 'three', 2.4, 2, 4, 3, 'new', 1, '2', 'three', 2.4, 2, 4, 3, 'new']
```

## Functions

```bash
>>> len(a)
16

# append
>>> b=[1,2,3,4]
>>> b.append(5)
>>> b
[1, 2, 3, 4, 5]

# pop at index
>>> b.pop(2)
3
>>> b
[1, 2, 4, 5]

# reverse()
>>> b.reverse()
>>> b
[5, 4, 2, 1]

# sort
>>> b.sort()
>>> b
[1, 2, 4, 5]
```

## Nesting List

```bash
>>> a=[1,2]
>>> b=[3,4]
>>> c=[a,b]
>>> c
[[1, 2], [3, 4]]
>>> c[0]
[1, 2]
>>> c[0][1]
2
```
