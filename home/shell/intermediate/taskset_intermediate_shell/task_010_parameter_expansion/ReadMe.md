# Parameter Expansion

- [Scripts](#scripts)
  - [default vars shell](#default-vars-shell)
  - [set -e with multiple scripts](#set--e-with-multiple-scripts)

[www.gnu.org » Shell-Parameter-Expansion.html](https://www.gnu.org/software/bash/manual/html_node/Shell-Parameter-Expansion.html)

```bash
####
$ var=
$ : ${var:?var is unset or null}
zsh: var: var is unset or null
$ echo $?
1

$ var=""
$ : ${var:?var is unset or null}
zsh: var: var is unset or null
$ echo $?                       
1

$ var="a"
$ : ${var:?var is unset or null}
$ echo $?                       
0

```