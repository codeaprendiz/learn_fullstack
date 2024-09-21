# Functions

Print function with default value of param

```python
def helloworld(param='default'):
    print(param)

helloworld()
helloworld('newvalue')
```

Output

```bash
default
newvalue
```

Return value

```python
def hello():
    return "hello"

a=hello()
print(a)
```

Output

```bash
hello
```

## Filter Function

```bash
my_list = [1,2,3,4,5,6,7,8,9,10]

def evenBool(num):
    return num % 2 == 0

evens = filter(evenBool, my_list)
# Since filter() returns an iterator (a filter object), we convert it to a list using list().
print(list(evens))
```

Output

```bash
[2, 4, 6, 8, 10]
```
