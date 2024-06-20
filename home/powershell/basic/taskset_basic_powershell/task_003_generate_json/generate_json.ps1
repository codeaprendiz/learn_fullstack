Write-Host "Generating JSON with complex structure"

# Ensuring the target directory exists
$directoryPath = "./folder"
if (-not (Test-Path -Path $directoryPath)) {
    New-Item -Path $directoryPath -ItemType Directory
}

# Define a custom object with both array and key-value pairs
$jsonObject = @{
  propertyArray = @("Item1", "Item2", $ENV:ENV_VAR3) # Example array including an environment variable
  keyValuePairs = @{
    key1 = "Value1"
    key2 = $ENV:ENV_VAR2
    key3 = "Value3"
  }
}

# Convert the custom object to a JSON string
$Content = $jsonObject | ConvertTo-Json -Depth 5

# Write the JSON content to the file
$jsonFilePath = "./folder/test.json"
Set-Content -Path $jsonFilePath -Value $Content

# Optionally, display the content of the generated JSON file
Get-Content -Path $jsonFilePath
