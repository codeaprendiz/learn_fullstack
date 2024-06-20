# [Introduction to .NET and Docker](https://learn.microsoft.com/en-us/dotnet/core/docker/introduction)

In this tutorial, you

- Create and publish a simple .NET app
- Create and configure a Dockerfile for .NET
- Build a Docker image
- Create and run a Docker container

## [Create .NET app](https://learn.microsoft.com/en-us/dotnet/core/docker/build-container?tabs=windows&pivots=dotnet-8-0#create-net-app)

```bash
dotnet new console -o App -n DotNet.Docker
```

Project structure

```bash
$ tree App         
App
├── DotNet.Docker.csproj
├── Program.cs
└── obj
    ├── DotNet.Docker.csproj.nuget.dgspec.json
    ├── DotNet.Docker.csproj.nuget.g.props
    ├── DotNet.Docker.csproj.nuget.g.targets
    ├── project.assets.json
    └── project.nuget.cache
```

## Run

```bash
cd App
dotnet run
```

Output

```bash
Hello World!
```

## After changing the `Program.cs` file

```bash
dotnet run
Counter: 1
Counter: 2
^C%

## Any parameters after -- are not passed to the dotnet run command and instead are passed to your application.

$ dotnet run -- 3
Counter: 1
Counter: 2
Counter: 3
```

## [Publish .NET App](https://learn.microsoft.com/en-us/dotnet/core/docker/build-container?tabs=windows&pivots=dotnet-8-0#publish-net-app)

```bash
dotnet publish -c Release
```

Validate

```bash
$ ls bin/Release/net8.0/publish
DotNet.Docker                    DotNet.Docker.deps.json          DotNet.Docker.dll                DotNet.Docker.pdb                DotNet.Docker.runtimeconfig.json
```

## [Create a Dockerfile](https://learn.microsoft.com/en-us/dotnet/core/docker/build-container?tabs=linux&pivots=dotnet-8-0#create-the-dockerfile)

```bash
touch Dockerfile
```

To build the container, from your terminal, run the following command:

```bash
docker build -t counter-image -f Dockerfile .
```

## [Create a Container](https://learn.microsoft.com/en-us/dotnet/core/docker/build-container?tabs=linux&pivots=dotnet-8-0#create-a-container)

```bash
docker create --name core-counter counter-image
```

```bash
docker ps -a
```

Output

```bash
CONTAINER ID   IMAGE                  COMMAND                  CREATED          STATUS       PORTS                       NAMES
da6a47e908b0   counter-image          "dotnet DotNet.Docke…"   44 seconds ago   Created                                  core-counter
```

Start the container

```bash
docker start core-counter
```

```bash
$ docker ps                
CONTAINER ID   IMAGE                  COMMAND                  CREATED         STATUS        PORTS                       NAMES
da6a47e908b0   counter-image          "dotnet DotNet.Docke…"   9 minutes ago   Up 1 second                               core-counter
```

## Connect to the container

After a container is running, you can connect to it to see the output. Use the docker start and docker attach commands to start the container and peek at the output stream. In this example, the `Ctrl+C` keystroke is used to detach from the running container. This keystroke ends the process in the container unless otherwise specified, which would stop the container. The `--sig-proxy=false` parameter ensures that `Ctrl+C` won't stop the process in the container.

```bash
$ docker attach --sig-proxy=false core-counter
Counter: 155
Counter: 156
Counter: 157
Counter: 158
^C
$ docker attach --sig-proxy=false core-counter
Counter: 162
Counter: 163
Counter: 164
^C
$ docker attach core-counter 
Counter: 205
Counter: 206
Counter: 207
^C
$ docker ps -a               
CONTAINER ID   IMAGE                  COMMAND                  CREATED          STATUS                       PORTS                       NAMES
da6a47e908b0   counter-image          "dotnet DotNet.Docke…"   12 minutes ago   Exited (130) 3 seconds ago                               core-counter
```

Delete the container

```bash
docker rm core-counter
```

Do it in single command

```bash
$ docker run -it --rm counter-image
Counter: 1
Counter: 2
Counter: 3
^C
# The container also passes parameters into the execution of the .NET app. To instruct the .NET app to count only to three, pass in 3.
$ docker run -it --rm counter-image 3
Counter: 1
Counter: 2
Counter: 3
```

## [Change the Entrypoint](https://learn.microsoft.com/en-us/dotnet/core/docker/build-container?tabs=linux&pivots=dotnet-8-0#change-the-entrypoint)

```bash
docker run -it --rm --entrypoint "bash" counter-image
root@9f8de8fbd4a8:/App# ls
DotNet.Docker  DotNet.Docker.deps.json  DotNet.Docker.dll  DotNet.Docker.pdb  DotNet.Docker.runtimeconfig.json
root@9f8de8fbd4a8:/App# dotnet DotNet.Docker.dll 7
Counter: 1
Counter: 2
Counter: 3
^C
root@9f8de8fbd4a8:/App# exit
exit
```

## Cleanup

```bash
docker stop core-counter
docker rm core-counter
docker rmi counter-image:latest
```
