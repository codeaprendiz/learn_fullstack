# Powershell

## Installation

[Installing PowerShell on macOS](https://learn.microsoft.com/en-us/powershell/scripting/install/installing-powershell-on-macos?view=powershell-7.4)

```bash
brew install powershell/tap/powershell
```

Validate

```bash
$ pwsh
PowerShell 7.4.1
PS /FullPath >
```

## Setup

`$PROFILE` setup

```ps1
# You can copy the contents from the Microsoft.PowerShell_profile.ps1 in the home directory of repository
code $PROFILE
```

You can get more details about `$PROFILE` using

```ps1
$Profile | Select-Object *
```

## VS Code Plugins

- [PowerShell](https://marketplace.visualstudio.com/items?itemName=ms-vscode.PowerShell)

