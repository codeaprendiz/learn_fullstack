# Using preg_replace to replace `<br>` characters in a script

## Run

```bash
$ cat ReadMe-input.md               
# Using preg_replace to replace `<br>` characters in a script

## Run

### Test

$ php updateReadMe.php
Argument: ReadMe.md
./ReadMe.md

$ php updateReadMe.php ReadMe-input.md
Argument: ReadMe-input.md
./ReadMe-input.md

$ cat ReadMe-input.md
# Using preg_replace to replace `<br>` characters in a script

## Run

### Test
```
