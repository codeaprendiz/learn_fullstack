<?php

function createTree($dir) {
    $tree = [];

    $dirs = array_filter(glob($dir . '/*'), 'is_dir');
    sort($dirs);

    foreach ($dirs as $d) {
        $dirName = trim(basename($d));

        // Include directories that match the pattern task-*
        if (preg_match('/^task-/', $dirName)) {
            $relativePath = substr($d, strlen(getcwd()) + 1);
            $link = trim(str_replace(' ', '-', strtolower($relativePath)));

            $pathParts = explode('/', $relativePath);
            $parentDir = $pathParts[count($pathParts) - 2]; // Get the immediate parent directory name

            if (!isset($tree[$parentDir])) {
                $tree[$parentDir] = [];
            }

            $tree[$parentDir][] = "- [$dirName]($link)";
        }

        // Traverse into subdirectories even if they don't match the pattern
        if (!empty(glob("$d/*"))) {
            $tree = array_merge($tree, createTree($d));
        }
    }

    return $tree;
}

$tree = createTree(getcwd() . "/taskset");  // use absolute path to start

$content = trim("
# learn javascript

");

$extensions=trim("
## Extensions for VS Code

- [ESLint](https://marketplace.visualstudio.com/items?itemName=dbaeumer.vscode-eslint)
- [LiveServer](https://marketplace.visualstudio.com/items?itemName=ritwickdey.LiveServer)
- [Prettier - Code formatter](https://marketplace.visualstudio.com/items?itemName=esbenp.prettier-vscode)
");

$keyboard_shortcuts=trim("
## Keyboard shortcuts

### VS Code (mac)

- Toggle between full screen and last open window size
  - `cntr + cmd + F`

- To open terminal
  - `cntr + ~`

- To switch terminals in VS Code
  - `CMD + Shift + [` or `CMD + Shift + ]` 

- To open first file in editor
  - `cntr + 1` 
");

$bashScript = <<<EOT
## Aliases

```bash
push() {
  git add .
  git commit -m "\${1:-chore: update}"
  git push -u origin main
}
alias gst="git status"
alias gl="git pull"
```
EOT;

$content=$content."\n\n";

foreach ($tree as $parentDir => $links) {
    $content .= "## $parentDir\n\n";
    $content .= implode("\n", $links);
    $content .= "\n\n";
}

$content=$content.$extensions."\n\n".$bashScript."\n\n".$keyboard_shortcuts."\n";

$content=str_replace("# batch-1-001-050", "# Batch 1 : [JavaScript Essential Training](https://www.linkedin.com/learning/javascript-essential-training) : LinkedIn Learning : 001-050", $content );

file_put_contents("README.md", $content);

?>