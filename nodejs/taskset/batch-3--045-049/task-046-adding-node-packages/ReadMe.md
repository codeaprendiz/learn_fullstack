# Adding node packages

## Run

- Install local dependency

```bash
npm install express

added 50 packages, and audited 51 packages in 3s

found 0 vulnerabilities
```

- Installing a devDependency

```bash
npm install babel-cli --save-dev          
Debugger attached.
npm WARN deprecated urix@0.1.0: Please see https://github.com/lydell/urix#deprecated
npm WARN deprecated resolve-url@0.2.1: https://github.com/lydell/resolve-url#deprecated
npm WARN deprecated fsevents@1.2.13: fsevents 1 will break on node v14+ and could be using insecure binaries. Upgrade to fsevents 2.
npm WARN deprecated chokidar@1.7.0: Chokidar 2 will break on node v14+. Upgrade to chokidar 3 with 15x less dependencies.
npm WARN deprecated core-js@2.6.12: core-js@<3.3 is no longer maintained and not recommended for usage due to the number of issues. Because of the V8 engine whims, feature detection in old core-js versions could cause a slowdown up to 100x even if nothing is polyfilled. Please, upgrade your dependencies to the actual version of core-js.

added 237 packages, and audited 288 packages in 15s

2 packages are looking for funding
  run `npm fund` for details

8 vulnerabilities (2 low, 6 high)

```

- To install a package globally

```bash
## sudo             if necessary
npm install express -g
```
