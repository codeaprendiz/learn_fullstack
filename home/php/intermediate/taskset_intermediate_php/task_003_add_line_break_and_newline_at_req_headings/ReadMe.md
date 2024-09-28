# Add line break and newline at req headings

> [!NOTE]
> Only 5 files are changed at a time. This is also configurable.

<br>

## Run

```bash
$ cat test.md
# h1

## h2

## h3

### h4

$ README_FILENAME=test.md LINES=5 php updateReadMe.php
./test.md

$ cat test.md
# h1

<br>

## h2

<br>

## h3

<br>

### h4

$ php updateReadMe.php # This will also change current ReadMe.md
./ReadMe.md
```
