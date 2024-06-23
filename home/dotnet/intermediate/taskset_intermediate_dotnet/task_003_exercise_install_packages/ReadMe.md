# [Exercise - Install packages](https://learn.microsoft.com/en-us/training/modules/dotnet-dependencies/3-exercise-dependency)

## Create a sample .NET project

```bash
dotnet new console -f net8.0
```

## Run

```bash
dotnet run
```

Output

```bash
Hello, World!
```

## Add a NuGet package by using the .NET Core tool

Install the Humanizer library by running the following command:

```bash
dotnet add package Humanizer --version 2.7.9
```

```bash
$ cat task_003_exercise_install_packages.csproj | egrep -A 1 ItemGroup
  <ItemGroup>
    <PackageReference Include="Humanizer" Version="2.7.9" />
  </ItemGroup>
```

## Run again by changing the code

```bash
dotnet run
```

Output

```bash
Quantities:
0 cases
1 case
5 cases

Date/Time Manipulation:
yesterday
2 hours ago
1 day
2 weeks
```
