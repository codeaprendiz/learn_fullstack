# [Create and Run a script](https://learn.microsoft.com/en-us/training/modules/script-with-powershell/3-exercise-scripting)

```bash
$ pwsh
PowerShell 7.4.1
# Create a new Variable
PS > $PI = 3.14        
# Create a new file PI.ps1 using powershell        
PS > New-Item -Path . -Name "PI.ps1" -ItemType "file"
```

Add the following content to the file and save it. You can use CTRL+S on Windows and Linux or CMD+S on Mac to save your file.

```ps1
$PI = 3
Write-Host "The value of `$PI is now $PI, inside the script"
```

Run the script

```bash
PS > ./PI.ps1
The value of $PI is now 3, inside the script
PS >
```

Enter $PI in the console window:

```bash
PS > $PI
3.14
PS >
```
