# Run if file exists

```bash
cat <<EOF > run.sh
#!/bin/bash

echo "File is run.sh"
EOF
```

```bash
[ -s "run.sh" ] && bash run.sh
```

Output

```bash
File is run.sh
```

```bash
rm run.sh
```