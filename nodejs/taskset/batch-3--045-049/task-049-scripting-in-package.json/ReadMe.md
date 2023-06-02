# Scripting in package.json

## Run

- Default one because we have following entry in package.json

```json
"scripts": {
    "test": "echo \"Error: no test specified\" && exit 1"
  },
```

We can run the command 

```bash
$ npm test

> task-049-scripting-in-package.json@1.0.0 test
> echo "Error: no test specified" && exit 1

Error: no test specified
```
