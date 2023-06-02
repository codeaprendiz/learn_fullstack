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
# Learn Nodejs

");

$websites = trim("
## Websites

### Nodejs

- [npmjs.com](https://www.npmjs.com/)
- [ejs.co](https://ejs.co) (See Task - 055)
- [express](https://expressjs.com)
- [express application generator](https://expressjs.com/en/starter/generator.html)
- [express template engines](https://expressjs.com/en/resources/template-engines.html)  (See Task - 054)

### Bootstrap Links

- [Bootstrap - v5.3](https://getbootstrap.com/docs/5.3/getting-started/introduction/)
- [containers](https://getbootstrap.com/docs/5.3/layout/containers/)
- [jumbotron](https://getbootstrap.com/docs/5.3/migration/#jumbotron)
- [input](https://getbootstrap.com/docs/5.2/forms/input-group/#basic-example)

### Jquery

- [releases.jquery.com](https://releases.jquery.com)
");

$extensions=trim("
## Extensions for VS Code

- [Live Server](https://marketplace.visualstudio.com/items?itemName=ritwickdey.LiveServer)
- [eslint](https://marketplace.visualstudio.com/items?itemName=dbaeumer.vscode-eslint)  (See Task - 052)
- [prettier](https://marketplace.visualstudio.com/items?itemName=esbenp.prettier-vscode) (See Task - 052)
- [EJS language support](https://marketplace.visualstudio.com/items?itemName=DigitalBrainstem.javascript-ejs-support)   (See Task - 055)
");

$content=$content."\n\n".$websites."\n\n".$extensions."\n\n";

foreach ($tree as $parentDir => $links) {
    $content .= "## $parentDir\n\n";
    $content .= implode("\n", $links);
    $content .= "\n\n";
}

$replacementBatch1 = "## batch-1--001-018 -- [LinkedIn - Learning Nodejs](https://www.linkedin.com/learning/learning-node-js-2017)";

$content = str_replace("## batch-1--001-018", $replacementBatch1, $content);

$replacementBatch2 = "## batch-2--019-044 -- [LinkedIn - Node.js Essential Training](https://www.linkedin.com/learning/node-js-essential-training-14888164/learning-the-node-js-basics)";

$content = str_replace("## batch-2--019-044", $replacementBatch2, $content);

$replacementBatch3 = "## batch-3--045-049 -- [LinkedIn - Learning npm, a package manager](https://www.linkedin.com/learning/learning-npm-a-package-manager)";

$content = str_replace("## batch-3--045-049", $replacementBatch3, $content);

$replacementBatch4 = "## batch-4--050-078 -- [LinkedIn - Express Essential Training](https://www.linkedin.com/learning/express-essential-training-14539342)";
$content = str_replace("## batch-4--050-078", $replacementBatch4, $content);

## Batch 3 - https://www.linkedin.com/learning/learning-npm-a-package-manager
# Batch 4 - https://www.linkedin.com/learning/building-a-website-with-node-js-and-express-js-3
## Batch 4 - https://www.linkedin.com/learning/express-essential-training-14539342
## Batch 5 - https://www.linkedin.com/learning/databases-for-node-js-developers-2
## Batch 6 - https://www.linkedin.com/learning/advanced-express


file_put_contents("README.md", $content);

?>
