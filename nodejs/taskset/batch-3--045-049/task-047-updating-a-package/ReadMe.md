# Updating a package

## Run

- Install 

```bash
sudo npm install eslint@5.2.0 -g
npm WARN deprecated circular-json@0.3.3: CircularJSON is in maintenance only, flatted is its successor.

changed 155 packages, and audited 156 packages in 3s

29 packages are looking for funding
  run `npm fund` for details

5 moderate severity vulnerabilities

To address all issues (including breaking changes), run:
  npm audit fix --force
```

- Fetching list of outdated packages

```bash
npm outdated -g
Package   Current  Wanted  Latest  Location               Depended by
corepack    0.9.0  0.10.0  0.10.0  node_modules/corepack  global
eslint      5.2.0   8.4.1   8.4.1  node_modules/eslint    global
nodemon    2.0.13  2.0.15  2.0.15  node_modules/nodemon   global
npm         8.0.0   8.3.0   8.3.0  node_modules/npm       global
```

- Now to update a package (update command does not work in all cases so we use the install command)

```bash
sudo npm install eslint -g
Password:

added 17 packages, removed 84 packages, changed 71 packages, and audited 89 packages in 7s

13 packages are looking for funding
  run `npm fund` for details

found 0 vulnerabilities
```

- Fetch outdated

```bash
npm outdated -g
Package   Current  Wanted  Latest  Location               Depended by
corepack    0.9.0  0.10.0  0.10.0  node_modules/corepack  global
nodemon    2.0.13  2.0.15  2.0.15  node_modules/nodemon   global
npm         8.0.0   8.3.0   8.3.0  node_modules/npm       global
```
