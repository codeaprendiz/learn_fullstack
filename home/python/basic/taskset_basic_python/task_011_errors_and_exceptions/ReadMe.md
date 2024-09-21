# Errors And Exceptions

- [Errors And Exceptions](#errors-and-exceptions)
  - [try, except](#try-except)

[Errors and Exceptions](https://docs.python.org/3/tutorial/errors.html)

---

## try, except

```python
try:
    f = open('testfile','r')
    f.write('Test write this')
except IOError:
    # This will only check for an IOError exception and then execute this print statement
   print("Error: Could not find file or read data")
finally:
   print("Always execute finally code blocks")
```

```bash
Error: Could not find file or read data
Always execute finally code blocks
```
