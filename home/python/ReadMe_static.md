# ReadMe_static

- [ReadMe\_static](#readme_static)
  - [Virtual Env Configuration](#virtual-env-configuration)
    - [Using `python3`](#using-python3)
    - [Using `virtualenv`](#using-virtualenv)
  - [Extensions](#extensions)

[Setting up visual studio for python](https://code.visualstudio.com/docs/python/python-tutorial)

## Virtual Env Configuration

### Using `python3`

Create a directory workspace

```bash
mkdir -p ~/workspace/proj
cd ~/workspace
```

Create a virtual env

```bash
python3 -m venv venv
```

```bash
$ ls
proj venv
```

Now you can open visual studio from terminal and the python environment should be activiated

```bash
cd ~/workspace
code .
```

Validate

```bash
which python3
which pip3
```

Output

```bash
./venv/bin/python3
./venv/bin/python3
```

### Using `virtualenv`

```bash
which python3
which pip3
```

Output

```bash
/opt/homebrew/bin/python3
/opt/homebrew/bin/pip3
```

```bash
mkdir tmp
virtualenv -p $(which python3) ./tmp
source ./tmp/bin/activate
```

You should see the environment at the bottom bar in VS Code

```bash
code .
```

Output (showing)

```bash
./tmp/bin/python3
./tmp/bin/pip3
```

Deactivate

```bash
deactivate
```

## Extensions

[Python](https://marketplace.visualstudio.com/items?itemName=ms-python.python)
[IntelliCode](https://marketplace.visualstudio.com/items?itemName=VisualStudioExptTeam.vscodeintellicode)
[Pylance](https://marketplace.visualstudio.com/items?itemName=ms-python.vscode-pylance)
