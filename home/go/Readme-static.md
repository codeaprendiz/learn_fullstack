# ReadMe Static

- Rename folders

```bash
# Rename folders
find . -depth -type d -name '*-*' | while read -r dir; do mv "$dir" "$(echo $dir | tr '-' '_')"; done
```

> Revised until : 050

```bash
alias g='git add --all;git commit -m "chore: update";git push -u origin main'
```

[golang.org/](https://golang.org/)
[doc](https://golang.org/doc)
[godoc.org](https://pkg.go.dev/)
[golang spec](https://golang.org/ref/spec)
[Go Playground](https://play.golang.org/)
[Golang blog](https://blog.golang.org/using-go-modules)
[using go modules](https://blog.golang.org/using-go-modules)
[String formatting](https://golang.org/pkg/fmt/)
