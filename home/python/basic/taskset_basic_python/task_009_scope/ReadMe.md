# Scope

---

```python
x = 25

def printer():
    x = 50
    return x

print(x)
print(printer())

print(x)
```

Output

```bash
25
50
25
```

---

```bash
x = 25

def printer():
    global x
    x=50
    return x

print(x)
print(printer())

print(x)
```

Output

```bash
25
50
50
```
