# ReadMe_static

- [ReadMe\_static](#readme_static)
  - [Install .NET SDK on Mac](#install-net-sdk-on-mac)
  - [Commands](#commands)
    - [list | List of .NET SDKs](#list--list-of-net-sdks)
    - [new | Create a basic hello world app](#new--create-a-basic-hello-world-app)
    - [run | Run the app](#run--run-the-app)
    - [add | Add a NuGet package by using the .NET Core tool](#add--add-a-nuget-package-by-using-the-net-core-tool)
  - [VS Code Extensions](#vs-code-extensions)
  - [Learning Docs](#learning-docs)

[Latest LTS SDK Versions](https://dotnet.microsoft.com/en-us/download/dotnet)

## Install .NET SDK on Mac

```bash
brew install --cask dotnet-sdk
```

Validate

```bash
$ dotnet --info
.NET SDK:
 Version:           8.0.203
...
```

## Commands

### list | List of .NET SDKs

```bash
dotnet --list-sdks
```

Output

```bash
8.0.203 [/usr/local/share/dotnet/sdk]
```

### new | Create a basic hello world app

```bash
dotnet new console -f net8.0
```

### run | Run the app

```bash
dotnet run
```

Output

```bash
Hello, World!
```

### add | Add a NuGet package by using the .NET Core tool

Install the Humanizer library by running the following command:

```bash
dotnet add package Humanizer --version 2.7.9
```

## VS Code Extensions

[C#](https://marketplace.visualstudio.com/items?itemName=ms-dotnettools.csharp)

## Learning Docs

[Browse all courses, learning paths, and modules](https://learn.microsoft.com/en-us/training/browse/?products=dotnet)

[learn.microsoft.com » Build .NET applications with C#](https://learn.microsoft.com/en-us/training/paths/build-dotnet-applications-csharp)
